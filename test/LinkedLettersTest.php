<?php
/*
 * This file is part of the PronounceableWord library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../lib/LinkedLetters.php';

class LinkedLettersTest extends PHPUnit_Framework_TestCase {
    public function testPickLetter() {
        $linkedLetters = new LinkedLetters();

        $maximumTestNumber = 1000;
        for ($currentTestNumber = 0; $currentTestNumber < $maximumTestNumber; $currentTestNumber++) {
            $chosenLetter = $linkedLetters->pickLetter();

            $this->assertArrayHasKey($chosenLetter, LinkedLettersConfiguration::$lettersWithLinkedLetters);
        }
    }

    public function testPickLinkedLetter() {
        $linkedLetters = new LinkedLetters();

        $maximumTestNumber = 1000;
        foreach (LinkedLettersConfiguration::$lettersWithLinkedLetters as $currentLetter => $currentLinkedLetters) {
            for ($currentTestNumber = 0; $currentTestNumber < $maximumTestNumber; $currentTestNumber++) {
                $chosenLinkedLetter = $linkedLetters->pickLinkedLetter($currentLetter);

                $isChosenLetterInLinkedLetters = strpos($currentLinkedLetters, $chosenLinkedLetter);

                $this->assertNotEquals(false, $isChosenLetterInLinkedLetters);
            }
        }
    }

    public function testPickLinkedLetterDifferentFromGivenLetters() {
        $linkedLetters = new LinkedLetters();

        $maximumTestNumber = 1000;
        foreach (LinkedLettersConfiguration::$lettersWithLinkedLetters as $currentLetter => $currentLinkedLetters) {
            for ($currentTestNumber = 0; $currentTestNumber < $maximumTestNumber; $currentTestNumber++) {
                $chosenLinkedLetter = $linkedLetters->pickLinkedLetterDifferentFromGivenLetters($currentLetter, $currentLetter);

                $isChosenLetterInLinkedLetters = strpos($currentLinkedLetters, $chosenLinkedLetter);

                $isChosenLetterDifferentThanCurrentLetter = false;
                if ($chosenLinkedLetter !== $currentLetter) {
                    $isChosenLetterDifferentThanCurrentLetter = true;
                }

                $isChosenLetterValid = false;
                if (false !== $isChosenLetterInLinkedLetters && true === $isChosenLetterDifferentThanCurrentLetter) {
                    $isChosenLetterValid = true;
                }

                $this->assertTrue($isChosenLetterValid);
            }
        }
    }
}
