<?php

$header = <<<EOF
This file is part of the D1S1G4CodeLovers package.

(c) Nguyen Xuan Quynh <nguyen.xuan.quynh@sun-asterisk.com>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

$finder = PhpCsFixer\Finder::create()
    ->files()
    ->name('*.php')
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests')
;

return PhpCsFixer\Config::create()
    ->setUsingCache(true)
    ->setRiskyAllowed(true)
    ->setFinder($finder)
    ->setRules([
        'declare_strict_types' => true,
        'header_comment' => ['header' => $header],
    ])
;
