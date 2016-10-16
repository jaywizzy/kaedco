<?php

namespace App\Repositories\AreaOffice;

class EloquentAreaOfficeRepository implements AreaOfficeContract
{

	public function create($request) {
        $areaOffice = new AreaOffice();
        $this->setAreaOfficeProperties($areaOffice, $request);
        $areaOffice->save();
        return $areaOffice;
    }
    
    public function edit($areaOfficeId, $request) {
        $areaOffice = $this->findById($areaOfficeId);
        $this->setTariffProperties($areaOffice, $request);
        $areaOffice->save();
        return $areaOffice;
    }
    
    public function remove($areaOfficeId) {
        $areaOffice = $this->findById($areaOfficeId);
        return $areaOffice->delete();
    }
    
    public function findById($areaOfficeId) {
        return AreaOffice::find($areaOfficeId);
    }
    
    public function findAll() {
        return AreaOffice::all();
    }
    
    private function setTariffProperties($areaOffice, $request) {
        $areaOffice->area_office_name = $request->area_office_name;
        $areaOffice->nerc_code = $request->nerc_code;
        $areaOffice->kaedc_code = $request->kaedc_code;
        
    }
}
