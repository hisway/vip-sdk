<?php

namespace Hisway\VipClient;

use Hisway\VipClient\Factories\VipClientFactory;
use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

class VipClientManager extends AbstractManager
{
    protected $factory;

    public function __construct(Repository $config, VipClientFactory $factory)
    {
        parent::__construct($config);
        $this->factory = $factory;
    }

    protected function createConnection(array $config)
    {
        return $this->factory->make($config);
    }

    protected function getConfigName()
    {
        return 'vip';
    }

    public function getFactory()
    {
        return $this->factory;
    }
}