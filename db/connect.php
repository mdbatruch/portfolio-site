<?php
    
    // require('credentials.php');


    function db_connect() {

        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/db.ini');

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            try {
                $connection = new mysqli($config['server'], $config['username'],$config['password'],$config['db']);
                $connection->set_charset("utf8mb4");
            } catch(Exception $e) {
                error_log($e->getMessage());
                exit('Error connecting to database');
            }
        
        return $connection;
    }

    function db_disconnect($connection) {
        if (isset($connection) ) {
            mysqli_close($connection);
        }
    }

    function db_escape($connection, $string) {
        return mysqli_real_escape_string($connection, $string);
    }

    function query_works($data) {
        if (!$data) {
            exit("Query Failed");
        }
    }

    function confirm_result_set($result_set) {

        if (!$result_set) {
	       exit("Database query failed.");
        }
    }

?>