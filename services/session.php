<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$link = $_GET['link'];
if(!$_SESSION){
    header('Location:../login/');
}else{
    header('Location:'.$link);
}