<?php
// INTENTIONAL LAB: parameter discovery target.
$params = ['debug', 'role', 'page', 'format', 'lang'];
header('Content-Type: text/plain; charset=UTF-8');
echo "Known training parameters:\n";
foreach ($params as $name) {
    if (array_key_exists($name, $_GET)) {
        echo $name . '=' . $_GET[$name] . "\n";
    }
}
echo "\nTry discovering parameters with Arjun or FFuf.\n";
