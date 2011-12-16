Pronounceable Word Generator
============================

A light, customizable and simple PHP (>= 5.2) library generating random and
pronounceable words without using dictionaries or Markov chains.

This can be useful to generate pronounceable names, passwords and fixtures.

### Warning

Offensive or insulting words might be generated because of the random nature
of the generator (see [how to manage them](https://github.com/gnugat/PronounceableWordGenerator/wiki/OffensiveAndInsultingWordsManagement)).

**Currently under development**.

Installation and usage
----------------------

First, get the last stable version, and put it in an accessible directory:

    <?php
    // File "/index.php".
    
    require_once dirname(__FILE__) . '/vendors/PronounceableWordGenerator/PronounceableWordGenerator.php';

Enable configuration files (in the [config](https://github.com/gnugat/PronounceableWordGenerator/tree/master/config) directory) by renaming them,
without the ".default" suffix, or by running the install script from the
[bin](https://github.com/gnugat/PronounceableWordGenerator/tree/master/bin)
directory:

    ./install.sh # on Mac OS X, GNU/Linux and *BSD
    .\install.bat # on Windows

For now, you should have a fully operationnal generator:

    <?php
    // File "/index.php".
    
    require_once dirname(__FILE__) . '/vendors/PronounceableWordGenerator/PronounceableWordGenerator.php';

    define('MINIMUM_LENGTH', 4);
    define('MAXIMUM_LENGTH', 8);

    $length = rand(MINIMUM_LENGTH, MAXIMUM_LENGTH);

    $generator = new PronounceableWordGenerator();
    $word = $generator->generateWordOfGivenLength($length);

### Configuration

To customize the algorithm, the letters used, the linked letters or the types,
just edit as you wish the files in the [config](https://github.com/gnugat/PronounceableWordGenerator/tree/master/config)
directory (see [how to configure]([3]: https://github.com/gnugat/PronounceableWordGenerator/wiki/Configuration)).

Don't forget to run tests after.

### Tests

Tests are done using [PHPUnit](https://github.com/sebastianbergmann/phpunit/)
(>=3.5) in the [test](https://github.com/gnugat/PronounceableWordGenerator/tree/master/test)
directory (see [how to test](https://github.com/gnugat/PronounceableWordGenerator/wiki/Tests)).

### Examples

Here is a sample of examples that can be generated:

* xorir;
* tetazu;
* somaprosi;
* doir;
* liogg;
* janheptur;
* avefdy;
* owoc;
* pidta.

To generate more example, run the `generateExamples` binary in the [binaries](https://github.com/gnugat/PronounceableWordGenerator/tree/master/bin)
directory.

Algorithm
---------

Basically, the library will generate a word following these rules:

1. Choose randomly a letter;
2. choose randomly a linked letter of different type;
3. choose randomly a linked letter, of different type if the last letter is
   of consecutive types.

Where:

* "linked letter" is an arbitrary chosen letter that is expected to follow
  well the previous letter;
* "types" would be voyels and consonants;
* "consecutive" would be a group of two letters from the same "type".

The step 3 is repeated as many times as necessary.

Documentation
-------------

You can find more documentation at the following links:

* Copyright and MIT license: [LICENSE.txt](https://github.com/gnugat/PronounceableWordGenerator/blob/master/LICENSE.txt);
* versions and change log: [CHANGELOG.txt](https://github.com/gnugat/PronounceableWordGenerator/blob/master/CHANGELOG.txt);
* technical documentation: [wiki](https://github.com/gnugat/PronounceableWordGenerator/wiki).

Contributing
------------

1. [Fork it](https://github.com/gnugat/PronounceableWordGenerator/fork_select);
2. Create a branch (`git checkout -b my_branch`);
3. Commit your changes (`git commit -am "Changes description message"`);
4. Push to the branch (`git push origin my_branch`);
5. Create an [Issue](https://github.com/gnugat/PronounceableWordGenerator/issues) with a link to your branch;
6. Wait for it to be accepted/argued.
