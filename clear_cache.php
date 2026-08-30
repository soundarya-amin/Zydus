<?php
$file = 'c:\\xampp\\htdocs\\Zydus\\bootstrap\\cache\\routes-v7.php';
if (file_exists($file)) {
    unlink($file);
    echo "Deleted routes cache.\n";
} else {
    echo "No cache found.\n";
}
