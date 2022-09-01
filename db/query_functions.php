<?php
    
    function find_all_projects() {
        global $db;

        $sql = "SELECT * from projects ";
        $sql .= "ORDER BY id DESC";

        $query = mysqli_query($db, $sql);
        query_works($query);

        // $query_array = mysqli_fetch_assoc($query);

        return $query;
    }

    function find_project_by_id($project_id) {

        global $db;

        $stmt = $db->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->bind_param("i", $project_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $project = $result->fetch_assoc();

        return $project;
    }

    function find_all_pages() {
        global $db;

        $stmt = $db->prepare("SELECT * FROM pages ORDER BY id ASC");
        $stmt->execute();

        $result = $stmt->get_result();

        $query = array();

        while ($page = $result->fetch_assoc()) {
            $query[] = $page;
        }

        $stmt->close();

        return $query;
    }

    function find_page_by_name($page_name) {

        global $db;

        $stmt = $db->prepare("SELECT * FROM pages WHERE page = ?");
        $stmt->bind_param("i", $page_name);
        $stmt->execute();
        $result = $stmt->get_result();
        $page = $result->fetch_assoc();

        return $page;
    }
    
    function project_count() {

        global $db;
        
        $sql = "SELECT COUNT(*) FROM projects";
        $result = mysqli_query($db, $sql);
        $result_rows = mysqli_fetch_array($result)[0];

        return $result_rows;
    }

    function count_all_projects($offset, $projects_per_page) {

        global $db;

        $sql = "SELECT * FROM projects LIMIT $offset, $projects_per_page";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);

        return $result;
    }
?>