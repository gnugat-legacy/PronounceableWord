<?php
/*
 * This file is part of the PronounceableWord library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../config/LinkedLettersConfiguration.php';

class LinkedLetters {
    public function pickLetter() {
        $pickedLetter = array_rand(LinkedLettersConfiguration::$lettersWithLinkedLetters);

        return $pickedLetter;
    }

    public function pickLinkedLetter($letter) {
        $linkedLetters = LinkedLettersConfiguration::$lettersWithLinkedLetters[$letter];

        return $this->pickLetterFromGivenLetters($linkedLetters);
    }

    protected function pickLetterFromGivenLetters($letters) {
        $minLetterIndex = 0;
        $maxLetterIndex = strlen($letters) - 1;
        $pickedLetterIndex = rand($minLetterIndex, $maxLetterIndex);

        $pickedLetter = $letters[$pickedLetterIndex];

        return $pickedLetter;
    }

    public function pickLinkedLetterDifferentFromGivenLetters($letter, $letters) {
        $linkedLetters = LinkedLettersConfiguration::$lettersWithLinkedLetters[$letter];

        $letterChoices = $this->removeGivenLettersFromGivenLinkedLetters($letters, $linkedLetters);

        return $this->pickLetterFromGivenLetters($letterChoices);
    }

    protected function removeGivenLettersFromGivenLinkedLetters($letters, $linkedLetters) {
        $maximumLetterIndex = strlen($letters);
        for ($letterIndex = 0; $letterIndex < $maximumLetterIndex; $letterIndex++) {
            $linkedLetters = str_replace($letters[$letterIndex], '', $linkedLetters);
        }

        return $linkedLetters;
    }
}
