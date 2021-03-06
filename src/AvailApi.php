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

namespace Linode;

/**
 * This class is autogenerated.
 *
 * @version Linode API v3.3
 */
class AvailApi extends BaseLinodeApi
{
    /**
     * Returns a list of Linode data center facilities.
     *
     * @return array
     */
    public function dataCenters()
    {
        return $this->call('avail.datacenters');
    }

    /**
     * Returns a list of available Linux Distributions.
     *
     * @param int $DistributionID [optional] Limits the results to the specified DistributionID
     *
     * @return array
     */
    public function distributions($DistributionID = null)
    {
        return $this->call('avail.distributions', [
            'DistributionID' => $DistributionID,
        ]);
    }

    /**
     * List available kernels.
     *
     * @param bool $isXen [optional] Show or hide Xen compatible kernels
     * @param bool $isKVM [optional] Show or hide KVM compatible kernels
     *
     * @return array
     */
    public function kernels($isXen = null, $isKVM = null)
    {
        return $this->call('avail.kernels', [
            'isXen' => $isXen,
            'isKVM' => $isKVM,
        ]);
    }

    /**
     * Returns a structure of Linode PlanIDs containing the Plan label and the availability in each
     * Datacenter.
     *
     * @param int $PlanID [optional] Limits the list to the specified PlanID
     *
     * @return array
     */
    public function linodePlans($PlanID = null)
    {
        return $this->call('avail.linodeplans', [
            'PlanID' => $PlanID,
        ]);
    }

    /**
     * Returns NodeBalancer pricing information.
     *
     * @return array
     */
    public function nodeBalancers()
    {
        return $this->call('avail.nodebalancers');
    }

    /**
     * Returns a list of available public StackScripts.
     *
     * @param int    $DistributionID     [optional] Limit the results to StackScripts that can be applied to this DistributionID
     * @param string $DistributionVendor [optional] Debian, Ubuntu, Fedora, etc.
     * @param string $keywords           [optional] Search terms
     *
     * @return array
     */
    public function stackScripts($DistributionID = null, $DistributionVendor = null, $keywords = null)
    {
        return $this->call('avail.stackscripts', [
            'DistributionID'     => $DistributionID,
            'DistributionVendor' => $DistributionVendor,
            'keywords'           => $keywords,
        ]);
    }
}
