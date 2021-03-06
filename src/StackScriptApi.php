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
class StackScriptApi extends BaseLinodeApi
{
    /**
     * Create a StackScript.
     *
     * @param string $script             [required] The actual script
     * @param string $DistributionIDList [required] Comma delimited list of DistributionIDs that this script works on
     * @param string $Label              [required] The Label for this StackScript
     * @param string $Description        [optional]
     * @param bool   $isPublic           [optional] Whether this StackScript is published in the Library, for everyone to use
     * @param string $rev_note           [optional]
     *
     * @return array
     */
    public function create($script, $DistributionIDList, $Label, $Description = null, $isPublic = null, $rev_note = null)
    {
        return $this->call('stackscript.create', [
            'script'             => $script,
            'DistributionIDList' => $DistributionIDList,
            'Label'              => $Label,
            'Description'        => $Description,
            'isPublic'           => $isPublic,
            'rev_note'           => $rev_note,
        ]);
    }

    /**
     * @param int $StackScriptID [required]
     *
     * @return array
     */
    public function delete($StackScriptID)
    {
        return $this->call('stackscript.delete', [
            'StackScriptID' => $StackScriptID,
        ]);
    }

    /**
     * Lists StackScripts you have access to.
     *
     * @param int $StackScriptID [optional] Limits the list to the specified StackScriptID
     *
     * @return array
     */
    public function getList($StackScriptID = null)
    {
        return $this->call('stackscript.list', [
            'StackScriptID' => $StackScriptID,
        ]);
    }

    /**
     * Update a StackScript.
     *
     * @param int    $StackScriptID      [required]
     * @param string $script             [optional] The actual script
     * @param string $DistributionIDList [optional] Comma delimited list of DistributionIDs that this script works on
     * @param string $Label              [optional] The Label for this StackScript
     * @param string $Description        [optional]
     * @param bool   $isPublic           [optional] Whether this StackScript is published in the Library, for everyone to use
     * @param string $rev_note           [optional]
     *
     * @return array
     */
    public function update($StackScriptID, $script = null, $DistributionIDList = null, $Label = null, $Description = null, $isPublic = null, $rev_note = null)
    {
        return $this->call('stackscript.update', [
            'StackScriptID'      => $StackScriptID,
            'script'             => $script,
            'DistributionIDList' => $DistributionIDList,
            'Label'              => $Label,
            'Description'        => $Description,
            'isPublic'           => $isPublic,
            'rev_note'           => $rev_note,
        ]);
    }
}
