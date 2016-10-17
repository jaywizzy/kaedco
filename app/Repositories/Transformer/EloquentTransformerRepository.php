<?php

namespace App\Repositories\Transformer;

use App\Transformer;

class EloquentTransformerRepository implements TransformerContract
{

	public function create($request) {
        $transformer = new Transformer();
        $this->setTransformerProperties($transformer, $request);
        $transformer->save();
        return $transformer;
    }
    
    public function edit($transformerid, $request) {
        $transformer = $this->findById($transformerid);
        $this->setTransformerProperties($transformer, $request);
        $transformer->save();
        return $transformer;
    }
    
    public function remove($transformerid) {
        $transformer = $this->findById($transformerid);
        return $transformer->delete();
    }
    
    public function findById($transformerid) {
        return Transformer::find($transformerid);
    }
    
    public function findAll() {
        return Transformer::all();
    }
    
    private function setTransformerProperties($transformer, $request) {
        $transformer->name = $request->name;
        $transformer->transformer_nerc_code = $request->transformer_nerc_code;
        $transformer->transformer_kaedc_code = $request->transformer_kaedc_code;

        $transform1= str_split($request->area_office_name, 2);
        $transform2= str_split($request->substation_name, 3);       
        $transform3=str_split($request->feeder_name, 2);
        $transform4=str_split($request->high_tension_name, 4);

        $transformer->hightension_code_nerc = $transform4[0];
        $transformer->hightension_code_kaedc = $transform4[1];
        $transformer->injection_code_nerc = $transform3[0];
        $transformer->injection_code_kaedc = $transform3[1];
        $transformer->feeder_code_nerc = $transform2[0];
        $transformer->feeder_code_kaedc = $transform2[1];
        $transformer->areaoffice_code_nerc = $transform1[0];
        $transformer->areaoffice_code_kaedc = $transform1[1];
    }
}
