<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7769fbe4ec09dc9499f3cf409787d8fd
{
    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Mustache' => 
            array (
                0 => __DIR__ . '/..' . '/mustache/mustache/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit7769fbe4ec09dc9499f3cf409787d8fd::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit7769fbe4ec09dc9499f3cf409787d8fd::$classMap;

        }, null, ClassLoader::class);
    }
}
