The password generator example
==============================

This page is intended to provide an example of usage and configuration, to
generate passwords with PronounceableWord.

First create your project. You should have something like::

    <?php
    // File "/index.php".


Installation
============

First, get the last stable version, and put it in an accessible directory::

    <?php
    // File "/index.php".

    require_once dirname(__FILE__) . '/vendors/PronounceableWord/src/PronounceableWord/Generator.php';

For now, you should have a fully operationnal generator::

    <?php
    // File "/index.php".

    require_once dirname(__FILE__) . '/vendors/PronounceableWord/src/PronounceableWord/Generator.php';

    define('MINIMUM_LENGTH', 4);
    define('MAXIMUM_LENGTH', 8);

    $length = rand(MINIMUM_LENGTH, MAXIMUM_LENGTH);

    $generator = new PronounceableWord_Generator();
    $generator->generateWordOfGivenLength($length);

Configuration
=============

Let's say that the standard configuration doesn't please you, because you think
that password should also contain integers.

Linked letters configuration
----------------------------

The first thing is to tweak the linked letters to add integers::

    <?php
    // File "./vendors/PronounceableWord/src/PronounceableWord/Configuration/LinkedLetters.php"
    class PronounceableWord_Configuration_LinkedLetters {
        public static $lettersWithLinkedLetters = array(
            'a' => 'abcdefhiklmnorstuvwxyz0123456789',
            'b' => 'abeiloruy0123456789',
            'c' => 'acehikloruy0123456789',
            'd' => 'aegilmnorsuy0123456789',
            'e' => 'abcdegiklmnoprstvwxy0123456789',
            'f' => 'aeilry0123456789',
            'g' => 'aeghiloruwy0123456789',
            'h' => 'aeiouy0123456789',
            'i' => 'acdefglmnoprstvxz0123456789',
            'j' => 'aeou0123456789',
            'k' => 'aeiruy0123456789',
            'l' => 'abcdefghijklmnoprstuvwxyz0123456789',
            'm' => 'abeimosuy0123456789',
            'n' => 'adeilnorsty0123456789',
            'o' => 'abcdefghiklmnoprstuwy0123456789',
            'p' => 'aehilort0123456789',
            'r' => 'acdegiklmnoprsuvy0123456789',
            's' => 'acehilopstuy0123456789',
            't' => 'aehinortuwy0123456789',
            'u' => 'abcdefgklmnprst0123456789',
            'v' => 'aeio0123456789',
            'w' => 'aehinory0123456789',
            'x' => 'aiu0123456789',
            'y' => 'acdelnorstz0123456789',
            'z' => 'aioyz0123456789',
            '0' => 'abcdefghijklmnopqrstuvwxyz0123456789',
            '1' => 'abcdefghijklmnopqrstuvwxyz0123456789',
            '2' => 'abcdefghijklmnopqrstuvwxyz0123456789',
            '3' => 'abcdefghijklmnopqrstuvwxyz0123456789',
            '4' => 'abcdefghijklmnopqrstuvwxyz0123456789',
            '5' => 'abcdefghijklmnopqrstuvwxyz0123456789',
            '6' => 'abcdefghijklmnopqrstuvwxyz0123456789',
            '7' => 'abcdefghijklmnopqrstuvwxyz0123456789',
            '8' => 'abcdefghijklmnopqrstuvwxyz0123456789',
            '9' => 'abcdefghijklmnopqrstuvwxyz0123456789',
        );
    }

Letter type configuration
-------------------------

Then tweak the letter types to add integers::

    <?php
    // File "./vendors/PronounceableWord/src/PronounceableWord/Configuration/LetterTypes.php"
    class PronounceableWord_Configuration_LetterTypes {
        public static $letterTypesWithLetters = array(
            'voyels' => 'aeiouy',
            'consonants' => 'bcdfghjklmnprstvwxz',
            'integers' => '0123456789',
        );
    }

Testing the new configuration
=============================

To make sure that the new configuration won't make PronounceableWord
crash, be safe by testing it.

Installing PHPUnit
------------------

First, install PHPUnit (https://github.com/sebastianbergmann/phpunit/) (>= 3.5).
The best way to do so is to use PEAR by following these instructions:
http://www.phpunit.de/manual/3.0/en/installation.html

Installing PEAR
---------------

PEAR (http://pear.php.net/) is necessary to use PHPUnit. To install it, follow
these instructions: http://pear.php.net/manual/en/installation.getting.php

If you are on Windows, and using WAMP or EasyPHP (or maybe others web
development plateforms), you might encounter the following error::

    phar "C:\wamp\bin\php\php5.3.0\PEAR\go-pear.phar" does not have a signature PHP Warning: require_once(phar://go-pear.par/index.php): failed to open stream: phar error: invalid url or non-existent phar "phar://go-pear.phar/index.php" in C:\wamp\bin\php\php5.3.0\PEAR\go-pear.phar on line 1236

    Warning: require_once(phar://go-pear.par/index.php): failed to open stream: phar error: invalid url or non-existent phar "phar://go-pear.phar/index.php" in C:\wamp\bin\php\php5.3.0\PEAR\go-pear.phar on line 1236 Press any key to continue...

This is because the PHP setting "phar.require_hash" is set to "On" by default.
If you set it to "Off" in your "php.ini", you should be able to continue.

Testing
-------

To test your configuration, just run the following command in CLI:

    phpunit ./vendors/PronounceableWord/test

In this example, no errors should occur. If you encounter an error in your
custom configuration, it might be for the folowing reasons:

* a letter from ``PronounceableWord_Configuration_LinkedLetters->lettersWithLinkedLetters`` might
  not be present in at least one linked letters;
* a linked letter from ``PronounceableWord_Configuration_LinkedLetters->lettersWithLinkedLetters``
  might not be present in letters;
* a letter from ``PronounceableWord_Configuration_LetterTypes->letterTypesWithLetters`` might be
  present in more than one type;
* a letter from ``PronounceableWord_Configuration_LinkedLetters->lettersWithLinkedLetters`` might
  not be present in types from
  ``PronounceableWord_Configuration_LetterTypes->letterTypesWithLetters``;
* a letter from ``PronounceableWord_Configuration_LinkedLetters->lettersWithLinkedLetters`` might
  not have at least one letter of a different type.

Conclusion
==========

You now have a pronounceable password generator. If you want to use upper and
lower case, you should use a function aferwards:

    <?php
    // File "./addUppercase.php"
    define('CHOOSE_LOWER_CASE', 0);
    define('CHOOSE_UPPER_CASE', 1);

    function addUppercase($word) {
        $maximumLetterIndex = strlen($word);
        for ($letterIndex = 0; $letterIndex < $maximumLetterIndex, $letterIndex++) {
            $choice = rand(CHOOSE_LOWER_CASE, CHOOSE_UPPER_CASE);
            if (CHOOSE_UPPER_CASE === $choice) {
                $word[$letterIndex] = strtoupper($word[$letterIndex]);
            }
        }

        return $word;
    }

And:

    <?php
    // File "/index.php".

    require_once dirname(__FILE__) . '/vendors/PronounceableWord/src/PronounceableWord/Generator.php';

    define('MINIMUM_LENGTH', 4);
    define('MAXIMUM_LENGTH', 8);

    $length = rand(MINIMUM_LENGTH, MAXIMUM_LENGTH);

    $generator = new PronounceableWord_Generator();
    $password = $generator->generateWordOfGivenLength($length);

    $password = addUppercase($password);
