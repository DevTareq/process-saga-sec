<?php

namespace Contracts\Abstracts\Events;

/**
 * Class BaseEvent
 */
abstract class BaseEvent
{
    /** @var null $data */
    protected $data = null;

    /**
     * Data setter.
     *
     * @param array $data
     * @return $this
     */
    public function setData($data = []): self
    {
        $this->data = $data ?? [];

        return $this;
    }

    /**
     * Handle.
     *
     * @return bool
     */
    abstract function handle(): bool;

    /**
     * Compensate.
     *
     * @return mixed
     */
    abstract function compensate(): void;
}
