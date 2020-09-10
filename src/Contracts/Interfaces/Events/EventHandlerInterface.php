<?php

namespace Contracts\Interfaces\Events;

/**
 * Interface EventHandlerInterface
 */
interface EventHandlerInterface
{
    /**
     * Attach.
     *
     * @param $event
     * @return $this
     */
    public function attach($event): self;

    /**
     * Detach.
     *
     * @param $event
     * @return $this
     */
    public function detach($event): self;

    /**
     * Run.
     *
     * @return Void
     */
    public function run(): void;
}
