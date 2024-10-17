<?php

namespace App\Models;

use CodeIgniter\Model;

class CapacityModel extends Model
{
    protected $table = 'capacities';
    protected $allowedFields = ['value'];
}
