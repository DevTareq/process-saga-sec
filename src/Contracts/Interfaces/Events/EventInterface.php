<?php

namespace Contracts\Interfaces\Events;

/**
 * Interface EventInterface
 */
interface EventInterface
{
    /**
     * Data setter.
     *
     * @param $data
     * @return $this
     */
    public function setDate($data = []): self;
}
