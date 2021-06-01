<?php

use Core\DB;

if(isset($_POST['importSubmit'])){

    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){

        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){

            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            // Skip the first line
            fgetcsv($csvFile);

            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $id         = $line[0];
                $user_id    = $line[1];
                $points     = $line[2];
                $difficulty = $line[3];

                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM scores WHERE id = '".$line[0]."'";
                $prevResult = DB::getInstance()->query($prevQuery);

                if($prevResult->count() > 0){
                    // Update member data in the database
                    DB::getInstance()->query("UPDATE scores SET user_id = '". $user_id ."', points = '". $points ."', difficulty = '" . $difficulty . "' WHERE id = '". $id ."'");
                }else{
                    // Insert member data in the database
                    DB::getInstance()->query("INSERT INTO scores (id, user_id, points, difficulty) VALUES ('".$id."', '". $user_id ."', '". $points ."', '". $difficulty ."')");
                }
            }

            // Close opened CSV file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header('Location: ' . PROOT . 'admin' .$qstring);

