<?php
/**
 * This file is part of Vegas package
 *
 * @author Slawomir Zytko <slawek@amsterdam-standard.pl>
 * @company Amsterdam Standard Sp. z o.o.
 * @homepage http://cmf.vegas
 */

namespace Test\Task;

use Vegas\Cli\Task\Action;
use Vegas\Cli\Task\Option;
use Vegas\Cli\TaskAbstract;

class CustomTask extends TaskAbstract
{
    public function setupOptions()
    {
        $action = new Action('test', 'test task');
        $option = new Option('foo', 'f');
        $action->addOption($option);
        $this->addTaskAction($action);
    }

    public function testAction()
    {
        $this->putText('test');
    }
}