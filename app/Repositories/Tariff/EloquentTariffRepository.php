<?php

namespace App\Repositories\Tariff;

use App\Repositories\Tariff\TariffContract;
use App\Tariff;

class EloquentTariffRepository implements TariffContract
{

	public function create($request) {
        $tariff = new Tariff();
        $this->setTariffProperties($tariff, $request);
        $tariff->save();
        return $tariff;
    }
    
    public function edit($tariffid, $request) {
        $tariff = $this->findById($tariffid);
        $this->setTariffProperties($tariff, $request);
        $tariff->save();
        return $tariff;
    }
    
    public function remove($tariffid) {
        $tariff = $this->findById($tariffid);
        return $tariff->delete();
    }
    
    public function findById($tariffid) {
        return Tariff::find($tariffid);
    }
    
    public function findAll() {
        return Tariff::all();
    }
    
    private function setTariffProperties($tariff, $request) {
        $tariff->tariff_name = $request->tariff_name;
        $tariff->category = $request->category;
        $tariff->rate = $request->rate;        
    }
}
