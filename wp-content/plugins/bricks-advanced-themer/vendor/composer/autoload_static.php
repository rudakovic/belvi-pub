<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit25ab77d484736083ab199301e4db5dc6
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'ScssPhp\\ScssPhp\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ScssPhp\\ScssPhp\\' => 
        array (
            0 => __DIR__ . '/..' . '/scssphp/scssphp/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit25ab77d484736083ab199301e4db5dc6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit25ab77d484736083ab199301e4db5dc6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit25ab77d484736083ab199301e4db5dc6::$classMap;

        }, null, ClassLoader::class);
    }
}
