<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit7487d6d2b2fa0eda2e9e64424b859177
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

        spl_autoload_register(array('ComposerAutoloaderInit7487d6d2b2fa0eda2e9e64424b859177', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit7487d6d2b2fa0eda2e9e64424b859177', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit7487d6d2b2fa0eda2e9e64424b859177::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
