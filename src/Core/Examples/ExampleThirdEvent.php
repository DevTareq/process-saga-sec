<?php

namespace Core\Examples;

use Contracts\Abstracts\Events\BaseEvent;

/**
 * Class ExampleThirdEvent.
 *
 * @package Core\Examples
 */
class ExampleThirdEvent extends BaseEvent
{
    /**
     * Handle.
     *
     * @return bool
     */
    public function handle(): bool
    {
        return true;
    }

    /**
     * Compensate.
     *
     * @return mixed
     */
    function compensate(): void
    {
        // TODO: Implement compensate() method.
    }
}
