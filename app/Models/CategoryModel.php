<?php
namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories'; // Assuming your table is called 'categories'
    protected $primaryKey = 'id';
    protected $allowedFields = ['name']; // Assuming 'name' is the column for category names

    public function getCategories()
    {
        return $this->findAll(); // Retrieve all categories
    }
}
