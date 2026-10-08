<?php
$directory = new RecursiveDirectoryIterator('c:\\xampp\\htdocs\\Zydus');
$iterator = new RecursiveIteratorIterator($directory);
$regex = new RegexIterator($iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

$output = fopen('c:\\xampp\\htdocs\\Zydus\\search_results.txt', 'w');

foreach ($regex as $file) {
    $path = $file[0];
    // skip vendor folder
    if (strpos($path, 'c:\\xampp\\htdocs\\Zydus\\vendor') === 0) continue;
    
    $content = file_get_contents($path);
    if (stripos($content, 'PatientEnrollmentController') !== false) {
        $lines = explode("\n", $content);
        foreach ($lines as $i => $line) {
            if (stripos($line, 'PatientEnrollmentController') !== false) {
                fwrite($output, "$path:" . ($i+1) . ":" . trim($line) . "\n");
            }
        }
    }
}
fclose($output);
