<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd6589c0973c94b497e3a3d634102e993
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'mindplay\\annotations\\' => 21,
        ),
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'A' => 
        array (
            'Ajax\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'mindplay\\annotations\\' => 
        array (
            0 => __DIR__ . '/..' . '/mindplay/annotations/src/annotations',
        ),
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Ajax\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmv/php-mv-ui/Ajax',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd6589c0973c94b497e3a3d634102e993::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd6589c0973c94b497e3a3d634102e993::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd6589c0973c94b497e3a3d634102e993::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
