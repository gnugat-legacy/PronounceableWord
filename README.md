Pronounceable Word Generator
============================

A light, customizable and simple PHP (>= 5.2) library generating random and
western pronounceable words without using dictionaries or Markov chains.

**Currently under development**.

Usage
-----

    require_once 'PronounceableWordGenerator/PronounceableWordGenerator.php';

    define('MINIMUM_LENGTH', 4);
    define('MAXIMUM_LENGTH', 8);

    $length = rand(MINIMUM_LENGTH, MAXIMUM_LENGTH);

    $pronounceableWordGenerator = new PronounceableWordGenerator();
    $generatedWord = $pronounceableWordGenerator->generateWordOfGivenLength($length);

Copyright and License
---------------------

This is the work of Loic Chardonnet, released under MIT License. Read the
[LICENSE.txt][1] file for more information.

Documentation
-------------

Basically, the library will generate a word following these rules:

1. Choose randomly a letter;
2. choose randomly a linked letter of different type;
4. choose randomly a linked letter, of different type if the last letter are
   of consecutive types.

Where "linked letter" is an arbitrary chosen letter that is expected to follow
well the previous letter, "types" would be voyels and consonants and
"consecutive" would be a group of two letters from the same "type". The step 3
is repeated as many times as necessary.

Further documentation would be found at the [Github wiki of this project][2]

### Warning

Offensive or insulting words might be generated because of the random nature
of the generator.

Installation
------------

The installation is pretty straightforward:

1. Get the last stable version and put it in an accessible directory (e.g.
   vendors);
2. copy the configuration files ending in "php.default" into "php" (in the
   config directory);
3. make the change you want in the classes *Configuration.php to custom.

### Testing

PronounceableWordGenerator is developed using [PHPUnit][3] (3.5), so you must have
it in your includes directory (for example using PEAR).

Once PHPUnit installed, you must run it in the root directory, calling the
tests located in /test/:

    phpunit ./test

Contributing
------------

1. [Fork it][4];
2. Create a branch (`git checkout -b my_branch`);
3. Commit your changes (`git commit -am "Changes description message"`);
4. Push to the branch (`git push origin my_branch`);
5. Create an [Issue][5] with a link to your branch;
6. Wait for it to be accepted/argued.


[1]: https://github.com/gnugat/PronounceableWordGenerator/blob/master/LICENSE.txt
[2]: https://github.com/gnugat/PronounceableWordGenerator/wiki
[3]: https://github.com/sebastianbergmann/phpunit/
[4]: https://github.com/gnugat/PronounceableWordGenerator/fork_select
[5]: https://github.com/gnugat/PronounceableWordGenerator/issues
