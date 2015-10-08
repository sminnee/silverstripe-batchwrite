<?php

class WriteCallbackExtension extends DataExtension
{
    private $beforeWriteCallbacks = array();

    private $afterWriteCallbacks = array();

    public function onBeforeWrite()
    {
        foreach ($this->beforeWriteCallbacks as $callback) {
            $callback($this->owner);
        }
        $this->beforeWriteCallbacks = array();
    }

    public function onAfterWrite()
    {
        foreach ($this->afterWriteCallbacks as $callback) {
            $callback($this->owner);
        }
        $this->afterWriteCallbacks = array();
    }

    public function onBeforeWriteCallback(callable $callback)
    {
        $this->beforeWriteCallbacks[] = $callback;
    }

    public function onAfterWriteCallback(callable $callback)
    {
        $this->afterWriteCallbacks[] = $callback;
    }

    public function onAfterExistsCallback(callable $callback)
    {
        if ($this->owner->exists()) {
            $callback($this->owner);
        } else {
            $this->onAfterWriteCallback($callback);
        }
    }
}
