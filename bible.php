<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<title>每日与主同行</title>

</head>

    
<body>
        <?php
        $lines = file('http://d.bbintl.org/bible/gb/o'); 
        foreach ($lines as $line) {
        echo  $line;
        }
        ?>


    </div>

<?php
include_once ('footer.php');
?>

