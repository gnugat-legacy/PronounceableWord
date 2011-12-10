<?php
/*
 * This file is part of the PronounceableWordGenerator library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../lib/LastLettersConsecutiveTypes.php';

class LastLettersConsecutiveTypesTest extends PHPUnit_Framework_TestCase {
    public function testCountFromWordOfOneType() {
        $letterTypesConfiguration = new LetterTypesConfiguration();
        $lastLettersconsecutiveTypes = new LastLettersConsecutiveTypes();

        foreach ($letterTypesConfiguration->letterTypesWithLetters as $letterType => $letters) {
            $maximumLetterNumber = strlen($letters);
            $word = '';
            for ($letterNumber = 1; $letterNumber < $maximumLetterNumber; $letterNumber++) {
                $letter = rand(0, strlen($letters) - 1);
                $word .= $letters[$letter];

                $this->assertSame($letterNumber, $lastLettersconsecutiveTypes->countFromWord($word));
            }
        }
    }

    public function testCountFromWordOfMultipleTypes() {
        $letterTypesConfiguration = new LetterTypesConfiguration();
        $lastLettersconsecutiveTypes = new LastLettersConsecutiveTypes();

        foreach ($letterTypesConfiguration->letterTypesWithLetters as $letterType => $letters) {
            $maximumLetterNumber = strlen($letters);

            foreach ($letterTypesConfiguration->letterTypesWithLetters as $otherLetterType => $otherLetters) {
                if ($otherLetterType != $letterType) {
                    $word = $otherLetters;
                    break;
                }
            }

            for ($letterNumber = 1; $letterNumber < $maximumLetterNumber; $letterNumber++) {
                $letter = rand(0, strlen($letters) - 1);
                $word .= $letters[$letter];

                $this->assertSame($letterNumber, $lastLettersconsecutiveTypes->countFromWord($word));
            }
        }
    }
}

