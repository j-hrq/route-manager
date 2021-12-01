<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2e346b224e318bf2015f5a2443819057
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit2e346b224e318bf2015f5a2443819057::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2e346b224e318bf2015f5a2443819057::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2e346b224e318bf2015f5a2443819057::$classMap;

        }, null, ClassLoader::class);
    }
}