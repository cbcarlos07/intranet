<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$url = "";
        $ip = gethostbyname($url);
       //$ip = $_SERVER['REMOTE_ADDR'];
        
       $index = 'http://'.$ip.'/intranet/view/inicio.php';
       
header("Location: ".$index);