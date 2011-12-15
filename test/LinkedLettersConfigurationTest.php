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
        foreach (LinkedLettersConfiguration::$lettersWithLinkedLetters as $letter => $linkedLettersToIgnore) {
            $isInAtLeastOneLinkedLetters = false;
            foreach (LinkedLettersConfiguration::$lettersWithLinkedLetters as $letterToIgnore => $linkedLetters) {
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
        foreach (LinkedLettersConfiguration::$lettersWithLinkedLetters as $letterToIgnore => $linkedLetters) {
            $isLinkedLetterInLetters = false;
            foreach (LinkedLettersConfiguration::$lettersWithLinkedLetters as $letter => $linkedLettersToIgnore) {
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
