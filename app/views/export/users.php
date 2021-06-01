<?php

namespace Core;
use App\Models\Users;

$users = new Users();
$users = $users->findAll();
if(count($users) > 0){
    $delimiter = ",";
    $filename = "users_" . date('Y-m-d') . ".csv";

    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
    $fields = array('Id', 'Username', 'Email', 'Password', 'Fname', 'Lname', 'Acl', 'Banned', 'PhotoId');
    fputcsv($f, $fields, $delimiter);

    foreach ($users as $user){
        $lineData = array($user->id, $user->username, $user->email, $user->password, $user->fname, $user->lname, $user->acl, $user->banned, $user->photoId);
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