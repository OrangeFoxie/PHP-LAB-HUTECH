<?php

    function GetNextUserID(){
        static $userID = 1;
        return $userID++;
    }

?>