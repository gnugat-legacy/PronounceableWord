<?php
/*
 * This file is part of the PronounceableWordGenerator library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../config/PronounceableWordGeneratorConfiguration.php';

class PronounceableWordGeneratorConfigurationTest extends PHPUnit_Framework_TestCase {
    public function testIsMaximumConsecutiveTypesAtTheBeginingPositive() {
        $this->assertGreaterThan(0, PronounceableWordGeneratorConfiguration::$maximumConsecutiveTypesAtTheBegining);
    }
}
