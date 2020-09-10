<?php

namespace Core;

use Contracts\Interfaces\Events\EventHandlerInterface;

/**
 * Class EventHandler
 */
class EventHandler implements EventHandlerInterface
{
    /** @var array $events */
    private $events = [];

    /** @var bool $compensate */
    private $compensate = false;

    /**
     * Attach.
     *
     * @param $event
     * @return $this
     */
    public function attach($event): self
    {
        $this->events[get_class($event)] = $event;

        return $this;
    }

    /**
     * Detach.
     *
     * @param $event
     * @return $this
     * @throws \Exception
     */
    public function detach($event): self
    {
        if (!isset($this->events[get_class($event)])) {
            throw new \Exception("Unable to find event!");
        }

        unset($this->events[get_class($event)]);

        return $this;
    }

    /**
     * Run.
     *
     * @return Void
     *
     * @throws \Exception
     */
    public function run(): void
    {
        if (empty($this->events)) {
            throw new \Exception("Empty Events!");
        }

        foreach ($this->events as $event) {

            if (!$event->handle()) {
                $this->compensate = true;

                $this->removeAllAfter($event);
                $this->detach($event);

                break;
            }
        }

        if ($this->compensate) {
            foreach (array_reverse($this->events) as $event) {
                /** EventInterface $event */
                $event->compensate();
            }
        }
    }

    /**
     * Remove all after index.
     *
     * @param $event
     * @return Void
     * @throws \Exception
     */
    private function removeAllAfter($event): void
    {
        if (!$event) {
            throw new \Exception("Unable to handle event!");
        }

        $position = array_search(get_class($event), array_keys($this->events));

        $this->events = array_slice($this->events, 0, $position + 1, true);
    }
}