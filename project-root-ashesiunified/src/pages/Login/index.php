<?php
    $uri = 'http';
    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        $uri .= 's';
    }
    $uri .= '://' . $_SERVER['HTTP_HOST'] . '/Project/pages/Home/home.php';
    
    header('Location: ' . $uri);
    exit;
?>
Something is wrong with the XAMPP installation :-(
