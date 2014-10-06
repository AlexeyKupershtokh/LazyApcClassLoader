<?php

// when the script is called with ?clear
if (isset($_GET['clear'])) {
    apc_clear_cache();
}

require_once(__DIR__ . '/../src/LazyApcClassLoader.php');
use AlexeyKupershtokh\LazyApcClassLoader\LazyApcClassLoader;

$loader = new LazyApcClassLoader(
    'my_prefix',
    function () {
        return require_once __DIR__ . '/../vendor/autoload.php';
    }
);
$loader->register();

new \AlexeyKupershtokh\Example\SomeClass();

?>
<div><a href="?">Restart</a></div>
<div><a href="?clear">Clear APC Cache and restart</a></div>
<div>Breaker: <?php print $loader->getBreaker() ? $loader->getBreaker() : 'NULL'; ?></div>
<div>Included files:</div>
<pre><?php print_r(get_included_files()); ?></pre>