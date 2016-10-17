<?php

namespace App\Repositories\Transformer;

use App\Transformer;

class EloquentTransformerRepository implements TransformerContract
{

	public function create($request) {
        $transformer = new Tariff();
        $this->setTariffProperties($transformer, $request);
        $transformer->save();
        return $transformer;
    }
    
    public function edit($tariffid, $request) {
        $transformer = $this->findById($tariffid);
        $this->setTransformerProperties($transformer, $request);
        $transformer->save();
        return $transformer;
    }
    
    public function remove($tariffid) {
        $transformer = $this->findById($tariffid);
        return $transformer->delete();
    }
    
    public function findById($tariffid) {
        return Transformer::find($tariffid);
    }
    
    public function findAll() {
        return Transformer::all();
    }
    
    private function setTransformerProperties($tariff, $request) {
        $transformer->name = $request->name;
        $transformer->transformer_code = $request->transformer_code;
        $transformer->hight_tension_code_nerc = $request->hight_tension_code_nerc;
        $transformer->hight_tension_code_kaedco = $request->hight_tension_code_kaedco;
        $transformer->injection_code_nerc = $request->injection_code_nerc;
        $transformer->injection_code_kaedco = $request->injection_code_kaedco;
        $transformer->area_office_code_nerc = $request->area_office_code_nerc;
        $transformer->area_office_code_kaedco = $request->area_office_code_kaedco;
        $transformer->feeder_code_nerc = $request->feeder_code_nerc;
        $transformer->feeder_code_kaedco = $request->feeder_code_kaedco;

    }
}
