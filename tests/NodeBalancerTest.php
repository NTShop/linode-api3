<?php

//----------------------------------------------------------------------
//
//  Copyright (C) 2015 Artem Rodygin
//
//  This file is part of Linode API Client Library for PHP.
//
//  You should have received a copy of the MIT License along with
//  the library. If not, see <http://opensource.org/licenses/MIT>.
//
//----------------------------------------------------------------------

use Linode\NodeBalancerApi;

class NodeBalancerTest extends \PHPUnit_Framework_TestCase
{
    /** @var string */
    private $key;

    /** @var NodeBalancerApi */
    private $api;

    protected function setUp()
    {
        $this->key = uniqid(null, false);
        $this->api = new NodeBalancerApi($this->key, [], true);
    }

    public function testCreate()
    {
        $DatacenterID = mt_rand(1, PHP_INT_MAX);
        $Label        = 'label';

        $expected = "api_key={$this->key}&api_action=nodebalancer.create&DatacenterID={$DatacenterID}&Label={$Label}";
        $query    = $this->api->create($DatacenterID, $Label);
        self::assertEquals($expected, $query);
    }

    public function testDelete()
    {
        $NodeBalancerID = mt_rand(1, PHP_INT_MAX);

        $expected = "api_key={$this->key}&api_action=nodebalancer.delete&NodeBalancerID={$NodeBalancerID}";
        $query    = $this->api->delete($NodeBalancerID);
        self::assertEquals($expected, $query);
    }

    public function testList()
    {
        $NodeBalancerID = mt_rand(1, PHP_INT_MAX);

        $expected = "api_key={$this->key}&api_action=nodebalancer.list&NodeBalancerID={$NodeBalancerID}";
        $query    = $this->api->getList($NodeBalancerID);
        self::assertEquals($expected, $query);
    }

    public function testUpdate()
    {
        $NodeBalancerID = mt_rand(1, PHP_INT_MAX);
        $Label          = 'label';

        $expected = "api_key={$this->key}&api_action=nodebalancer.update&NodeBalancerID={$NodeBalancerID}&Label={$Label}";
        $query    = $this->api->update($NodeBalancerID, $Label);
        self::assertEquals($expected, $query);
    }
}
