<?php

namespace Core;
use app\models\Vegetables;

$veggies = new Vegetables();
$veggies = $veggies->findAll();
if(count($veggies) > 0){
    $delimiter = ",";
    $filename = "veggies_" . date('Y-m-d') . ".csv";

    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
    $fields = array('Id', 'Name', 'Description');
    fputcsv($f, $fields, $delimiter);

    foreach ($veggies as $veggy){
        $lineData = array($veggy->id, $veggy->name, $veggy->description);
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