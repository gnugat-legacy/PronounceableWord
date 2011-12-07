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
    public function testLength() {
        $length = 1;
        $maximumTestNumber = 1000;
        for ($currentTestNumber = 0; $currentTestNumber < $maximumTestNumber; $currentTestNumber++) {
            $enunciableWordGenerator = new EnunciableWordGenerator();

            $enunciableWordGenerator->length = $length;

            $generatedWord = $enunciableWordGenerator->generate();

            $this->assertEquals($length, strlen($generatedWord));
            $length++;
        }
    }

    public function testPreconfiguredLength() {
        $configuration = new EnunciableWordGeneratorConfiguration();
        $enunciableWordGenerator = new EnunciableWordGenerator();

        $generatedWord = $enunciableWordGenerator->generate();

        $this->assertEquals($configuration->length, strlen($generatedWord));
    }
}
