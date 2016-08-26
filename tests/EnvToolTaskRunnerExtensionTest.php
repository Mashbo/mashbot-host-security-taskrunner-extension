<?php

namespace Mashbo\Mashbot\Extensions\HostSecurityTaskRunnerExtension\Tests;

use Mashbo\Mashbot\Extensions\HostSecurityTaskRunnerExtension\HostSecurityTaskRunnerExtension;
use Mashbo\Mashbot\Extensions\HostSecurityTaskRunnerExtension\Tasks\AddTrustedRoot;
use Mashbo\Mashbot\Extensions\HostSecurityTaskRunnerExtension\Tasks\OSX\Keychain\AddTrustedRootToKeychain;
use Mashbo\Mashbot\TaskRunner\TaskRunner;

class HostSecurityTaskRunnerExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testItAddsTasks()
    {
        $taskRunner = $this
            ->getMockBuilder(TaskRunner::class)
            ->disableOriginalConstructor()
            ->getMock();

        $taskRunner
            ->expects($this->at(0))
            ->method('add')
            ->with('host:security:osx:keychain:add-trusted-root', $this->callback(function($arg) {
                return $arg instanceof AddTrustedRootToKeychain;
            }));

        $taskRunner
            ->expects($this->at(1))
            ->method('add')
            ->with('host:security:add-trusted-root', $this->callback(function($arg) {
                return $arg instanceof AddTrustedRoot;
            }));

        $sut = new HostSecurityTaskRunnerExtension();
        $sut->amendTasks($taskRunner);
    }
}
