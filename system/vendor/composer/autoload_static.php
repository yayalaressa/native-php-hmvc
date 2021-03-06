<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf3c4ab80fb0e9d98d131bdbf9861c37a
{
    public static $files = array (
        'c1483dbec7602933fa32cfc3f1b6c553' => __DIR__ . '/../../..' . '/system/helper/functions.php',
        'aa2f891c48b7c1bbc531a7e653f48aa8' => __DIR__ . '/../../..' . '/system/core/app.php',
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Bramus\\Router\\Router' => __DIR__ . '/..' . '/bramus/router/src/Bramus/Router/Router.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitf3c4ab80fb0e9d98d131bdbf9861c37a::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitf3c4ab80fb0e9d98d131bdbf9861c37a::$classMap;

        }, null, ClassLoader::class);
    }
}
