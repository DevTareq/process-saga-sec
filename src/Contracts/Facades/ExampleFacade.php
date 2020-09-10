<?php

namespace Contracts\Facades;

use Contracts\Abstracts\SEC\SECFacade;
use Core\EventHandler;
use Core\Examples\ExampleFirstEvent;
use Core\Examples\ExampleSecondEvent;
use Core\Examples\ExampleThirdEvent;

/**
 * Class ExampleFacade.
 *
 * @package Contracts\Facades
 */
class ExampleFacade extends SECFacade
{
    /**
     * Run.
     *
     * @return Void
     */
    public function run()
    {
        try {

            (new EventHandler())
                ->attach((new ExampleFirstEvent()))
                ->attach((new ExampleSecondEvent()))
                ->attach((new ExampleThirdEvent()))
                ->run();

        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}