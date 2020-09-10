<?php

namespace Core\Examples;

use Contracts\Abstracts\Events\BaseEvent;

/**
 * Class ExampleSecondEvent.
 *
 * @package Core\Examples
 */
class ExampleSecondEvent extends BaseEvent
{
    /**
     * @return bool
     */
    public function handle(): bool
    {
        return true;
    }

    /**
     * @return mixed|void
     */
    public function compensate(): void
    {
        // Enter logic here
    }
}
