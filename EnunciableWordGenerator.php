<?php
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
