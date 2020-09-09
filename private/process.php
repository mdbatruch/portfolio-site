<?php

    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {

      header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

      die( header( 'location: index.php' ) );
  }


    require('../database/query_functions.php');
    require('../database/connect.php');

    $db = db_connect();

    $data = [];
    $errors = [];
    $id = $_POST['id'];

  switch($id){
      case 'login':

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
  
    if (empty($username)) {
  
      $errors['username'] = 'Username cannot be blank';
  
    } else {
  
      $stmt = $db->prepare("SELECT username, hashed_password FROM admins WHERE username = ?");
      $stmt->bind_param("s", $username);
      $stmt->execute();

      // get query results
      $stmt->bind_result($username,$hash);
      $stmt->store_result();

      // fetch the query results in a row
      $stmt->fetch();

  
      if ($stmt->num_rows === 0) {
        $errors['username'] = 'This username does not exist, man!';
      } else {
        if (empty($password)) {
  
          $errors['password'] = 'Password cannot be blank';
  
        } else {
  
            if (!password_verify($password, $hash)) {
                $errors['password'] = 'Incorrect Password';
            }
        }
      }
    }

    // $stmt->close();
  
    if (!empty($errors)) {
  
        $data['message'] = 'There was an error with your form. Please try again.';
        $data['success'] = false;
        $data['errors'] = $errors;
  
    } else {
  
      $data['redirect'] = 'private/index.php';
      $data['message'] = 'Logging you in now.';
      $data['success'] = true;
  
      session_start();
      session_regenerate_id();
      $_SESSION['username'] = $username;
      $_SESSION['last_login'] = time();
      $login_time = date('D-M-d-Y g:i A', $_SESSION['last_login']);


    //   $sql = "INSERT INTO login_track ";
    //   $sql .= "(username, date) VALUES (";
    //   $sql .= "'" . db_escape($db, $username) . "',";
    //   $sql .= "'" . db_escape($db, $login_time) . "')";
    //   $result = mysqli_query($db, $sql);
    //   confirm_result_set($result);
  
    }
  
  echo json_encode($data);
  
  break;

  case 'edit-project':
    $project = [];
    $project['id'] = $_POST['project_id'];
    $project['project_name'] = $_POST['project_name'] ?? '';
    $project['project_description'] = $_POST['project_description'] ?? '';
    $project['project_link'] = $_POST['project_link'] ?? '';
    $project['project_image'] = $_POST['project_image'] ?? '';
    $project['project_active'] = $_POST['project_active'] ?? '';
    $project['project_path'] = $_POST['project_path'] ?? '';
    $project['image_alt'] = $_POST['image_alt'] ?? '';
    

    $stmt = $db->prepare("SELECT name, description, active, image_url, alt, link from projects WHERE name = ?");
    $stmt->bind_param("s", $project['project_name']);
    $stmt->execute();
    if($stmt->affected_rows === 0) exit('No rows found');

    // get query results
    $stmt->bind_result($name, $description, $active, $image_url, $alt, $link);
    $stmt->store_result();

    // fetch the query results in a row
    $stmt->fetch();

    //  if ($project['project_image']) {

    //     $project['project_image'] = substr($project['project_image'], 12);
        
    //     $new_image_path = 'images/' . $project['project_image'];
    //  }

    // print $stmt->affected_rows;

    //remove for now
    // if ($stmt->affected_rows > 0){
    //     $errors['project_name'] = "This project name already exists, please choose another one";
    // }

    if (isset($_FILES['file'])) {
      if ( $_FILES['file']['error'] > 0 ){
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
          } else {
              $test = $_SERVER['DOCUMENT_ROOT'] . dirname(dirname($_SERVER['PHP_SELF'])) . '/images/';
              if(move_uploaded_file($_FILES['file']['tmp_name'], $test . $_FILES['file']['name']))
              {
                  // echo "File Uploaded Successfully";
              }
          }
      }

    if (empty($_POST['project_name'])) {
        $errors['project_name'] = "Name can't be blank";
    }
    if (!empty($errors)) {
        
        $data['success'] = false;
        $data['message'] = 'There were errors. Please try again';
        $data['errors'] = $errors;
    } else {

        $stmt = $db->prepare("UPDATE projects SET name = ?,  description = ?, active = ?, link = ?, image_url = ?, alt = ? WHERE id = ?");
        $stmt->bind_param("ssisssi", $project['project_name'], $project['project_description'], $project['project_active'], $project['project_link'], $new_image_path, $project['image_alt'], $project['id']);
        $stmt->execute();
        $stmt->close();
        
        $sql_project_pull = find_project_by_id($project['id']);

        $data['success'] = true;
        $data['status'] = "edited";

        $data['message'] = 'You have successfully edited the project';
    }
    echo json_encode($data);
    
break;

case 'new-project':
  if(empty($_POST['project_name'])) {
      $errors['project_name'] = "Project name can't be blank";
  }

  $stmt = $db->prepare("SELECT name, description, active, image_url, alt, link from projects WHERE name = ?");
  $stmt->bind_param("s", $_POST['project_name']);
  $stmt->execute();
  if($stmt->affected_rows === 0) exit('No rows found');

  // $_POST['project_image'] = substr($_POST['project_image'], 12);
  // $new_image_path = 'images/' . $_POST['project_image'];

  // get query results
  $stmt->bind_result($name, $description, $active, $image_url, $alt, $link);
  $stmt->store_result();

  // fetch the query results in a row
  $stmt->fetch();

  if ($stmt->affected_rows > 0){
      $errors['project_name'] = "This project name already exists, please choose another one";
  }

  $stmt->close();

  if(!empty($errors)) {
      $data['message'] = 'There was an error with your form, please try again';
      $data['success'] = false;
      $data['errors'] = $errors;
  }   else {

      $sql_page = "SELECT * from projects";
      $page_check = mysqli_query($db, $sql_page);
      confirm_result_set($page_check);

      $id_count = mysqli_num_rows($page_check) + 1;

      if (!file_exists("../images")) {
        mkdir("../images" , 0777, true);
      }

      if (isset($_FILES['file'])) {
          if ( $_FILES['file']['error'] > 0 ){
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        } else {
            $test = $_SERVER['DOCUMENT_ROOT'] . dirname(dirname($_SERVER['PHP_SELF'])) . '/images/';
            if(move_uploaded_file($_FILES['file']['tmp_name'], $test . $_FILES['file']['name']))
            {
                // echo "File Uploaded Successfully";
            }
        }
    }
    
            $_POST['project_image'] = substr($_POST['project_image'], 12);
            $new_image_path = 'images/' . $_POST['project_image'];

            $stmt = $db->prepare("INSERT INTO projects (name, description, active, image_url, alt, link) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssdsss", $_POST['project_name'], $_POST['project_description'], $_POST['project_active'], $new_image_path, $_POST['image_alt'], $_POST['project_link']);
            $stmt->execute();
            if($stmt->affected_rows === 0) exit('No rows updated');
            $stmt->close();
            
      if ($stmt) {
          $new_id = mysqli_insert_id($db);
          $data['success'] = true;
          $data['status'] = 'created';
          $page_path =  dirname(dirname($_SERVER['HTTP_REFERER'])) . '/projects.php?status=' . $data['status'];
          $data['message'] = 'Success! Your Project has been submitted!';
          $data['redirect'] = $page_path;
          
      } else {
          
          $data['message'] = 'We could not submit your project at this time';
      }
  
  }
    echo json_encode($data);
  break;

  case 'confirm-delete-project':
        
      $project_id = $_POST['project_id'];

      $stmt = $db->prepare("DELETE FROM projects WHERE id = ? LIMIT 1");
      $stmt->bind_param("i", $project_id);
      $stmt->execute();
      $stmt->close();
      
      if ($stmt) {
        
          $data['success'] = true;
          $data['status'] = 'deleted';
          $data['message'] = 'Success! Your Project has been deleted!';
          $data['id'] = $project_id;
          
      } else {
          
          $data['message'] = 'We could not delete your project at this time';
      }

    echo json_encode($data);

  break;

  case 'contact':
        
    $page_name = $_POST['id'];

    $stmt = $db->prepare("SELECT page, title, subtitle, description from pages WHERE page = ?");
    $stmt->bind_param("s", $page_name);
    $stmt->execute();
    if($stmt->affected_rows === 0) exit('No rows found');

    // get query results
    $stmt->bind_result($page_name, $title, $subtitle, $description);
    $stmt->store_result();

    // fetch the query results in a row
    $stmt->fetch();

    // $stmt = $db->prepare("DELETE FROM projects WHERE id = ? LIMIT 1");
    // $stmt->bind_param("i", $page_name);
    // $stmt->execute();
    // $stmt->close();
    
    if ($stmt) {

      // $stmt = $db->prepare("UPDATE projects SET name = ?,  description = ?, active = ?, link = ?, alt = ? WHERE id = ?");
        $stmt = $db->prepare("UPDATE pages SET title = ?, subtitle = ?, description = ? WHERE page = ? LIMIT 1");
        $stmt->bind_param("ssss", $_POST['title'], $_POST['subtitle'], $_POST['description'], $page_name);
        $stmt->execute();
        $stmt->close();
        
        $data['success'] = true;
        $data['status'] = 'edited';
        $data['message'] = 'Success! Page has been updated!';
        $data['id'] = $page_name;
        
    } else {
        
        $data['message'] = 'We could not edit the page at this time';
    }

  echo json_encode($data);

break;


    }

?>