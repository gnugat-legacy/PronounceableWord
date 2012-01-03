<?php
/*
 * This file is part of the PronounceableWord library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../../../src/PronounceableWord/LastLettersConsecutiveTypes.php';

class PronounceableWord_Tests_LastLettersConsecutiveTypesTest extends PHPUnit_Framework_TestCase {
    public function testCountFromWordOfOneType() {
        $lastLettersConsecutiveTypes = new PronounceableWord_LastLettersConsecutiveTypes();

        foreach (PronounceableWord_Configuration_LetterTypes::$letterTypesWithLetters as $letterType => $letters) {
            $maximumLetterNumber = strlen($letters);
            $word = '';
            for ($letterNumber = 1; $letterNumber < $maximumLetterNumber; $letterNumber++) {
                $letter = rand(0, strlen($letters) - 1);
                $word .= $letters[$letter];

                $this->assertSame($letterNumber, $lastLettersConsecutiveTypes->countFromWord($word));
            }
        }
    }

    public function testCountFromWordOfMultipleTypes() {
        $lastLettersConsecutiveTypes = new PronounceableWord_LastLettersConsecutiveTypes();

        foreach (PronounceableWord_Configuration_LetterTypes::$letterTypesWithLetters as $letterType => $letters) {
            $maximumLetterNumber = strlen($letters);

            foreach (PronounceableWord_Configuration_LetterTypes::$letterTypesWithLetters as $otherLetterType => $otherLetters) {
                if ($otherLetterType != $letterType) {
                    $word = $otherLetters;
                    break;
                }
            }

            for ($letterNumber = 1; $letterNumber < $maximumLetterNumber; $letterNumber++) {
                $letter = rand(0, strlen($letters) - 1);
                $word .= $letters[$letter];

                $this->assertSame($letterNumber, $lastLettersConsecutiveTypes->countFromWord($word));
            }
        }
    }
}

