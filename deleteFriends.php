<?php

//check for errors once
    require_once "connect/connect.php";

    $id1 = $_POST['userid']; //Userid is the owner's id whose friend is to be deleted
    $id2 = $_POST['friendid']; //friend's id
    $result = $GLOBALS['db']->raw("DELETE from friends where id1='".$id1."' AND id2='".$id2."'");
    $result = $GLOBALS['db']->raw("DELETE FROM friends where id1=".$id2." AND id2='".$id1."'");
