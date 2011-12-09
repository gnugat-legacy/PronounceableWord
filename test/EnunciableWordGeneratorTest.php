<?php
/*
 * This file is part of the EnunciableWordGenerator library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../EnunciableWordGenerator.php';

class EnunciableWordGeneratorTest extends PHPUnit_Framework_TestCase {
    public function testGeneratedLength() {
        $length = 1;
        $maximumTestNumber = 1000;
        for ($currentTestNumber = 0; $currentTestNumber < $maximumTestNumber; $currentTestNumber++) {
            $enunciableWordGenerator = new EnunciableWordGenerator();

            $generatedWord = $enunciableWordGenerator->generateWordOfGivenLength($length);

            $this->assertEquals($length, strlen($generatedWord));
            $length++;
        }
    }
}
