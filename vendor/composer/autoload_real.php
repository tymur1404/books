<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitfe3f5f8a8645ee10ecdc64ed8546db69
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitfe3f5f8a8645ee10ecdc64ed8546db69', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitfe3f5f8a8645ee10ecdc64ed8546db69', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitfe3f5f8a8645ee10ecdc64ed8546db69::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInitfe3f5f8a8645ee10ecdc64ed8546db69::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequirefe3f5f8a8645ee10ecdc64ed8546db69($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequirefe3f5f8a8645ee10ecdc64ed8546db69($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
