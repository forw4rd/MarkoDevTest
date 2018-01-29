<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit23f303885beb97baf8593994add57103
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit23f303885beb97baf8593994add57103::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit23f303885beb97baf8593994add57103::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
