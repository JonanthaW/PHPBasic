<?php
    
    $page = @$_GET['page'];
    if(file_exists($page.'.php')) {
        include($page.'.php');
    }
?>