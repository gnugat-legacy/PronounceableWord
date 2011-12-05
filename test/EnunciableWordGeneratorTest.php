<?php
require '../EnunciableWordGenerator.php';

class EnunciableWordGeneratorTest extends PHPUnit_Framework_TestCase {
    public function testLength() {
        $minimumLength = 1;
        $maximumLength = getrandmax();

        $maximumTestNumber = 1000;
        for ($currentTestNumber = 0; $currentTestNumber < $maximumTestNumber; $currentTestNumber++) {
            $enunciableWordGenerator = new EnunciableWordGenerator();

            $length = rand($minimumLength, $maximumLength);
            $enunciableWordGenerator->length = $length;

            $generatedWord = $enunciableWordGenerator->generate();

            $this->assertEquals($length, strlen($generatedWord));
        }
    }
}
