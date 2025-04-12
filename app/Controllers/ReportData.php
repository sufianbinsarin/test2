<?php

namespace App\Controllers;

use App\Models\BuildingModel;

class ReportData
{
    public function getReportData($month = null, $buildingType = null)
    {
        $model = model(BuildingModel::class);
        $builder = $model->builder();
        
        if ($month) {
            $builder->where('month', $month);
        }
        if ($buildingType) {
            $builder->where('buildingType', $buildingType);
        }
        
        return $builder->get()->getResultArray();
    }
} 