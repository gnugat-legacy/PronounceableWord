<?php
/*
 * This file is part of the PronounceableWord library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../../../../src/PronounceableWord/Configuration/LetterTypes.php';

class PronounceableWord_Tests_Configuration_LetterTypesTest extends PHPUnit_Framework_TestCase {
    public function testAreLettersInOnlyOneType() {
        foreach (PronounceableWord_Configuration_LetterTypes::$letterTypesWithLetters as $currentType => $lettersOfCurrentType) {
            $maximumLetterIndex = strlen($lettersOfCurrentType);
            $areLettersInOnlyOneType = true;
            foreach (PronounceableWord_Configuration_LetterTypes::$letterTypesWithLetters as $checkedType => $lettersOfCheckedType) {
                if ($currentType !== $checkedType) {
                    for ($letterIndex = 0; $letterIndex < $maximumLetterIndex; $letterIndex++) {
                        $isLetterInLetters = strpos($lettersOfCheckedType, $lettersOfCurrentType[$letterIndex]);

                        if (false !== $isLetterInLetters) {
                            $areLettersInOnlyOneType = false;
                            break 2;
                        }
                    }
                }
            }

            $this->assertTrue($areLettersInOnlyOneType);
        }
    }
}
