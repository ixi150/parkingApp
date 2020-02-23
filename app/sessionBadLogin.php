<?php

session_start();
if( isset($_SESSION['wrong_login']) ) 
{ 
    echo $_SESSION['wrong_login'];
} 
