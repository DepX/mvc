<?php

namespace SimpleMvc\Http\Response;

/**
 * Class Session
 * @package SimpleMvc\Http
 */
class Session
{
    /**
     * Session constructor.
     *
     * @param array $params
     */
    public function __construct($params = [])
    {
        session_start($params);
    }

    /**
     * Set new session
     *
     * @param $name
     * @param $value
     */
    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    /**
     * Get session
     *
     * @param $name
     * @return bool
     */
    public function get($name)
    {
        if ($this->has($name)) {
            return $_SESSION[$name];
        }

        return false;
    }

    /**
     * Check session
     *
     * @param $name
     * @return bool
     */
    public function has($name)
    {
        return isset($_SESSION[$name]);
    }

    /**
     * Delete session
     *
     * @param $name
     */
    public function delete($name)
    {
        unset($_SESSION[$name]);
    }
}