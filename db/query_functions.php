<?php
    
    function find_all_projects() {
        global $db;

        $sql = "SELECT * from projects ";
        $sql .= "ORDER BY id ASC";

        $query = mysqli_query($db, $sql);
        query_works($query);

        // $query_array = mysqli_fetch_assoc($query);

        return $query;
    }
?>