@echo off
echo Installing and configuring...

copy ..\config\LetterTypesConfiguration.php.default ..\config\LetterTypesConfiguration.php
copy ..\config\LinkedLettersConfiguration.php.default ..\config\LinkedLettersConfiguration.php
copy ..\config\PronounceableWordGeneratorConfiguration.php.default ..\config\PronounceableWordGeneratorConfiguration.php

@echo Installation and configuration done.
