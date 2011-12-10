<?php
/*
 * This file is part of the PronounceableWordGenerator library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

class PronounceableWordGenerator {
    public function generateWordOfGivenLength($givenLength) {
        $word = '';
        for ($letterNumber = 0; $letterNumber < $givenLength; $letterNumber++) {
            $word .= 'a';
        }

        return $word;
    }
}
