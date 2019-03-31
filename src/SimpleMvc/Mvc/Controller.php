<?php

namespace SimpleMvc\Mvc;

use SimpleMvc\DI\InjectionInterface;

abstract class Controller implements InjectionInterface
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

    /**
     * Inherited from \SimpleMvc\DI\DefaultFactory
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->getDi()->getService($name);
    }
}