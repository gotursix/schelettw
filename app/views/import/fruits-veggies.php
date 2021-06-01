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
                $id             = $line[0];
                $name           = $line[1];
                $description    = $line[2];

                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM fruit WHERE id = '".$line[0]."'";
                $prevResult = DB::getInstance()->query($prevQuery);

                if($prevResult->count() > 0){
                    // Update member data in the database
                    DB::getInstance()->query("UPDATE fruit SET name = '".$name."', description = '". $description ."' WHERE id = '". $id ."'");
                }else{
                    // Insert member data in the database
                    DB::getInstance()->query("INSERT INTO fruit (id, name, description) VALUES ('".$id."', '".$name."', '".$description."')");
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

