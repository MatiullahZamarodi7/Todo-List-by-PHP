<?php

// use Symfony\Component\HttpFoundation\Request;

include "bootstrap/init.php";


// dd($_SERVER['REQUEST_METHOD']);
// echo $_SERVER['REQUEST_METHOD'];

$home_url = site_url();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_GET['action'];
    // dd($action) ;
    $params = $_POST;
    if($action == "regester"){
       $result = regester($params);
       if(!$result){
        dd("you have error to your regesterations");
       }else{
        successMSG("<span style ='color: #6a0303; font-weight: bold; font-size: x-large;'>well come to Z ToDoList </span>" . "<br>" 
        ."<h3>then click to login and add your current EMAIL and PASSWORD</h3>"
        );
       }
    }

    
    elseif($action == "login"){
       $result = login($params['email'] , $params['pass']);
       if(!$result){
         successMSG("error: password or email is incorect");
       }
       else{
         // successMSG("<h3>your now logged to Z todoList</h3> <br>
         // <a href='{$home_url}'>manage your tasks</a> "
         // );
      redirect(site_url());
       }
    }
}

include "tpl/tpl-auth.php";