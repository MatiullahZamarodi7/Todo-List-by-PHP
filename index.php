<?php
include "bootstrap/init.php";

if(!isLoggedIn()){
   redirect(site_url('auth.php'));
};


if(isset($_GET['logout'])){
    logOut();
}

if(isset($_GET['delete_task']) && is_numeric($_GET['delete_task'])){
    $deletedTask = deleted_Tasks($_GET['delete_task']);
    // echo "$deletedTask the one task is successfuly deleted";
}

if(isset($_GET['delete_Folder']) && is_numeric($_GET['delete_Folder'])){
    $deletedCountR = deletefolder($_GET['delete_Folder']);
    // echo "$deletedCountR deleted row was successfuly";
}
// else{
//     echo "sorry that conde dont work";
// }

$folders = getFolders();

// var_dump($folders[0]->name); 

$tasks = getTasks();

// dd($tasks);


include "tpl/tpl-index.php";