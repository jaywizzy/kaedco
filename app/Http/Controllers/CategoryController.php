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
	public function create(){
		return view('category.create');
	}

	public function index(){
		$categories = $this->repo->findAll();
		return view('category.create', ['category', $categories]);
	}

	public function show(){
		return view('category.show');
	}

	public function store(Request $request){
		$this->validate($request, [
			'description' => 'required',
			]);
	}

	public function showEdit($id) {
        $categories = $this->repo->findById($id);
        return view('category.edit', ['category', $category]);
    }
}
