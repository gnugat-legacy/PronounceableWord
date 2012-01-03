<?php
/*
 * This file is part of the PronounceableWord library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/Configuration/Generator.php';
require_once dirname(__FILE__) . '/LinkedLetters.php';
require_once dirname(__FILE__) . '/LetterTypes.php';
require_once dirname(__FILE__) . '/LastLettersConsecutiveTypes.php';

class PronounceableWord_Generator {
    protected $word;
    protected $length;

    protected $linkedLetters;
    protected $letterTypes;
    protected $lastLettersConsecutiveTypes;

    public function __construct() {
        $this->linkedLetters = new PronounceableWord_LinkedLetters();
        $this->letterTypes = new PronounceableWord_LetterTypes();
        $this->lastLettersConsecutiveTypes = new PronounceableWord_LastLettersConsecutiveTypes();
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
        } elseif ($this->length <= PronounceableWord_Configuration_Generator::$maximumConsecutiveTypesAtTheBegining) {
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
        $consecutiveTypes = $this->lastLettersConsecutiveTypes->countFromWord($this->word);

        $pickedLetter = '';
        if ($consecutiveTypes === PronounceableWord_Configuration_Generator::$maximumConsecutiveTypesInTheWord) {
            $pickedLetter = $this->pickLinkedLetterOfDifferentType($lastLetter);
        } else {
            $pickedLetter = $this->linkedLetters->pickLinkedLetter($lastLetter);
        }

        return $pickedLetter;
    }
}
