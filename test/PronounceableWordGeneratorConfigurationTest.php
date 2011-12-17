<?php
/*
 * This file is part of the PronounceableWord library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../config/PronounceableWordGeneratorConfiguration.php';

class PronounceableWordGeneratorConfigurationTest extends PHPUnit_Framework_TestCase {
    protected $minimumPositiveNumber = 1;

    public function testIsMaximumConsecutiveTypesAtTheBeginingPositive() {
        $this->assertGreaterThanOrEqual($this->minimumPositiveNumber, PronounceableWordGeneratorConfiguration::$maximumConsecutiveTypesAtTheBegining);
    }

    public function testIsMaximumConsecutiveTypesInTheWordPositive() {
        $this->assertGreaterThanOrEqual($this->minimumPositiveNumber, PronounceableWordGeneratorConfiguration::$maximumConsecutiveTypesInTheWord);
    }
}
