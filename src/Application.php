<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WordPlate;

/**
 * This is the application class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Application
{
    /**
     * Initialize WordPlate.
     *
     * @return void
     */
    public function __construct()
    {
        $this->loadHelpers();
        $this->loadModules();
    }

    /**
     * Load the helpers file.
     *
     * @return void
     */
    private function loadHelpers()
    {
        $this->loadFilePath(__DIR__.'/helpers.php');
    }

    /**
     * Load framework dependencies.
     *
     * @return void
     */
    private function loadModules()
    {
        foreach (glob(__DIR__.'/../modules/*.php') as $file) {
            $this->loadFilePath($file);
        }
    }

    /**
     * Load file by their path.
     *
     * @param $path
     *
     * @return void
     */
    private function loadFilePath($path) {
        if (is_file($path)) {
            require $path;
        }
    }
}
