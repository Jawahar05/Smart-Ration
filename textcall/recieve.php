<?php
 $inNumber = $_REQUEST["inNumber"];
 $sender = $_REQUEST["sender"];
 $keyword = $_REQUEST["keyword"];
 $content = $_REQUEST["content"];
 $email = $_REQUEST["email"];
 $credits = $_REQUEST["credits"];
 
 
 echo("In number : " . $inNumber . "<br> Sender : " . $sender . "<br> Keyword : " . $keyword . "<br> Content : " . $content .
 "<br> Email : " .$email . "<br> Credits : " . $credits);
?>