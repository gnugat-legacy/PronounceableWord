<?php
/*
 * This file is part of the EnunciableWordGenerator library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once './lib/LinkedLetters.php';

class LinkedLettersTest extends PHPUnit_Framework_TestCase {
    public function testPickLetter() {
        $configuration = new LinkedLettersConfiguration();
        $linkedLetters = new LinkedLetters();

        $maximumTestNumber = 1000;
        for ($currentTestNumber = 0; $currentTestNumber < $maximumTestNumber; $currentTestNumber++) {
            $chosenLetter = $linkedLetters->pickLetter();

            $this->assertArrayHasKey($chosenLetter, $configuration->letters);
        }
    }

    public function testPickLinkedLetter() {
        $configuration = new LinkedLettersConfiguration();
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
