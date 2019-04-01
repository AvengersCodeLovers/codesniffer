<?php declare(strict_types=1);

/*
 * This file is part of the D1S1G4CodeLovers package.
 *
 * (c) Nguyen Xuan Quynh <nguyen.xuan.quynh@sun-asterisk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once __DIR__.'/../vendor/squizlabs/php_codesniffer/tests/bootstrap.php';

// Add customized standards.
PHP_CodeSniffer\Config::setConfigData(
    'installed_paths',
    __DIR__.'/../src/Standards',
    true
);

// Ignore other standards.
$standards = PHP_CodeSniffer\Util\Standards::getInstalledStandards();
$standards[] = 'Generic';

$customizedStandards = ['SunAsterisk'];
$ignoredStandardsStr = implode(
    ',',
    array_filter($standards, function ($standard) use ($customizedStandards) {
        return !in_array($standard, $customizedStandards);
    })
);
putenv("PHPCS_IGNORE_TESTS={$ignoredStandardsStr}");
