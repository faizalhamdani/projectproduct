<?php
namespace App\Controllers;

use App\Models\SparepartwarrantyModel;

class GaransiSparepartController extends BaseController
{
    // Dashboard view
    public function index()
    {   
        $garansisparepartModel = new SparepartwarrantyModel();
        // Get the garansi_sparepart value from the session
        $data['garansi_sparepart'] = $garansisparepartModel->findAll();
    
        // Pass the garansi_sparepart value to the view
        return view('garansi_sparepart/garansi_sparepart', $data);
    }

    public function addGaransiSparepart()
    {
        $data['title'] = "Add GaransiSparepart";
        return view('garansi_sparepart/add_garansi_sparepart',$data);
    }

    public function saveGaransiSparepart()
    {
    $garansisparepartModel = new SparepartwarrantyModel();

    $data = [
        'value' => $this->request->getPost('value'),
    ];
    if (!$garansisparepartModel->save($data)) {
        return redirect()->back()->with('error', 'Failed to add Sparepart Warranty.');
    }

    return redirect()->to('/garansi_sparepart')->with('success', 'Sparepart Warranty added successfully.');
    }

    public function editGaransiSparepart($id)
    {
        $garansisparepartModel = new SparepartwarrantyModel();
        $data['sparepartwarranty'] = $garansisparepartModel->find($id);
        $data['title'] = "Edit Garansi Sparepart";

        if (!$data['sparepartwarranty']) {
            return redirect()->to('/garansi_sparepart')->with('error', 'Garansi Sparepart  not found.');
        }

        return view('garansi_sparepart/edit_garansi_sparepart', $data);
    }

    public function updateGaransiSparepart($id)
    {

        $garansisparepartModel = new SparepartwarrantyModel();

        $data = [
            'value' => $this->request->getPost('value'),
        ];
        // Update the GaransiSparepart  in the database
        if (!$garansisparepartModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update Sparepart Warranty.');
        }

        return redirect()->to('/garansi_sparepart')->with('success', 'Sparepart Warranty updated successfully.');
    }

    public function deleteGaransiSparepart($id)
    {
        $garansisparepartModel = new SparepartwarrantyModel();
        $garansisparepartModel->delete($id);
        return redirect()->to('/garansi_sparepart');
    }
}