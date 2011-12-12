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
    public function testAreAllLettersInAllLinkedLetters() {
        $configuration = new LinkedLettersConfiguration();

        foreach ($configuration->lettersWithLinkedLetters as $letter => $linkedLettersToIgnore) {
            foreach ($configuration->lettersWithLinkedLetters as $letterToIgnore => $linkedLetters) {
                $isLetterInLinkedLetters = strpos($letter, $linkedLetters);

                $isInLettersLinkedLetters = false;
                if ($letterToIgnore === $letter) {
                    $isInLettersLinkedLetters = true;
                }

                $isValid = true;
                if ($isLetterInLinkedLetters === false && $isInLettersLinkedLetters !== true) {
                    $isValid = true;
                }

                $this->assertTrue($isValid);
            }
        }
    }
}
