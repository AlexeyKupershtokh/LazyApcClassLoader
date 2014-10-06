<?php

require_once(__DIR__ . '/../src/LazyApcClassLoader.php');
use AlexeyKupershtokh\LazyApcClassLoader\LazyApcClassLoader;

$loader = new LazyApcClassLoader(
    'my_prefix',
    function () {
        return require_once __DIR__ . '/../vendor/autoload.php';
    }
);
$loader->register();

