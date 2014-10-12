<?php

namespace AlexeyKupershtokh\LazyApcClassLoader;

use Composer\Script\Event;
use Composer\Util\Filesystem;

class AutoloadGeneratorHook
{
    public static function post(Event $event)
    {
        $composer = $event->getComposer();
        $dispatcher = $composer->getEventDispatcher();
        $config = $composer->getConfig();

        $generator = new AutoloadGenerator($dispatcher, $event->getIO());
        $generator->replace($config);

        return false;
    }
}
