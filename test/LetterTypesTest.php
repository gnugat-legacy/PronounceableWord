<?php
/*
 * This file is part of the PronounceableWord library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../src/PronounceableWord/LetterTypes.php';

class PronounceableWord_Tests_LetterTypesTest extends PHPUnit_Framework_TestCase {
    public function testGetLetterType() {
        $letterTypes = new PronounceableWord_LetterTypes();

        foreach (PronounceableWord_Configuration_LetterTypes::$letterTypesWithLetters as $letterType => $letters) {
            $maximumLetterIndex = strlen($letters);
            for ($letterIndex = 0; $letterIndex < $maximumLetterIndex; $letterIndex++) {
                $letter = $letters[$letterIndex];

                $this->assertSame($letterType, $letterTypes->getLetterType($letter));
            }
        }
    }

    public function testGetLettersOfGivenType() {
        $letterTypes = new PronounceableWord_LetterTypes();

        foreach (PronounceableWord_Configuration_LetterTypes::$letterTypesWithLetters as $letterType => $letters) {
            $this->assertSame($letters, $letterTypes->getLettersOfGivenType($letterType));
            $maximumLetterIndex = strlen($letters);
        }
    }

    public function testIsThereAtLeastTwoTypes() {
        $minimumLetterTypesNumber = 2;

        $this->assertGreaterThanOrEqual($minimumLetterTypesNumber, PronounceableWord_Configuration_LetterTypes::$letterTypesWithLetters);
    }
}
