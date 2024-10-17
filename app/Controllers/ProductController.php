<?php

namespace App\Controllers;

use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Models\CapacityModel;
use App\Models\CompressorwarrantyModel;
use App\Models\SparepartwarrantyModel;

class ProductController extends BaseController
{
    public function index()
    {
        $product_model = new ProductModel();

        // Fetch products with joins to related tables (brands, categories, etc.)
        $data['products'] = $product_model->select('products.id, products.color, products.product_type, brands.name as brand_name, categories.name as category_name, subcategories.name as subcategory_name, capacities.value as capacity, compressor_warranties.value as compressor_warranty, sparepart_warranties.value as sparepart_warranty')
            ->join('brands', 'brands.id = products.brand_id')
            ->join('categories', 'categories.id = products.category_id')
            ->join('subcategories', 'subcategories.id = products.subcategory_id')
            ->join('capacities', 'capacities.id = products.capacity_id')
            ->join('compressor_warranties', 'compressor_warranties.id = products.compressor_warranty_id')
            ->join('sparepart_warranties', 'sparepart_warranties.id = products.sparepart_warranty_id')
            ->findAll();

        return view('product/list_product', $data); // Pass data to the view
    }

    public function create()
    {
        $brandModel = new BrandModel();
        $categoryModel = new CategoryModel();
        $subcategoryModel = new SubcategoryModel();
        $capacityModel = new CapacityModel();
        $compressorwarrantyModel = new CompressorwarrantyModel();
        $sparepartwarrantyModel = new SparepartwarrantyModel();

        $data['brands'] = $brandModel->findAll();
        $data['categories'] = $categoryModel->findAll();
        $data['subcategories'] = $subcategoryModel->findAll();
        $data['capacities'] = $capacityModel->findAll();
        $data['compressor_warranties'] = $compressorwarrantyModel->findAll();
        $data['sparepart_warranties'] = $sparepartwarrantyModel->findAll();

        return view('product_registration', $data);
    }

    public function register()
    {
        $rules = [
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'capacity_id' => 'required',
            'compressor_warranty_id' => 'required',
            'sparepart_warranty_id' => 'required',
            'color' => 'required',
            'product_type' => 'required',
        ];
    
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        $data = [
            'brand_id' => $this->request->getPost('brand_id'),
            'category_id' => $this->request->getPost('category_id'),
            'subcategory_id' => $this->request->getPost('subcategory_id'),
            'capacity_id' => $this->request->getPost('capacity_id'),
            'compressor_warranty_id' => $this->request->getPost('compressor_warranty_id'),
            'sparepart_warranty_id' => $this->request->getPost('sparepart_warranty_id'),
            'color' => $this->request->getPost('color'),
            'product_type' => $this->request->getPost('product_type'),
        ];
    
        $productModel = new ProductModel();
        $productModel->save($data);
    
        return redirect()->to('/success')->with('message', 'Product successfully registered');
    }
    
}
