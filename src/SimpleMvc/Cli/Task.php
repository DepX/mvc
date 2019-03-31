<?php

namespace SimpleMvc\Cli;

use SimpleMvc\DI\InjectionInterface;

class Task implements InjectionInterface
{
    protected $di;

    /**
     * @param \SimpleMvc\DI\DefaultFactory $di
     */
    public function setDi($di)
    {
        $this->di = $di;
    }

    /**
     * @return \SimpleMvc\DI\DefaultFactory
     */
    public function getDi()
    {
        return $this->di;
    }
}