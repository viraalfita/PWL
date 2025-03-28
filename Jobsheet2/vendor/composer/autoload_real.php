<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf1eabf2e97f069a1ec1f27efdfc5acd7
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitf1eabf2e97f069a1ec1f27efdfc5acd7', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf1eabf2e97f069a1ec1f27efdfc5acd7', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf1eabf2e97f069a1ec1f27efdfc5acd7::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
