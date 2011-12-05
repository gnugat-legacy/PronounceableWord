<?php
require_once './config/EnunciableWordGeneratorConfiguration.php';

class LinkedLetters {
    protected $letters;

    public function __construct() {
        $configuration = new EnunciableWordGeneratorConfiguration();

        $this->letters = $configuration->letters;
    }

    public function pickLetter() {
        $pickedLetter = array_rand($this->letters);

        return $pickedLetter;
    }
}
