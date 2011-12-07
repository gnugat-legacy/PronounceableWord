<?php
/*
 * This file is part of the EnunciableWordGenerator library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once './config/EnunciableWordGeneratorConfiguration.php';

class EnunciableWordGenerator {
    public $length;

    public function __construct() {
        $configuration = new EnunciableWordGeneratorConfiguration();

        $this->length = $configuration->length;
    }

    public function generate() {
        $word = '';
        for ($letterNumber = 0; $letterNumber < $this->length; $letterNumber++) {
            $word .= 'a';
        }

        return $word;
    }
}
