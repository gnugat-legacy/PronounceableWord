<?php
require '../EnunciableWordGenerator.php';

class EnunciableWordGeneratorTest extends PHPUnit_Framework_TestCase {
    public function testLength() {
        $minimumLength = 1;

        $maximumTestNumber = 1000;
        for ($currentTestNumber = 0; $currentTestNumber < $maximumTestNumber; $currentTestNumber++) {
            $enunciableWordGenerator = new EnunciableWordGenerator();

            $length = rand($minimumLength);
            $enunciableWordGenerator->setLength($length);

            $generatedWord = $enunciableWordGenerator->generate();

            $this->assertEquals($length, strlen($generatedWord));
        }
    }
}
