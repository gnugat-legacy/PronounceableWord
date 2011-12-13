Pronounceable Word Generator
============================

A light, customizable and simple PHP (>= 5.2) library generating random and
western pronounceable words without using dictionaries or Markov chains.

This can be useful to generate pronounceable names, passwords and fixtures.

### Warning

Offensive or insulting words might be generated because of the random nature
of the generator.

**Currently under development**.

Installation and usage
----------------------

First, get the last stable version from the [tags][1], and put it in an accessible directory:

    <?php
    // File "/index.php".
    
    require_once dirname(__FILE__) . '/vendors/PronounceableWordGenerator/PronounceableWordGenerator.php';

Enable configuration files by renaming them, without the ".default" suffix:

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

* Copyright and MIT license : [LICENSE.txt][3];
* versions and change log: [CHANGELOG.txt][4];
* technical documentation: [wiki][5].

Contributing
------------

1. [Fork it][6];
2. Create a branch (`git checkout -b my_branch`);
3. Commit your changes (`git commit -am "Changes description message"`);
4. Push to the branch (`git push origin my_branch`);
5. Create an [Issue][7] with a link to your branch;
6. Wait for it to be accepted/argued.


[1]: https://github.com/gnugat/PronounceableWordGenerator/tags
[2]: https://github.com/sebastianbergmann/phpunit/
[3]: https://github.com/gnugat/PronounceableWordGenerator/blob/master/LICENSE.txt
[4]: https://github.com/gnugat/PronounceableWordGenerator/blob/master/CHANGELOG.txt
[5]: https://github.com/gnugat/PronounceableWordGenerator/wiki
[6]: https://github.com/gnugat/PronounceableWordGenerator/fork_select
[7]: https://github.com/gnugat/PronounceableWordGenerator/issues
