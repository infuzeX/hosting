<?php
//mysqli_connect('hostname' , 'username' , 'password' , 'databasename');
$con = mysqli_connect ('localhost','urgshopc_infuzex','database.infuzex@123','urgshopc_hosting.infuzex');

if(!$con){
    echo $con->error_log;
}

?>