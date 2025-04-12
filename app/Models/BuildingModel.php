<?php

namespace App\Models;

use CodeIgniter\Model;

class BuildingModel extends Model
{
    protected $table = 'building';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customerName', 'buildingType', 'month','usability', 'state'];
}