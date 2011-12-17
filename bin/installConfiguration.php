<?php
/*
 * This file is part of the PronounceableWord library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

$configurationDirectory = dirname(__FILE__) . '/../config/';

$configurationFiles = array(
    'LetterTypesConfiguration.php',
    'LinkedLettersConfiguration.php',
    'PronounceableWordGeneratorConfiguration.php',
);

$extensionToRemove = '.default';

foreach ($configurationFiles as $configurationFile) {
    $destinationFile = $configurationDirectory . $configurationFile;
    $sourceFile = $destinationFile . $extensionToRemove;

    $isFileCopied = copy($sourceFile, $destinationFile);

    if (false === $isFileCopied) {
        throw new Exception('Error: cannot copy file ' . $sourceFile . '!');
    }
}
