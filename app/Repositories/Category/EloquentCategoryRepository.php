<?php

namespace App\Repositories\Category;

use App\Repositories\Category\CategoryContract;
use App\Category;

class EloquentCategoryRepository implements CategoryContract{

	public function create($request)
	{
		$category = new Category();
		$this->setCategoryProperties($category, $request);
		$category->save();
		return $category;
	}

	public function edit($categoryid, $request)
	{
		$category = $this->findById($categoryid);
		$this->setCategoryProperties($category, $request);
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
		return Category::find($categoryid);

	}

	public function  findAll()
	{
		return Category::all();
	}

	public function setCategoryProperties($category, $request){
		$category->category = $request->category;

	}
}