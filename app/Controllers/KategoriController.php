<?php
namespace App\Controllers;

use App\Models\CategoryModel;

class KategoriController extends BaseController
{
    // Dashboard view
    public function index()
    {   
        $kategoriModel = new CategoryModel();
        // Get the kategori code from the session
        $data['kategori'] = $kategoriModel->findAll();
    
        // Pass the kategori code to the view
        return view('kategori/kategori', $data);
    }

    public function addKategori()
    {
        $data['title'] = "Add Category";
        return view('kategori/add_kategori',$data);
    }

    public function saveKategori()
    {
    $kategoriModel = new CategoryModel();

    $data = [
        'name' => $this->request->getPost('name'),
    ];
    if (!$kategoriModel->save($data)) {
        return redirect()->back()->with('error', 'Failed to add Category.');
    }

    return redirect()->to('/kategori')->with('success', 'Category added successfully.');
    }

    public function editKategori($id)
    {
        $kategoriModel = new CategoryModel();
        $data['category'] = $kategoriModel->find($id);
        $data['title'] = "Edit Kategori";

        if (!$data['category']) {
            return redirect()->to('/kategori')->with('error', 'Kategori  not found.');
        }

        return view('kategori/edit_Kategori', $data);
    }

    public function updateKategori($id)
    {

        $kategoriModel = new CategoryModel();

        $data = [
            'name' => $this->request->getPost('name'),
        ];
        // Update the Kategori  in the database
        if (!$kategoriModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update Kategori.');
        }

        return redirect()->to('/kategori')->with('success', 'Kategori updated successfully.');
    }

    public function deleteKategori($id)
    {
        $kategoriModel = new CategoryModel();
        $kategoriModel->delete($id);
        return redirect()->to('/kategori');
    }
}