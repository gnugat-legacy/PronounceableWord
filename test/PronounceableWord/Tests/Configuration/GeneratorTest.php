<?php
/*
 * This file is part of the PronounceableWord library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../../../../src/PronounceableWord/Configuration/Generator.php';

class PronounceableWord_Tests_Configuration_GeneratorTest extends PHPUnit_Framework_TestCase {
    protected $minimumPositiveNumber = 1;

    public function testIsMaximumConsecutiveTypesAtTheBeginingPositive() {
        $generatorConfiguration = new PronounceableWord_Configuration_Generator();

        $this->assertGreaterThanOrEqual($this->minimumPositiveNumber, $generatorConfiguration->maximumConsecutiveTypesAtTheBegining);
    }

    public function testIsMaximumConsecutiveTypesInTheWordPositive() {
        $generatorConfiguration = new PronounceableWord_Configuration_Generator();

        $this->assertGreaterThanOrEqual($this->minimumPositiveNumber, $generatorConfiguration->maximumConsecutiveTypesInTheWord);
    }
}
