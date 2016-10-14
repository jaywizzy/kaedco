<?php

namespace App\Repositories\Cate;
interface CategoryContract
{
	public function create($request);
	public function edit($categoryid, $request);
	public function remove($categoryid)
	public function findById($categoryid);
	public function findAll();
}