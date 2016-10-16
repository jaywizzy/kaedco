<?php

namespace App\Repositories\BookCode;

interface BookCodeContract
{
	public function create($request);
	public function edit($bookcodeid, $request);
	public function remove($bookcodeid);
	public function findById($bookcodeid);
	public function findAll();
}
