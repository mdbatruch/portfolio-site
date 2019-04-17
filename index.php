<?php 

    include('includes/header.php');

?>
      <main>
         <div id="content-heading">
            <h2>Home</h2>    
         </div>
         <div id="project-list">
         <?php while($project_list = mysqli_fetch_assoc($projects)) { ?>
            <?php if ($project_list['active']) { ?>
               <div class="sample-projects">
                     <h3><?php echo $project_list['name']; ?></h3>
                     <?php $gifcheck = substr($project_list['link'], -3); ?>
                     <a href="<?php echo $project_list['link']; ?>" <?php $result = ($gifcheck == 'gif') ? 'data-lightbox="roadtrip"' : 'target="_blank"'; echo $result; ?>>
                     <img src="<?php echo root_url($project_list['image_url']); ?>" alt="<?php echo $project_list['alt']; ?>">
                     <h4><?php echo $project_list['description']; ?></h4>
                     </a>
                  </div>
            <?php } ?>
         <?php } ?>
         </div>        
      </main>  

<?php include('includes/footer.php'); ?>   