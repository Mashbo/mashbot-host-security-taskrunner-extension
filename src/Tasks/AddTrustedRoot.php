<?php

namespace Mashbo\Mashbot\Extensions\HostSecurityTaskRunnerExtension\Tasks;

use Mashbo\Mashbot\TaskRunner\TaskContext;

class AddTrustedRoot
{
    public function __invoke(TaskContext $context)
    {
        $context->taskRunner()->invoke('host:security:osx:keychain:add-trusted-root', $context->arguments());
    }
}