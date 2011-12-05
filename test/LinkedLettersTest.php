<?php
require_once './lib/LinkedLetters.php';

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

    public function testPickLinkedLetter() {
        $configuration = new EnunciableWordGeneratorConfiguration();
        $linkedLetters = new LinkedLetters();

        $maximumTestNumber = 1000;
        foreach ($configuration->letters as $currentLetter => $currentLinkedLetters) {
            for ($currentTestNumber = 0; $currentTestNumber < $maximumTestNumber; $currentTestNumber++) {
                $chosenLinkedLetter = $linkedLetters->pickLinkedLetter($currentLetter);
                $isChosenLetterValid = in_array($chosenLinkedLetter, $currentLinkedLetters);

                $this->assertEquals(true, $isChosenLetterValid);
            }
        }
    }
}
