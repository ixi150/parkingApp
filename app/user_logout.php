<?php

session_start();
if( isset($_SESSION) ) 
{ 
    $session_unset_success = session_unset();
    if ($session_unset_success)
    {
        echo "Logged out";
        session_destroy();
    }
    else
    {
        echo "Failed to log out";
    }
    header("Location: ../login.html");
} 
else 
{ 
    echo 'session not existant'.'<br>'; 
}