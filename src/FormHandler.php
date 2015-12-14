<?php

namespace src;

include_once '../vendor/autoload.php';

if (isset($_FILES['xmlFile'])) {

    $startTime = microtime(true);

    //check file size
    if ($_FILES['xmlFile']['size'] == 0) {
        echo('File can\'t be empty!');
        return;
    }

    // checks whether the specified file is uploaded via HTTP POST
    if (is_uploaded_file($_FILES['xmlFile']['tmp_name'])) {
        $dir = str_replace('\src', '', __DIR__);
        // checks moving the file to the file system hosting
        if (move_uploaded_file($_FILES['xmlFile']['tmp_name'],
            $dir . "\\" . 'xmlForParse.xml')) {
            echo 'File ' . basename($_FILES['xmlFile']['name']) .
                ' uploaded succefully!';
        }
    }

    $parser = new Parser();
    $parser->parseXml();

    echo (" Application runtime:" . (microtime(true) - $startTime) . " seconds");
}