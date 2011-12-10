<?php
/*
 * This file is part of the PronounceableWordGenerator library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../config/LetterTypesConfiguration.php';

class LetterTypes {
    protected $letterTypesWithLetters;

    public function __construct() {
        $configuration = new LetterTypesConfiguration();

        $this->letterTypesWithLetters = $configuration->letterTypesWithLetters;
    }

    public function getLetterType($letter) {
        $type = '';
        foreach ($this->letterTypesWithLetters as $letterType => $letters) {
            if (false !== strpos($letters, $letter)) {
                $type = $letterType;
                break;
            }
        }

        return $type;
    }
}
