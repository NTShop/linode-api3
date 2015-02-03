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

require_once(__DIR__ . '/../vendor/autoload.php');

use Linode\Api;

$api = new Api(null);
$spec = $api->spec();

printf("Available version:\t%s\n", $api::VERSION);
printf("Library version:\t%s\n", $spec['VERSION']);

if ($api::VERSION != $spec['VERSION']) {
    printf("\nWARNING: the library is not up-to-date with the latest available API.\n");
}