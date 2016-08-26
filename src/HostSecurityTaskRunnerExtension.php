<?php

namespace Mashbo\Mashbot\Extensions\HostSecurityTaskRunnerExtension;

use Mashbo\Mashbot\Extensions\HostSecurityTaskRunnerExtension\Tasks\AddTrustedRoot;
use Mashbo\Mashbot\Extensions\HostSecurityTaskRunnerExtension\Tasks\OSX\Keychain\AddTrustedRootToKeychain;
use Mashbo\Mashbot\TaskRunner\TaskRunner;
use Mashbo\Mashbot\TaskRunner\TaskRunnerExtension;

class HostSecurityTaskRunnerExtension implements TaskRunnerExtension
{

    public function amendTasks(TaskRunner $taskRunner)
    {
        $taskRunner->add('host:security:osx:keychain:add-trusted-root', new AddTrustedRootToKeychain());
        $taskRunner->add('host:security:add-trusted-root', new AddTrustedRoot());
    }
}