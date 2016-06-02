<?php
/**
 * This file is part of Vegas package
 *
 * @author Slawomir Zytko <slawek@amsterdam-standard.pl>
 * @company Amsterdam Standard Sp. z o.o.
 * @homepage http://cmf.vegas
 */

namespace App\Task;

use Vegas\Cli\Task\Action;
use Vegas\Cli\TaskAbstract;

class FooTask extends TaskAbstract
{
    public function setupOptions()
    {
        $action = new Action('bar', 'test task');
        $this->addTaskAction($action);

        $action = new Action('test', 'test task');
        $this->addTaskAction($action);
    }

    public function barAction()
    {
        $this->putText('bar');
    }

    public function testAction()
    {
        $this->putText('test');
    }
}