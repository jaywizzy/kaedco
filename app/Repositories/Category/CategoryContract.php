<?php

namespace App\Repositories\Category;

interface CategoryContract
{
	public function create($request);
	public function edit($categoryid, $request);
	public function remove($categoryid);
	public function findById($categoryid);
	public function findAll();
}																																												