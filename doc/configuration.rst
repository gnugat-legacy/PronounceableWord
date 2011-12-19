Configuration
=============

This page will document the default configuration, and how to customize it.

Default configuration
=====================

The default configuration provides a set of linked letters based on the study
of Data Compression (http://www.data-compression.com/english.shtml#second),
using there statistical study of English text.

Some changes have been applied:

* only letters with a probability superior to 0.001 have been selected;
* the letter 'q' has been removed.

How to customize the configuration
==================================

The configuration is present to allow the PHP library **PronouceableWord** to
be flexible enough to meet your expectations. Follow the guide.

Linked letters configuration
----------------------------

Every letters can be linked to each other to form words. However, for a word
to be pronounceable, a letter can't be linked with every other. This is what
the class ``LinkedLettersConfiguration`` is for: setting to each letters
their own linked letters.

In order to make an accessible and more readable configuration, this setting
is saved in an associative array, where the key is the letter and the
associated string is the set of linked letters. You can modifiy existing
linked letters by adding or removing them, and you can add or remove a letter
with its linked letters.

If you remove a letter, don't forget to remove it from every linked letters,
and also for the ``LetterTypesConfiguration``.

If you add a new letter, don't forget to add it to the ``LetterTypesConfiguration``.

Finally, make sure that each letters is associated to at least one letter of
a different type.

Letter types configuration
--------------------------

Consonants and vowels are the default types of the provided letters. It is of
course possible to add new ones (integers, characters, etc..) or to remove some
of them as long as there are still at least two types left.

In order to make an accessible and more readable configuration, this setting is
saved in an associative array, where the key is the letter type and the
associated string is the set of letters.

Pronounceable word generator configuration
------------------------------------------

Finally, you can manage the number of consecutive letters of the same type
occurs:

* at the begining of the word;
* in the middle of the word.

Check your configuration by running tests
-----------------------------------------

To check if everything went well, you can run the following tests
(see how to test in ``./doc/tests.rst``):

* ``./test/LetterTypesConfigurationTest.php``;
* ``./test/LinkedLettersConfigurationTest.php``;
* ``./test/LinkedLettersAndTypesConfigurationTest.php``;
* ``./test/PronounceableWordGeneratorTest.php``.

Examples
========

Here are some short configuration examples, to show how it works::

    <?php
    // File "./config/LinkedLettersConfiguration.php".
    
    class LinkedLettersConfiguration {
        public static $lettersWithLinkedLetters = array(
            'a' => 'bc',
            'b' => 'ac',
            'c' => 'a0',
            '0' => 'abc',
        );
    }

    <?php
    // File "./config/LetterTypesConfiguration.php".

    class LetterTypesConfiguration {
        public static $letterTypesWithLetters = array(
            'vowels' => 'a',
            'consonants' => 'bc',
            'numbers' => '0',
        );
    }

    <?php
    // File "./config/PronounceableWordGeneratorConfiguration.php".

    class PronounceableWordGeneratorConfiguration {
        public static $maximumConsecutiveTypesAtTheBegining = 1;
        public static $maximumConsecutiveTypesInTheWord = 2;
    }

This configuration is fine:

* each letters have at least one linked letters of a different type;
* there are at least two different types;
* every letters are present in the letter types;
* the number of consecutive types are strictly positives.
