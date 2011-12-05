<?php
require '../EnunciableWordGenerator.php';

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
}
