<?php

namespace Mashbo\Mashbot\Extensions\HostSecurityTaskRunnerExtension\Tasks\OSX\Keychain;

use Mashbo\Mashbot\TaskRunner\TaskContext;

class AddTrustedRootToKeychain
{
    public function __invoke(TaskContext $context)
    {
        $tempFile = tempnam(sys_get_temp_dir(), 'cert_');
        file_put_contents($tempFile, $context->argument('certificate'));

        $context->taskRunner()->invoke(
            'process:command:run',
            [
                'command' => "sudo security add-trusted-cert -d -r trustRoot -k /Library/Keychains/System.keychain $tempFile",
                'directory' => getcwd()
            ]
        );

        unlink($tempFile);
    }
}