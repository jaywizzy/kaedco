<?php

namespace App\Repositories\Category;

use App\Repositories\Category\CategoryContract;
use App\Category;

class EloquentCategoryRepository implements CategoryContract{

	public function create($request)
	{
		$category = new Category();
		$category->save();
		return $category;
	}

	public function edit($categoryid, $request)
	{
		$category = $this->findById($categoryid);
		$category->save();
		return $category;
	}

	public function remove($categoryid)
	{
		$category = $this->findById($categoryid);
		return $category->delete();

	}

	public function findById($categoryid)
	{
		return Category::find($category);

	}

	public function  findAll()
	{
		return Category::all();

	}
}