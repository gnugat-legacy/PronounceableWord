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

class PronounceableWord_Tests_GeneratorTest extends PHPUnit_Framework_TestCase {
    public function testGeneratedLength() {
        $container = new PronounceableWord_DependencyInjectionContainer();

        $maximumLength = 100;
        for ($length = 1; $length <= $maximumLength; $length++) {
            $generator = $container->getGenerator();

            $generatedWord = $generator->generateWordOfGivenLength($length);

            $this->assertEquals($length, strlen($generatedWord));
        }
    }
}
