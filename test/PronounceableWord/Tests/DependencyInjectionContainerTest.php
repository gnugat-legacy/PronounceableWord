<?php
/*
 * This file is part of the PronounceableWord library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../../../src/PronounceableWord/DependencyInjectionContainer.php';

class PronounceableWord_Tests_DependencyInjectionContainerTest extends PHPUnit_Framework_TestCase {
    public function testGetGenerator() {
        $container = new PronounceableWord_DependencyInjectionContainer();
        $generator = $container->getGenerator();

        $this->assertInstanceOf('PronounceableWord_Generator', $generator);
    }

    public function testConfigurations() {
        $container = new PronounceableWord_DependencyInjectionContainer();

        foreach ($container->configurations as $class => $configuration) {
            $configurationClass = 'PronounceableWord_Configuration_' . ucfirst($class);

            $this->assertInstanceOf($configurationClass, $configuration);
        }
    }
}
