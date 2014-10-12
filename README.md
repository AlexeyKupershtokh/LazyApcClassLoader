LazyApcClassLoader
==================

This package was heavily inspired by the [Symfony2 ClassLoader component](http://symfony.com/doc/current/components/class_loader/cache_class_loader.html).

But it should be even better from performance point of view:
It does not require composer's autoloader to be initially loaded which is necessary for the ApcClassLoader to work. Instead, LazyApcClassLoader can work alone in many cases and use composer's one only as a fallback on cache misses. Usually it's enough to load only 1 file instead of 8.

Installation
------------
```bash
composer require alexey-kupershtokh/lazy-apc-class-loader
```

Usage
-----
Just add the following post-autoload-dump script to your compose.json:
```json
    "scripts": {
        "post-autoload-dump": [
            "AlexeyKupershtokh\\LazyApcClassLoader\\AutoloadGeneratorHook::post"
        ]
    }
```
Then run
```bash
composer dumpautoload
```
And it's done!

Advanced Usage
--------------
```php
require_once(__DIR__ . '/vendor/alexey-kupershtokh/lazy-apc-class-loader/src/LazyApcClassLoader.php');

$loader = new \AlexeyKupershtokh\LazyApcClassLoader\LazyApcClassLoader(
    'my_prefix',
    function () {
        // init composer autoloader if ever needed
        return require_once __DIR__ . '/vendor/autoload.php';
    }
);
$loader->register();
```
Benchmark
---------
https://github.com/AlexeyKupershtokh/AutoLoadBenchmark
