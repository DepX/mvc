<?php

namespace SimpleMvc\DI;

interface InjectionInterface
{
    /**
     * @param \SimpleMvc\DI\DefaultFactory $di
     */
    public function setDi($di);

    /**
     * @return \SimpleMvc\DI\DefaultFactory
     */
    public function getDi();
}