<?php
/*
 * This file is part of the PronounceableWordGenerator library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../config/LinkedLettersConfiguration.php';

class LinkedLetters {
    protected $lettersWithLinkedLetters;

    public function __construct() {
        $configuration = new LinkedLettersConfiguration();

        $this->lettersWithLinkedLetters = $configuration->lettersWithLinkedLetters;
    }

    public function pickLetter() {
        $pickedLetter = array_rand($this->lettersWithLinkedLetters);

        return $pickedLetter;
    }

    public function pickLinkedLetter($letter) {
        $linkedLetters = $this->lettersWithLinkedLetters[$letter];

        $minLetterIndex = 0;
        $maxLetterIndex = strlen($linkedLetters) - 1;
        $pickedLetterIndex = rand($minLetterIndex, $maxLetterIndex);

        $pickedLetter = $linkedLetters[$pickedLetterIndex];

        return $pickedLetter;
    }
}
