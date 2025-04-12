<?php

namespace App\UseCase;

use App\Models\BuildingModel;

class ReportData
{
    public function getReportData($data=[])
    {
        try {
            $model = model(BuildingModel::class);
            $columns = ['customerName','buildingType','month','usability'];
            $model->select($columns);
            $totalRecords = $model->countAll();
            $draw = $data['draw'];
            
            $model->groupStart()
                  ->like('customerName', $data['searchValue'])
                  ->orLike('buildingType', $data['searchValue'])
                  ->orLike('month', $data['searchValue'])
                  ->orLike('usability', $data['searchValue'])
                  ->groupEnd();

            if ($data['month'] != '0') {
                $model->where('month', $data['month']);
            }
            if ($data['buildingType'] != '') {
                $model->where('buildingType', $data['buildingType']);
            }

            $filteredRecords = $model->countAllResults(false);
    
            $data = $model->orderBy('id', 'ASC')
                        ->findAll($data['length'], $data['start']);

            $data = $this->calculateBill($data);
            
            $response = [
                'draw' => intval($draw),
                'recordsTotal' => $totalRecords,
                'recordsFiltered' => $filteredRecords,
                'data' => $data
            ];
            
        } catch (\Exception $e) {
            $response = [
                'draw' => intval($draw ?? 0),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => [],
                'error' => $e->getMessage(),
                'debug' => [
                    'trace' => $e->getTraceAsString(),
                    'inputData' => $data
                ]
            ];
        }
      
        return $response;
    }

    public function calculateBill($data){
        $arrayBilled = [];
        foreach ($data as $item) {
            $totalBill = 0;
            $newItem=$item;
            if($item['buildingType'] == 'Residential'){
                if($item['usability']> 200){
                    $totalBill=200 * 0.45;
                    $balance = $item['usability'] - 200;
                    $totalBill += $balance * 0.97;
                }else{
                    $totalBill = $item['usability'] * 0.45;
                }
            }
            if($item['buildingType'] == 'Commercial'){
                if($item['usability']> 200){
                    $totalBill=200 * 0.89;
                    $balance = $item['usability'] - 200;
                    $totalBill += $balance * 1.13;
                }else{
                    $totalBill = $item['usability'] * 0.89;
                }
            }
            $newItem['bill'] = number_format($totalBill, 2);
            $arrayBilled[] = $newItem;
        }
        return $arrayBilled;
    }
} 