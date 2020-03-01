<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit05c54edca5efb21480bf5ea421096e2b
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'sort\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'sort\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit05c54edca5efb21480bf5ea421096e2b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit05c54edca5efb21480bf5ea421096e2b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
