<?php

namespace App\Repositories\BookCode;

use App\Repositories\BookCode\BookCodeContract;
use App\BookCode;

class EloquentBookCodeRepository implements BookCodeContract
{
	public function create($request)
	{
		$bookcode = new BookCode();
		$this->setBookCodeProperties($bookcode, $request);
		$bookcode->save();
		return $bookcode;
	}

	public function edit($bookcodeid, $request)
	{
		$bookcode = $this->findById($bookcodeid);
		$this->setBookCodeProperties($bookcode, $request);
		$bookcode->save();
		return $bookcode;
	}

	public function remove($bookcodeid)
	{
		$bookcode = $this->findById($bookcodeid);
		return $bookcode->delete();

	}

	public function findById($bookcodeid)
	{
		return BookCode::find($bookcodeid);

	}

	public function  findAll()
	{
		return BookCode::all();
	}

	public function setBookCodeProperties($bookcode, $request){
		$bookcode->name = $request->name;
		$bookcode->code = $request->code;


	}
}
