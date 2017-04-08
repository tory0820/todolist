<?php

class database
  {
    function con(){
        define("DBhost","localhost");
        define("DBuser","root");
        define("DBpwd","0820");
        define("DBname","todo");
        $con= new mysqli(DBhost,DBuser,DBpwd,DBname);

        if($con->connect_error){
           die("Connection failed: " . $con->connect_error);
        }

        return $con;
    }
  }
 ?>