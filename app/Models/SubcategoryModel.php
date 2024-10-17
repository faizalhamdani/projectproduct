<?php

namespace App\Models;

use CodeIgniter\Model;

class SubcategoryModel extends Model
{
    protected $table = 'subcategories';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'category_id']; // Assuming subcategories have a 'category_id'

    public function getSubcategoriesWithCategory()
    {
        return $this->select('subcategories.id, subcategories.name as subcategory_name, categories.name as category_name')
                    ->join('categories', 'categories.id = subcategories.category_id') // Join with categories table
                    ->findAll();
    }
}
