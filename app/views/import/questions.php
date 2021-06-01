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
                $photo      = $line[1];
                $continent  = $line[2];
                $question   = $line[3];
                $answer1    = $line[4];
                $answer2    = $line[5];
                $answer3    = $line[6];
                $answer4    = $line[7];
                $correct    = $line[8];
                $header     = $line[9];

                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM questions WHERE id = '".$line[0]."'";
                $prevResult = DB::getInstance()->query($prevQuery);

                if($prevResult->count() > 0){
                    // Update member data in the database
                    DB::getInstance()->query("UPDATE questions SET photo = '". $photo ."', continent = '". $continent ."', question = '" . $question . "', answer1 = '". $answer1 ."', answer2 = '". $answer2 ."', answer3 = '" . $answer3 . "', answer4 = '". $answer4 ."', correct = '". $correct ."', header = '" . $header . "' WHERE id = '". $id ."'");
                }else{
                    // Insert member data in the database
                    DB::getInstance()->query("INSERT INTO questions (id, photo, continent, question, answer1, answer2, answer3, answer4, correct, header) VALUES ('".$id."', '". $photo ."', '". $continent ."', '". $question ."', '". $answer1 ."', '". $answer2 ."', '". $answer3 ."', '". $answer4 ."', '". $correct ."', '" . $header . "')");
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

