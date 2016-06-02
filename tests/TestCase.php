<?php
/**
 * This file is part of Vegas package
 *
 * @author Arkadiusz Ostrycharz <aostrycharz@amsterdam-standard.pl>
 * @copyright Amsterdam Standard Sp. Z o.o.
 * @homepage http://vegas-cmf.github.io
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Vegas\Tests;

use Phalcon\DI;
use Vegas\Cli\Application;
use Vegas\Cli\Bootstrap;

class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Application
     */
    protected $application;

    /**
     * @var DI
     */
    protected $di;

    /**
     *
     */
    public function setUp()
    {
        $this->di = DI::getDefault();
        $this->application = new Application($this->di, $this->di->get('config'));
    }

    public static function assertContains($needle, $haystack, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        if (is_string($haystack)) {
            $haystack = trim($haystack, "\033[37;42m\033[0m");
        }

        if (is_string($needle)) {
            $needle = trim($needle, "\033[37;42m\033[0m");
        }
        parent::assertContains($needle, $haystack, $message, $ignoreCase, $checkForObjectIdentity, $checkForNonObjectIdentity);
    }


    /**
     * Shorthand for more descriptive CLI command testing
     * @param string $command full command string to be called
     * @return string
     */
    protected function runCliAction($command)
    {
        $this->application->setArguments(str_getcsv($command, ' '));

        ob_start();

        $this->application->setup()->run();
        $result = ob_get_contents();

        ob_end_clean();

        return $result;
    }

    /**
     * @return Bootstrap
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @return DI
     */
    public function getDI()
    {
        return $this->di;
    }
}
