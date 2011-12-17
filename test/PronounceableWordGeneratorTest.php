<?php
/*
 * This file is part of the PronounceableWord library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../PronounceableWordGenerator.php';

class PronounceableWordGeneratorTest extends PHPUnit_Framework_TestCase {
    public function testGeneratedLength() {
        $maximumLength = 100;
        for ($length = 1; $length <= $maximumLength; $length++) {
            $pronounceableWordGenerator = new PronounceableWordGenerator();

            $generatedWord = $pronounceableWordGenerator->generateWordOfGivenLength($length);

            $this->assertEquals($length, strlen($generatedWord));
        }
    }
}
