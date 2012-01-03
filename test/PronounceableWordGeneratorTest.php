<?php
/*
 * This file is part of the PronounceableWord library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../src/PronounceableWord/Generator.php';

class PronounceableWord_Tests_GeneratorTest extends PHPUnit_Framework_TestCase {
    public function testGeneratedLength() {
        $maximumLength = 100;
        for ($length = 1; $length <= $maximumLength; $length++) {
            $pronounceableWordGenerator = new PronounceableWord_Generator();

            $generatedWord = $pronounceableWordGenerator->generateWordOfGivenLength($length);

            $this->assertEquals($length, strlen($generatedWord));
        }
    }
}
