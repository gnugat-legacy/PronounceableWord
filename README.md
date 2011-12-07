Enunciable Word Generator
=========================

A PHP library generating random and (english) enunciable words without using
dictionaries or Markov chains.

Currently under development.

Usage
-----

    require_once 'EnunciableWordGenerator/EnunciableWordGenerator.php';

    define('MINIMUM_LENGTH', 4);
    define('MAXIMUM_LENGTH', 8);

    $length = rand(MINIMUM_LENGTH, MAXIMUM_LENGTH);

    $enunciableWordGenerator = new EnunciableWordGenerator();
    $enunciableWordGenerator->length = $length;

    $generatedWord = $enunciableWordGenerator->generate();

Copyright and License
---------------------

This is the work of Loic Chardonnet, released under MIT License. Read the
LICENSE.txt file for more information.

Documentation
-------------

Basically, the library will generate a word following these rules:

1. Choose randomly a letter;
2. choose randomly a linked letter of different type;
3. choose randomly a linked letter;
4. choose randomly a linked letter, of different type if consecutive.

Where "linked letter" is an arbitrary chosen letter that is expected to follow
well the previous letter, "types" would be voyels and consonants and
"consecutive" would be a group of two letters from the same "type". The step 4
is repeated as many times as necessary.

Further documentation would be found at the [Github wiki of this project][1]

Installation
------------

The installation is pretty straightforward:

1. Get the last stable version and put it in an accessible directory (e.g.
   vendors);
2. copy the files ending in "php.default" into "php";
3. make the change you want in EnunciableWordGeneratorConfiguration.php.

### Testing

EnunciableWordGenerator is developed using [PHPUnit][3] (3.5), so you must have
it in your includes directory (for example using PEAR).

Once PHPUnit installed, you must run it in the root directory, calling the
tests located in /test/:

    phpunit ./test

Contributing
------------

1. Fork it;
2. Create a branch (`git checkout -b my_branch`);
3. Commit your changes (`git commit -am "Changes"`);
4. Push to the branch (`git push origin my_branch`);
5. Create an [Issue][2] with a link to your branch;
6. Wait for it.


[1]: https://github.com/gnugat/EnunciableWordGenerator/wiki
[2]: https://github.com/gnugat/EnunciableWordGenerator/issues
[3]: https://github.com/sebastianbergmann/phpunit/
