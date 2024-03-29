<?php declare(strict_types=1);

/*
 * This file is part of the D1S1G4CodeLovers package.
 *
 * (c) Nguyen Xuan Quynh <nguyen.xuan.quynh@sun-asterisk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D1S1G4CodeLovers\CodeSniffer;

use Composer\Script\Event;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\PhpExecutableFinder;

class ComposerScripts
{
    /**
     * Listen to the "post-autoload-dump" composer event.
     *
     * @param Event $event
     * @return void
     */
    public static function postAutoloadDump(Event $event): void
    {
        $binDir = $event->getComposer()->getConfig()->get('bin-dir');
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');

        require_once $vendorDir.'/autoload.php';

        $command = [
            (new PhpExecutableFinder)->find(false), // php birary
            $binDir.'/phpcs',
            '--config-set',
            'installed_paths',
            $vendorDir.'/d1s1g4codelovers/codesniffer/src/Standards',
        ];

        // symfony/process +4.2
        if (function_exists(Process::class.'::fromShellCommandline')) {
            $process = new Process($command);
        } else {
            $process = new Process(implode(' ', $command));
        }

        $process->run();
    }
}
