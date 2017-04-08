<?php

require("database.php");
$con=new database();
$tempCon=$con->con();
$mes=$_GET['act'];

$data=array();


if ($tempCon->connect_error) {
        die("Connection failed: " . $tempCon->connect_error);
}

/*---------------------------------------------search--------------------------------------*/
if($mes=='get'){
$sql_serch='SELECT * FROM todolist';
$result=$tempCon->query($sql_serch);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($data,$row);
    }
}

echo json_encode($data);
$sql_serch='';
$mes='';
}

/*--------------------------------------------add-------------------------------------------*/
if($mes=='add'){
$addcont=$_GET['cont'];
$addsta=$_GET['sta'];
$sql_add="INSERT INTO todolist (cont, sta) VALUES ('".$addcont."','".$addsta."')";
if ($tempCon->query($sql_add) === TRUE) {
    echo json_encode("New record added successfully");
    $addcont='';
    $addsta='';
    $mes='';
    }else {
    echo json_encode("Error: " . $sql . "<br>" . $conn->error);
    }
}


/*-----------------------------------------update---------------------------------------------*/

if($mes=='update'){
$upid=$_GET['id'];
$upsta=$_GET['sta'];
$sql_up="UPDATE todolist SET sta='".$upsta."' WHERE id=".$upid."";
if ($tempCon->query($sql_up) === TRUE) {
    echo json_encode("New record updated successfully");
    $upid='';
    $upsta='';
    $mes='';
    }else {
    echo json_encode("Error: " . $sql . "<br>" . $conn->error);
    }
}



/*-----------------------------------------delete---------------------------------------------*/
if($mes=='delete'){
$delid=$_GET['id'];
$sql_del="DELETE FROM todolist WHERE id=".$delid."";
if ($tempCon->query($sql_del) === TRUE) {
    echo json_encode("Record deleted successfully");
    $delid='';
    $sql_del='';
    $mes='';
    }else {
    echo json_encode("Error: " . $sql . "<br>" . $conn->error);
    }
}



$tempCon->close();

 ?>