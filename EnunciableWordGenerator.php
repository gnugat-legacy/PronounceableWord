<?php
class EnunciableWordGenerator {
    public $length;

    /**
     * Generates an enunciable word.
     *
     * @return string The generated word.
     */
    public function generate() {
        $word = '';
        for ($letterNumber = 0; $letterNumber < $this->length; $letterNumber++) {
            $word .= 'a';
        }

        return $word;
    }
}
