Pronounceable Word Generator
============================

A light, customizable and simple PHP (>= 5.2) library generating random and
pronounceable words without using dictionaries or Markov chains.

This can be useful to generate pronounceable names, passwords and fixtures.

### Warning

Offensive or insulting words might be generated because of the random nature
of the generator (see [how to manage them][1]).

**Currently under development**.

Installation and usage
----------------------

First, get the last stable version, and put it in an accessible directory:

    <?php
    // File "/index.php".
    
    require_once dirname(__FILE__) . '/vendors/PronounceableWordGenerator/PronounceableWordGenerator.php';

Enable configuration files (in the [config][2] directory) by renaming them, without the ".default" suffix:

    cp ./vendors/PronounceableWordGenerator/*.php{.default,}

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
just edit as you wish the files in the [config][2] directory (see [how to configure][3]).

Don't forget to run tests after.

### Tests

Tests are done using [PHPUnit][4] (>=3.5) in the [test][5] directory (see [how to test][6]).

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

* Copyright and MIT license: [LICENSE.txt][7];
* versions and change log: [CHANGELOG.txt][8];
* technical documentation: [wiki][9].

Contributing
------------

1. [Fork it][10];
2. Create a branch (`git checkout -b my_branch`);
3. Commit your changes (`git commit -am "Changes description message"`);
4. Push to the branch (`git push origin my_branch`);
5. Create an [Issue][11] with a link to your branch;
6. Wait for it to be accepted/argued.


[1]: https://github.com/gnugat/PronounceableWordGenerator/wiki/OffensiveAndInsultingWordsManagement
[2]: https://github.com/gnugat/PronounceableWordGenerator/tree/master/config
[3]: https://github.com/gnugat/PronounceableWordGenerator/wiki/Configuration
[4]: https://github.com/sebastianbergmann/phpunit/
[5]: https://github.com/gnugat/PronounceableWordGenerator/tree/master/test
[6]: https://github.com/gnugat/PronounceableWordGenerator/wiki/Tests
[7]: https://github.com/gnugat/PronounceableWordGenerator/blob/master/LICENSE.txt
[8]: https://github.com/gnugat/PronounceableWordGenerator/blob/master/CHANGELOG.txt
[9]: https://github.com/gnugat/PronounceableWordGenerator/wiki
[10]: https://github.com/gnugat/PronounceableWordGenerator/fork_select
[11]: https://github.com/gnugat/PronounceableWordGenerator/issues
