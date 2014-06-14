<?php

include_once 'parse.php';


//UNCOMMENT AN INDIVIDUAL FILE TESTS OR JUST THE DISCOVERTESTS LINE FOR ALL TESTS

//include_once 'tests/parseObjectTest.php';
include_once 'parseQuery.php';
include_once 'parseMainUser.php';
include_once 'parseFile.php';

$userObject = new parseMainUser();
if ($_GET['mod']=="add"){
$userObject->setUp();
}

if ($_GET['mod']=="login"){
$userObject->login();
}

if ($_GET['mod']=="data"){
$userObject->queryUsersWithQueryExpectResultsKey();
}

if ($_GET['mod']=="ind"){
$userObject->searchUser();
}

if ($_GET['mod']=="pic"){
$userObject->uploadPic();
}

//include_once 'tests/parseFileTest.php';
//include_once 'tests/parsePushTest.php';
//include_once 'tests/parseGeoPointTest.php';

?>