<?php

namespace Core;
use app\models\Questions;

$questions = new Questions();
$questions = $questions->findAll();
if(count($questions) > 0){
    $delimiter = ",";
    $filename = "questions_" . date('Y-m-d') . ".csv";

    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
    $fields = array('Id', 'Photo', 'Continent', 'Question', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 'Correct', 'Header');
    fputcsv($f, $fields, $delimiter);

    foreach ($questions as $question){
        $lineData = array($question->id, $question->photo, $question->continent, $question->question, $question->answer1, $question->answer2, $question->answer3, $question->answer4, $question->correct, $question->header);
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