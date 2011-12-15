<?php
/*
 * This file is part of the PronounceableWordGenerator library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../lib/LetterTypes.php';

class LetterTypesTest extends PHPUnit_Framework_TestCase {
    public function testGetLetterType() {
        $letterTypes = new LetterTypes();

        foreach (LetterTypesConfiguration::$letterTypesWithLetters as $letterType => $letters) {
            $maximumLetterIndex = strlen($letters);
            for ($letterIndex = 0; $letterIndex < $maximumLetterIndex; $letterIndex++) {
                $letter = $letters[$letterIndex];

                $this->assertSame($letterType, $letterTypes->getLetterType($letter));
            }
        }
    }

    public function testGetLettersOfGivenType() {
        $letterTypes = new LetterTypes();

        foreach (LetterTypesConfiguration::$letterTypesWithLetters as $letterType => $letters) {
            $this->assertSame($letters, $letterTypes->getLettersOfGivenType($letterType));
            $maximumLetterIndex = strlen($letters);
        }
    }

    public function testIsThereAtLeastTwoTypes() {
        $minimumLetterTypesNumber = 2;

        $this->assertGreaterThanOrEqual($minimumLetterTypesNumber, LetterTypesConfiguration::$letterTypesWithLetters);
    }
}
