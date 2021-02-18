<?php

namespace Hisway\VipClient\Factories;

use VipClient\Osp\Context\InvocationContext;

class VipClientFactory
{
    /**
     * Make a new vipclient client.
     *
     * @param string[] $config
     *
     * @return InvocationContext
     */
    public function make(array $config)
    {
        $config = $this->getConfig($config);
        return $this->getClient($config);
    }

    /**
     * Get the configuration data.
     *
     * @param string[] $config
     *
     * @return string[]
     * @throws \InvalidArgumentException
     *
     */
    protected function getConfig(array $config)
    {
        if (!array_key_exists('app_key', $config)
            || !array_key_exists('app_secret', $config)) {
            throw new \InvalidArgumentException('The vip client requires api keys.');
        }
        return $config;
    }

    /**
     * Get the vipclient client.
     *
     * @param array $config
     * @return InvocationContext
     */
    protected function getClient(array $config)
    {
        $c = InvocationContext::getInstance();
        $c->setAppKey($config['app_key']);
        $c->setAppSecret($config['app_secret']);
        $c->setAppURL('https://gw.vipapis.com/');
        return $c;
    }
}