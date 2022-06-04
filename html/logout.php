<?php
    include('../html/configs/connection.php');
    session_destroy();
    header('location: '. SITEURL)
?>