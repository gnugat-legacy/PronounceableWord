<?php
/*
 * This file is part of the PronounceableWord library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../config/LetterTypesConfiguration.php';

class LetterTypes {
    public function getLetterType($letter) {
        $type = '';
        foreach (LetterTypesConfiguration::$letterTypesWithLetters as $letterType => $letters) {
            if (false !== strpos($letters, $letter)) {
                $type = $letterType;
                break;
            }
        }

        return $type;
    }

    public function getLettersOfGivenType($type) {
        return LetterTypesConfiguration::$letterTypesWithLetters[$type];
    }
}
