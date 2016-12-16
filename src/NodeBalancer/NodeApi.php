<?php

//----------------------------------------------------------------------
//
//  Copyright (C) 2015-2016 Artem Rodygin
//
//  This file is part of Linode API Client Library for PHP.
//
//  You should have received a copy of the MIT License along with
//  the library. If not, see <http://opensource.org/licenses/MIT>.
//
//----------------------------------------------------------------------

namespace Linode\NodeBalancer;

use Linode\BaseLinodeApi;

/**
 * This class is autogenerated.
 *
 * @version Linode API v3.3
 */
class NodeApi extends BaseLinodeApi
{
    /**
     * @param int    $ConfigID [required] The parent ConfigID to attach this Node to
     * @param string $Label    [required] This backend Node's label
     * @param string $Address  [required] The address:port combination used to communicate with this Node
     * @param int    $Weight   [optional] Load balancing weight, 1-255. Higher means more connections.
     * @param string $Mode     [optional] The connections mode for this node.  One of 'accept', 'reject', or 'drain'
     *
     * @return array
     */
    public function create($ConfigID, $Label, $Address, $Weight = null, $Mode = null)
    {
        return $this->call('nodebalancer.node.create', [
            'ConfigID' => $ConfigID,
            'Label'    => $Label,
            'Address'  => $Address,
            'Weight'   => $Weight,
            'Mode'     => $Mode,
        ]);
    }

    /**
     * Deletes a Node from a NodeBalancer Config.
     *
     * @param int $NodeID [required] The NodeID to delete
     *
     * @return array
     */
    public function delete($NodeID)
    {
        return $this->call('nodebalancer.node.delete', [
            'NodeID' => $NodeID,
        ]);
    }

    /**
     * Returns a list of Nodes associated with a NodeBalancer Config.
     *
     * @param int $ConfigID [required]
     * @param int $NodeID   [optional] Limits the list to the specified NodeID
     *
     * @return array
     */
    public function getList($ConfigID, $NodeID = null)
    {
        return $this->call('nodebalancer.node.list', [
            'ConfigID' => $ConfigID,
            'NodeID'   => $NodeID,
        ]);
    }

    /**
     * Updates a Node's properties.
     *
     * @param int    $NodeID  [required]
     * @param string $Label   [optional] This backend Node's label
     * @param string $Address [optional] The address:port combination used to communicate with this Node
     * @param int    $Weight  [optional] Load balancing weight, 1-255. Higher means more connections.
     * @param string $Mode    [optional] The connections mode for this node.  One of 'accept', 'reject', or 'drain'
     *
     * @return array
     */
    public function update($NodeID, $Label = null, $Address = null, $Weight = null, $Mode = null)
    {
        return $this->call('nodebalancer.node.update', [
            'NodeID'  => $NodeID,
            'Label'   => $Label,
            'Address' => $Address,
            'Weight'  => $Weight,
            'Mode'    => $Mode,
        ]);
    }
}
