<?php
/**
 * This file is part of Vegas package
 *
 * @author Slawomir Zytko <slawek@amsterdam-standard.pl>
 * @company Amsterdam Standard Sp. z o.o.
 * @homepage http://cmf.vegas
 */

namespace Vegas\Task;

use Vegas\Cli\Task\Action;
use Vegas\Cli\TaskAbstract;

class CacheTask extends TaskAbstract
{
    public function setupOptions()
    {
        $action = new Action('clean', 'test task');
        $this->addTaskAction($action);

        $action = new Action('test', 'test task');
        $this->addTaskAction($action);
    }

    public function cleanAction()
    {
        $this->putText('Cleaning cache');
    }

    public function testAction()
    {
        $this->putText('test');
    }
}