<?php
namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\SubcategoryModel;

class SubkategoriController extends BaseController
{
    // Dashboard view
    public function index()
    {
        $subcategoryModel = new SubcategoryModel();
        $categoryModel = new CategoryModel();
        
        $data['subkategori'] = $subcategoryModel->getSubcategoriesWithCategory(); // Get subcategories with category data
        $data['categories'] = $categoryModel->getCategories(); // Fetch categories for the dropdown
    
        return view('subkategori/subkategori', $data); // Pass the data to the view
    }
    

    public function addSubKategori()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->getCategories(); // Fetch categories

        return view('/subkategori/add_subkategori', $data); // Pass categories to the view
    }

    public function saveSubkategori()
    {
        $subcategoryModel = new SubcategoryModel();
        
        // Validate input
        $this->validate([
            'name' => 'required',
            'category_id' => 'required|is_not_unique[categories.id]', // Check if category_id exists
        ]);
    
        // Save subcategory with the category_id
        $data = [
            'name' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category_id'), // Get category_id from the form
        ];
        
        $subcategoryModel->save($data);
        
        return redirect()->to('/subkategori')->with('success', 'Subcategory added successfully.');
    }
    

    public function editSubkategori($id)
    {
        $subcategoryModel = new SubcategoryModel();
        $categoryModel = new CategoryModel(); // Add the CategoryModel

        $data['subcategory'] = $subcategoryModel->find($id);
        $data['categories'] = $categoryModel->getCategories(); // Fetch categories for the dropdown
        $data['title'] = "Edit Subkategori";

        if (!$data['subcategory']) {
            return redirect()->to('/subkategori')->with('error', 'Subkategori not found.');
        }

        return view('subkategori/edit_Subkategori', $data);
    }

    public function updateSubkategori($id)
    {
        $subcategoryModel = new SubcategoryModel();
    
        // Validate input
        $this->validate([
            'name' => 'required',
            'category_id' => 'required|is_not_unique[categories.id]', // Check if category_id exists
        ]);
    
        $data = [
            'name' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category_id'), // Update category_id
        ];
    
        // Update the Subkategori in the database
        if (!$subcategoryModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update Subkategori.');
        }
    
        return redirect()->to('/subkategori')->with('success', 'Subcategory updated successfully.');
    }
    

    public function deleteSubkategori($id)
    {
        $subcategoryModel = new SubcategoryModel();
        
        if (!$subcategoryModel->find($id)) {
            return redirect()->to('/subkategori')->with('error', 'Subcategory not found.');
        }
        
        $subcategoryModel->delete($id);
        
        return redirect()->to('/subkategori')->with('success', 'Subcategory deleted successfully.');
    }
    
}
