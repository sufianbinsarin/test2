<?php

namespace App\Controllers;

use App\Models\BuildingModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\UseCase\ReportData;

class Building extends BaseController
{
    public function index()
    {
        $model = model(BuildingModel::class);
        $data = [
            'data' => $model->findAll()
        ];

        return view('building/index', $data);
    }       

    public function type($type){
        $model = model(BuildingModel::class);
        $data = [
            'type' => $type,
            'data' => $model->where('buildingType', $type)->findAll()
        ];
        return view('building/type', $data);
    }   

    public function state($state){
        $model = model(BuildingModel::class);
        $data = [
            'state' => $state,
            'data' => $model->where('state', $state)->findAll()
        ];
        return view('building/state', $data);
    }

    public function create(){
        helper('form');
        return view('building/create');
    }   

    public function store(){
        $model = model(BuildingModel::class);
        
        // Get the ID if it exists (for update), otherwise null (for insert)
        $id = $this->request->getVar('id');
        
        $data = [
            'customerName' => $this->request->getVar('customerName'),
            'buildingType' => $this->request->getVar('buildingType'), 
            'month' => $this->request->getVar('month'),
            'usability' => $this->request->getVar('usability'),
            'state' => $this->request->getVar('state'),
        ];

        // If ID exists, add it to data array for update
        if ($id) {
            $data['id'] = $id;
        }
        
        if(!$model->save($data)){
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/');
    }

    public function show($id){
        $model = model(BuildingModel::class);
        $data = [
            'building' => $model->where('id', $id)->first() 
        ];

        if(empty($data['building'])){
            throw new PageNotFoundException('Cannot find the building item: ' . $id);
        }

        return view('building/show', $data);
    }

    public function edit($id){
        helper('form');
        $model = model(BuildingModel::class);
        $data = [
            'building' => $model->where('id', $id)->first()     
        ];

        if(empty($data['building'])){
            throw new PageNotFoundException('Cannot find the building item: ' . $id);
        }

        return view('building/edit', $data);
    }

    public function delete($id){
        $model = model(BuildingModel::class);
        $model->delete($id);

        return redirect()->to('/');     
    }

    public function report(){
        return view('building/report');
    }

    public function ajaxDatatable(){
        $reportData = new ReportData();
        $data=[
            'draw' => $this->request->getPost('draw'),
            'start' => $this->request->getPost('start'),
            'length' => $this->request->getPost('length'),
            'searchValue' => $this->request->getPost('search')['value'],
            'month' => $this->request->getPost('month'),
            'buildingType' => $this->request->getPost('buildingType'),
        ];
        $response = $reportData->getReportData($data);
        return $this->response->setJSON($response);
    }
}