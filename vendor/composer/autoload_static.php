<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfcbb0c7c90c2bdfe42b9e5bc359eec06
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfcbb0c7c90c2bdfe42b9e5bc359eec06::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfcbb0c7c90c2bdfe42b9e5bc359eec06::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfcbb0c7c90c2bdfe42b9e5bc359eec06::$classMap;

        }, null, ClassLoader::class);
    }
}
