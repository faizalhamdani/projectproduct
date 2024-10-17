<?php
namespace App\Controllers;

use App\Models\BrandModel;

class BrandController extends BaseController
{
    // Dashboard view
    public function index()
    {   
        $brandModel = new BrandModel();
        // Get the brand code from the session
        $data['brand'] = $brandModel->findAll();
    
        // Pass the brand code to the view
        return view('brand/brand', $data);
    }

    public function addBrand()
    {
        $data['title'] = "Add Brand";
        return view('brand/add_brand',$data);
    }

    public function saveBrand()
    {
    $brandModel = new BrandModel();

    $data = [
        'code' => $this->request->getPost('code'),
        'name' => $this->request->getPost('name'),
    ];
    if (!$brandModel->save($data)) {
        return redirect()->back()->with('error', 'Failed to add Brand.');
    }

    return redirect()->to('/brand')->with('success', 'Brand added successfully.');
    }

    public function editBrand($id)
    {
        $brandModel = new BrandModel();
        $data['merk'] = $brandModel->find($id);
        $data['title'] = "Edit Brand";

        if (!$data['merk']) {
            return redirect()->to('/brand')->with('error', 'Brand  not found.');
        }

        return view('brand/edit_Brand', $data);
    }

    public function updateBrand($id)
    {

        $brandModel = new BrandModel();

        $data = [
            'code' => $this->request->getPost('code'),
            'name' => $this->request->getPost('name'),
        ];
        // Update the Brand  in the database
        if (!$brandModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update Brand.');
        }

        return redirect()->to('/brand')->with('success', 'Brand  updated successfully.');
    }

    public function deleteBrand($id)
    {
        $brandModel = new BrandModel();
        $brandModel->delete($id);
        return redirect()->to('/brand');
    }
}