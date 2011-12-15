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
require_once dirname(__FILE__) . '/../config/LetterTypesConfiguration.php';
require_once dirname(__FILE__) . '/../lib/LetterTypes.php';

class LinkedLettersAndTypesConfigurationTest extends PHPUnit_Framework_TestCase {
    public function testAreAllLettersFromLinkedLettersInLettersFromLetterTypes() {
        $lettersWithLinkedLetters = LinkedLettersConfiguration::getLettersWithLinkedLetters();
        $letterTypesWithLetters = LetterTypesConfiguration::getLetterTypesWithLetters();

        foreach ($lettersWithLinkedLetters as $letter => $linkedLettersToIgnore) {
            $isLetterInTypes = false;
            foreach ($letterTypesWithLetters as $lettersOfType) {
                $isLetterInLetters = strpos($lettersOfType, $letter);

                if (false !== $isLetterInLetters) {
                    $isLetterInTypes = true;
                    break;
                }
            }

            $this->assertTrue($isLetterInTypes);
        }
    }

    public function testHaveLettersAtLeastOneLinkedLetterOfDifferentType() {
        $lettersWithLinkedLetters = LinkedLettersConfiguration::getLettersWithLinkedLetters();
        $letterTypes = new LetterTypes();

        foreach ($lettersWithLinkedLetters as $letter => $linkedLetters) {
            $letterType = $letterTypes->getLetterType($letter);

            $hasOneDifferentType = false;
            $maximumLetterIndex = strlen($linkedLetters);
            for ($letterIndex = 0; $letterIndex < $maximumLetterIndex; $letterIndex++) {
                $linkedLetterType = $letterTypes->getLetterType($linkedLetters[$letterIndex]);

                if ($letterType !== $linkedLetterType) {
                    $hasOneDifferentType = true;
                    break;
                }
            }

            $this->assertTrue($hasOneDifferentType);
        }
    }
}
