<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Tests;

use PHPUnit\Framework\TestCase;
use WordPlate\PluginLoader;

/**
 * This is the plugin loader test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class PluginLoaderTest extends TestCase
{
    public function testLoad()
    {
        $loader = $this->getLoader();

        $this->assertNull($loader->load());
    }

    public function testShowAdvancedPlugins()
    {
        $loader = $this->getLoader();

        $this->assertFalse($loader->showAdvancedPlugins(false, 'notmustuse'));
        $this->assertNull($loader->showAdvancedPlugins(false, 'mustuse'));
    }

    public function testActivatePlugins()
    {
        $loader = $this->getLoader();

        $this->assertFalse($loader->activatePlugins(false));
    }

    public function testGetRelativePath()
    {
        $loader = $this->getLoader();

        $this->assertSame('/../mu-plugins/', $loader->getRelativePath());
    }

    public function testGetPlugins()
    {
        $loader = $this->getLoader();

        $plugins = $loader->getPlugins();

        $this->assertSame(['marty/mcfly.php' => []], $loader->getPlugins());
    }

    public function testIsPluginsScreen()
    {
        $loader = $this->getLoader();

        $this->assertTrue($loader->isPluginsScreen());
    }

    protected function getLoader()
    {
        if (!defined('WP_PLUGIN_DIR')) {
            define('WP_PLUGIN_DIR', __DIR__.'/stubs/public/plugins');
            define('WPMU_PLUGIN_DIR', __DIR__.'/stubs/public/mu-plugins');
        }

        return new PluginLoader();
    }
}