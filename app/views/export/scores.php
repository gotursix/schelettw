<?php

namespace Core;
use App\Models\Scores;

$scores = new Scores();
$scores = $scores->findAll();
if(count($scores) > 0){
    $delimiter = ",";
    $filename = "scores_" . date('Y-m-d') . ".csv";

    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
    $fields = array('Id', 'User_Id', 'Points', 'Difficulty');
    fputcsv($f, $fields, $delimiter);

    foreach ($scores as $score){
        $lineData = array($score->id, $score->user_id, $score->points, $score->difficulty);
        fputcsv($f, $lineData, $delimiter);
    }

    //move back to beginning of file
    fseek($f, 0);

    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;