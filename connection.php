<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$databaseName = "mycoders_notes";
$databaseHost = "localhost";
$dbUser = "mycoders_notes";
$dbPass = "elshadai1986$";
$link = mysqli_connect($databaseHost,$dbUser, $dbPass, $databaseName );
if(mysqli_connect_error()){
    //echo 'Unable to connect';
    die("ERROR UNABLE TO CONNECT!".mysqli_connect_error());
}

