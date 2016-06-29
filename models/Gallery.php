<?php

namespace Dcms\Gallery\Models;

use Dcms\Core\Models\EloquentDefaults;

use DB;


class Gallery extends EloquentDefaults
{
	protected $connection = 'project';
	protected $table  = "gallery";
}
