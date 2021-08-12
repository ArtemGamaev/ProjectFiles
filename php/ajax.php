<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/class/EquelFiles.php';
$equelFiles = new EquelFiles();

if ($_POST['creatеDirectory']) {
    $equelFiles->creatеDirectory();
} else if ($_POST['findSharedFiles']) {
    $meaning =$equelFiles->findSharedFiles() [1];
    echo var_dump ($meaning);
} else if ($_POST['findUniqueFilesFirstFolder']) {
    $eqlFiles = $equelFiles->findSharedFiles();
    $meaningOne = $eqlFiles[0];
    $meaningTwo = $eqlFiles[2];
    $uniqueFiles =  $equelFiles->findUniqueFilesFirstFolder($meaningTwo, $meaningOne);
    echo var_dump ($uniqueFiles);
} else if ($_POST['findUniqueFilesSecondFolder']) {
    $eqlFiles = $equelFiles->findSharedFiles();
    $meaningOne = $eqlFiles[1];
    $meaningTwo = $eqlFiles[3];
    $uniqueFiles =  $equelFiles->findUniqueFilesSecondFolder($meaningTwo, $meaningOne);
    echo var_dump ($uniqueFiles);    
} else if ($_POST['createThirdDirectory']) {
    $eqlFiles = $equelFiles->findSharedFiles();
    $meaningOne = $eqlFiles[0];
    $meaningTwo = $eqlFiles[1];
    $meaningThree = $eqlFiles[2];
    $meaningFour = $eqlFiles[3];
    $uniqueFilesOne =  $equelFiles->findUniqueFilesFirstFolder($meaningThree , $meaningOne);
    $uniqueFilesTwo =  $equelFiles->findUniqueFilesSecondFolder($meaningFour, $meaningTwo);
    $equelFiles->createThirdDirectory($meaningTwo, $uniqueFilesOne, $uniqueFilesTwo);
} else if ($_POST['clearDirectory']) {
    $equelFiles->clearDirectory();
}
