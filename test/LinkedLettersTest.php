<?php
require './lib/LinkedLetters.php';

class LinkedLettersTest extends PHPUnit_Framework_TestCase {
    public function testPickLetter() {
        $configuration = new EnunciableWordGeneratorConfiguration();
        $linkedLetters = new LinkedLetters();

        $maximumTestNumber = 1000;
        for ($currentTestNumber = 0; $currentTestNumber < $maximumTestNumber; $currentTestNumber++) {
            $chosenLetter = $linkedLetters->pickLetter();
            $isChosenLetterValid = array_key_exists($chosenLetter, $configuration->letters);

            $this->assertEquals(true, $isChosenLetterValid);
        }
    }
}
