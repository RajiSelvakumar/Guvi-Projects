<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit889c9838496f976024103f42f4c3f481
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Predis\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Predis\\' => 
        array (
            0 => __DIR__ . '/..' . '/predis/predis/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit889c9838496f976024103f42f4c3f481::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit889c9838496f976024103f42f4c3f481::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit889c9838496f976024103f42f4c3f481::$classMap;

        }, null, ClassLoader::class);
    }
}
