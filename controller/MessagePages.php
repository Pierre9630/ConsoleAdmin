<?php
function Sucess($message,$page){
    echo($message." <img width=\"20px\" height=\"20px\"src=\"../media/sucess.png\"> <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='". $page ."'\">Retour</button>");
}
function Error($message,$page){
    echo($message." <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='".$page."'\">Retour</button>");
}