<?php
require_once './lib/LinkedLetters.php';

class LinkedLettersTest extends PHPUnit_Framework_TestCase {
    public function testPickLetter() {
        $configuration = new EnunciableWordGeneratorConfiguration();
        $linkedLetters = new LinkedLetters();

        $maximumTestNumber = 1000;
        for ($currentTestNumber = 0; $currentTestNumber < $maximumTestNumber; $currentTestNumber++) {
            $chosenLetter = $linkedLetters->pickLetter();

            $this->assertArrayHasKey($chosenLetter, $configuration->letters);
        }
    }

    public function testPickLinkedLetter() {
        $configuration = new EnunciableWordGeneratorConfiguration();
        $linkedLetters = new LinkedLetters();

        $maximumTestNumber = 1000;
        foreach ($configuration->letters as $currentLetter => $currentLinkedLetters) {
            for ($currentTestNumber = 0; $currentTestNumber < $maximumTestNumber; $currentTestNumber++) {
                $chosenLinkedLetter = $linkedLetters->pickLinkedLetter($currentLetter);
                $isChosenLetterValid = strpos($currentLinkedLetters, $chosenLinkedLetter);

                $this->assertNotEquals(false, $isChosenLetterValid);
            }
        }
    }
}
