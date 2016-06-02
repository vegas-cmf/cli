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
use Vegas\Cli\Task\Option;
use Vegas\Cli\TaskAbstract;

class CustomTask extends TaskAbstract
{

    public function setupOptions()
    {
        $action = new \Vegas\Cli\Task\Action('test', 'Test action');

        //foo option
        $foo = new Option('foo', 'f', 'Foo option. Usage app:custom test -f numberOfSth');
        $foo->setValidator(function($value) {
            if (!is_numeric($value)) return false;
            return true;
        });
        $foo->setRequired(true);
        $action->addOption($foo);

        $this->addTaskAction($action);

        $this->addTaskAction(new \Vegas\Cli\Task\Action('testError', 'Test error'));
        $this->addTaskAction(new \Vegas\Cli\Task\Action('testWarning', 'Test warning'));
        $this->addTaskAction(new \Vegas\Cli\Task\Action('testSuccess', 'Test success'));
        $this->addTaskAction(new \Vegas\Cli\Task\Action('testObject', 'Test object'));
        $this->addTaskAction(new \Vegas\Cli\Task\Action('testText', 'Test text'));

        $action = new \Vegas\Cli\Task\Action('testArg', 'Test arguments list');
        $option = new Option('arg', 'a', 'Arg option. Usage app:custom:test 999');
        $action->addOption($option);
        $this->addTaskAction($action);
    }

    public function testAction()
    {
        $this->putText($this->getArg(0));
        $this->putText($this->getOption('f'));
        $this->putObject($this->getArgs());
    }

    public function testErrorAction()
    {
        $this->putError('Error message');
    }

    public function testWarningAction()
    {
        $this->putWarning('Warning message');
    }

    public function testSuccessAction()
    {
        $this->putSuccess('Success message');
    }

    public function testObjectAction()
    {
        $this->putObject(['key' => 'value']);
    }

    public function testTextAction()
    {
        $this->putText('Some text');
    }
}