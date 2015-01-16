<?php

//----------------------------------------------------------------------
//
//  Copyright (C) 2015 Artem Rodygin
//
//  This file is part of Linode API Client Library for PHP.
//
//  You should have received a copy of the GNU General Public License
//  along with the library. If not, see <http://www.gnu.org/licenses/>.
//
//----------------------------------------------------------------------

namespace Linode;

use Linode\BaseLinodeApi;

/**
 * This class is autogenerated.
 *
 * @version Linode API v3.3
 */
class Image extends BaseLinodeApi
{
    /**
     * Deletes a gold-master image
     *
     * @param   integer $ImageID [required] The ID of the gold-master image to delete
     *
     * @return  array
     */
    public function delete($ImageID)
    {
        return $this->call('image.delete', array(
            'ImageID' => $ImageID,
        ));
    }

    /**
     * Lists available gold-master images
     *
     * @param   integer $pending [optional] Show images currently being created.
     * @param   integer $ImageID [optional] Request information for a specific gold-master image
     *
     * @return  array
     */
    public function getList($pending = null, $ImageID = null)
    {
        return $this->call('image.list', array(
            'pending' => $pending,
            'ImageID' => $ImageID,
        ));
    }

    /**
     * Update an Image record.
     *
     * @param   string  $label       [optional] The label of the Image.
     * @param   string  $description [optional] An optional description of the Image.
     * @param   integer $ImageID     [required] The ID of the Image to modify.
     *
     * @return  array
     */
    public function update($label = null, $description = null, $ImageID = null)
    {
        return $this->call('image.update', array(
            'label'       => $label,
            'description' => $description,
            'ImageID'     => $ImageID,
        ));
    }
}
