<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita8b906ef7152c1f9cf7564831eaf5f65
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'setasign\\Fpdi\\' => 14,
        ),
        'V' => 
        array (
            'Vendidero\\Germanized\\Shipments\\' => 31,
        ),
        'A' => 
        array (
            'Automattic\\Jetpack\\Autoloader\\' => 30,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'setasign\\Fpdi\\' => 
        array (
            0 => __DIR__ . '/..' . '/setasign/fpdi/src',
        ),
        'Vendidero\\Germanized\\Shipments\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Automattic\\Jetpack\\Autoloader\\' => 
        array (
            0 => __DIR__ . '/..' . '/automattic/jetpack-autoloader/src',
        ),
    );

    public static $classMap = array (
        'FPDF' => __DIR__ . '/..' . '/setasign/fpdf/fpdf.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita8b906ef7152c1f9cf7564831eaf5f65::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita8b906ef7152c1f9cf7564831eaf5f65::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita8b906ef7152c1f9cf7564831eaf5f65::$classMap;

        }, null, ClassLoader::class);
    }
}
