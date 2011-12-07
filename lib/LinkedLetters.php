<?php
/*
 * This file is part of the EnunciableWordGenerator library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once './config/LinkedLettersConfiguration.php';

class LinkedLetters {
    protected $letters;

    public function __construct() {
        $configuration = new LinkedLettersConfiguration();

        $this->letters = $configuration->letters;
    }

    public function pickLetter() {
        $pickedLetter = array_rand($this->letters);

        return $pickedLetter;
    }

    public function pickLinkedLetter($letter) {
        $choiceOfLetters = $this->letters[$letter];

        $minLetterIndex = 0;
        $maxLetterIndex = strlen($choiceOfLetters) - 1;
        $pickedLetterIndex = rand($minLetterIndex, $maxLetterIndex);

        $pickedLetter = $choiceOfLetters[$pickedLetterIndex];

        return $pickedLetter;
    }
}
