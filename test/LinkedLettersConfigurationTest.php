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

class LinkedLettersConfigurationTest extends PHPUnit_Framework_TestCase {
    public function testAreAllLettersInAtLeastOneLinkedLetters() {
        $lettersWithLinkedLetters = LinkedLettersConfiguration::getLettersWithLinkedLetters();

        foreach ($lettersWithLinkedLetters as $letter => $linkedLettersToIgnore) {
            $isInAtLeastOneLinkedLetters = false;
            foreach ($lettersWithLinkedLetters as $letterToIgnore => $linkedLetters) {
                $isLetterInLinkedLetters = strpos($linkedLetters, $letter);

                if (false !== $isLetterInLinkedLetters) {
                    $isInAtLeastOneLinkedLetters = true;
                    break;
                }
            }

            $this->assertTrue($isInAtLeastOneLinkedLetters);
        }
    }

    public function testAreAllLinkedLettersInLetters() {
        $lettersWithLinkedLetters = LinkedLettersConfiguration::getLettersWithLinkedLetters();

        foreach ($lettersWithLinkedLetters as $letterToIgnore => $linkedLetters) {
            $isLinkedLetterInLetters = false;
            foreach ($lettersWithLinkedLetters as $letter => $linkedLettersToIgnore) {
                $isLetterInLinkedLetters = strpos($linkedLetters, $letter);

                if (false !== $isLetterInLinkedLetters) {
                    $isInAtLeastOneLinkedLetters = true;
                    break;
                }
            }

            $this->assertTrue($isInAtLeastOneLinkedLetters);
        }
    }
}
