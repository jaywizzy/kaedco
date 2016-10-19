<?php

namespace App\Repositories\TransformerBookCode;
use App\Repositories\TransformerBookCode\TransformerBookCodeContract;

use App\TransformerBookCode;

class EloquentTransformerBookCodeRepository implements TransformerBookCodeContract
{

	public function create($request) {
		$transformerBookCode = new TransformerBookCode();
		$this->setTransformerBookCodeProperties($transformerBookCode, $request);
		$transformerBookCode->save();
		return $transformerBookCode;
	}

	public function findAll() {
        return TransformerBookCode::all();
    }

	private function setTransformerBookCodeProperties($transformerBookCode, $request) {
		$transformerBookCode->transcode = $request->transcode;
		$transformerBookCode->bookcode = $request->bookcode;
		$transformerBookCode->area_office_nerc = $request->area_office_nerc;
		$transformerBookCode->area_office_kaedc = $request->area_office_kaedc;	
	}
}
