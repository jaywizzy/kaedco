<?php

namespace App\Repositories\HighTension;

interface HighTensionContract
{
	public function create($request);
	public function edit($hightensionid, $request);
	public function remove($hightensionid);
	public function findById($hightensionid);
	public function findAll();
}
