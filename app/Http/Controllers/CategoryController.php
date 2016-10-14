<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryContract;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
	protected $repo;

	public function __construct(CategoryContract $categoryContract){
		$this->repo = $categoryContract;

	}

	public function index(){
		$categories = $this->repo->findAll();
		return view('category.create', ['category', $categories]);
	}

	public function show(){
		return view('category.create');
	}

	public function store(Request $request){
		$this->validate($request, [
			'description' => 'required',
			]);
	}
}
