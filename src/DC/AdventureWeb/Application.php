<?php

namespace DC\AdventureWeb;

use Silex\Application as Silex;

class Application extends Silex
{
    private $environment;

    public function __construct($environment)
    {
        $this->environment = $environment;
    }

    public function getEnvironment()
    {
        return $this->environment;
    }
}
