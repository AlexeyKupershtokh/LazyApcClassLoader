LazyApcClassLoader
==================

This package was heavily inspired by the [http://symfony.com/doc/current/components/class_loader/cache_class_loader.html](Symfony2 ClassLoader component).

But it's even better.
It does not require composer's autoloader to be initially loaded in order to make ApcClassLoader work. Instead, LazyApcClassLoader can work alone in many cases and use composer's one only as a fallback on cache misses.
