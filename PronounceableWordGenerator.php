<?php
/*
 * This file is part of the PronounceableWordGenerator library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/lib/LinkedLetters.php';
require_once dirname(__FILE__) . '/lib/LetterTypes.php';
require_once dirname(__FILE__) . '/lib/LastLettersConsecutiveTypes.php';

class PronounceableWordGenerator {
    protected $word;
    protected $length;

    protected $linkedLetters;
    protected $letterTypes;
    protected $lastLettersConsecutiveTypes;

    public function __construct() {
        $this->linkedLetters = new LinkedLetters();
        $this->letterTypes = new LetterTypes();
        $this->lastLettersConsecutiveTypes = new LastLettersConsecutiveTypes();
    }

    public function generateWordOfGivenLength($givenLength) {
        $this->word = '';
        $this->length = 0;
        for ($letterNumber = 0; $letterNumber < $givenLength; $letterNumber++) {
            $this->word .= $this->pickNextLetter();
            $this->length = strlen($this->word);
        }

        return $this->word;
    }

    protected function pickNextLetter() {
        $pickedLetter = '';

        if (0 === $this->length) {
            $pickedLetter = $this->pickFirstLetter();
        } elseif (1 === $this->length) {
            $pickedLetter = $this->pickLinkedLetterOfDifferentType($this->word[0]);
        } else {
            $pickedLetter = $this->pickLinkedLetterOfDifferentTypeIfLastLettersAreOfConsecutiveTypes();
        }

        return $pickedLetter;
    }

    protected function pickFirstLetter() {
        return $this->linkedLetters->pickLetter();
    }

    protected function pickLinkedLetterOfDifferentType($letter) {
        $letterType = $this->letterTypes->getLetterType($letter);
        $lettersToAvoid = $this->letterTypes->getLettersOfGivenType($letterType);

        return $this->linkedLetters->pickLinkedLetterDifferentFromGivenLetters($letter, $lettersToAvoid);
    }

    protected function pickLinkedLetterOfDifferentTypeIfLastLettersAreOfConsecutiveTypes() {
        $lastLetter = $this->word[$this->length - 1];
        $pickedLetter = '';
        if (2 === $this->lastLettersConsecutiveTypes->countFromWord($this->word)) {
            $pickedLetter = $this->pickLinkedLetterOfDifferentType($lastLetter);
        } else {
            $pickedLetter = $this->linkedLetters->pickLinkedLetter($lastLetter);
        }

        return $pickedLetter;
    }
}
