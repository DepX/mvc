<?php

namespace SimpleMvc\DI;

use SimpleMvc\Di;
use SimpleMvc\Http\Response\Cookies;
use SimpleMvc\Http\Request;
use SimpleMvc\Http\Response;

/**
 * The standard dependency injection factory
 *
 * Class DefaultFactory
 * @package SimpleMvc\DI
 */
class DefaultFactory extends Di
{
    public function __construct()
    {
        parent::__construct();

        if ($this->service == null) {
            $this->service = new Service();

            $this->registerDefaultsServices();
        }
    }

    /**
     * Registers a service in the services container
     *
     * @param string $name
     * @param mixed $definition
     */
    public function setService($name, $definition)
    {
        $this->service->set($name, $definition);
    }

    /**
     * Return service by name
     *
     * @param $name
     * @return bool|mixed
     */
    public function getService($name)
    {
        $service = $this->service->get($name);
        if (!$service)
            return false;

        if (is_object($service)) {
            if (get_class($service) != 'Closure') {
                $service = function () use ($service) {
                    return $service;
                };
            }

            $func = $service->bindTo(new \StdClass);
            $func_class = $func();

            // set di
            if (method_exists($func_class, 'setDi')) {
                $func_class->setDi($this);
            }
            $service = $func_class;
        }

        return $service;
    }

    /**
     * Return all services
     *
     * @return bool|mixed
     */
    public function getServices()
    {
        return $this->service->getAll();
    }

    /**
     * Inherited from \SimpleMvc\DI\Service
     *
     * @param $name
     * @return bool
     */
    public function __get($name)
    {
        return $this->getService($name);
    }

    private function registerDefaultsServices()
    {
        $this->setService('request', new Request());
        $this->setService('response', new Response());
        $this->setService('cookies', new Cookies());
    }
}