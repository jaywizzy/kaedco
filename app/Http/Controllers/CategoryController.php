<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryContract;
use Illuminate\Http\Request;
use Session;

use App\Http\Requests;

class CategoryController extends Controller
{
	protected $repo;

	public function __construct(CategoryContract $categoryContract){
		$this->repo = $categoryContract;

	}
	public function create(){
		$categories = $this->repo->findAll();
		return view('category.create')->with('categories', $categories);
	}

	public function store(Request $request){
		$this->validate($request, 
		[
		'category' => 'required',
		]);

		$category = $this->repo->create($request);
        if ($category->id) {
            return back()
                ->with('success', 'Category successfully registered.');
        } else {
            return back()
                ->withInput()
                ->with('error', 'There was a problem creating the category. Try again');
        }
	}
}
