<?php

namespace App\Http\Controllers;

use App\Repositories\BookCode\BookCodeContract;

use Illuminate\Http\Request;
use Session;

class BookCodeController extends Controller
{
    protected $repo;

	public function __construct(BookCodeContract $bookCodeContract){
		$this->repo = $bookCodeContract;

	}
	public function create(){
		$bookcodes = $this->repo->findAll();
		return view('bookcode.create')->with('bookcodes', $bookcodes);
	}

	public function store(Request $request){
		$this->validate($request, 
		[
			'name' => 'required',
			'code' => 'required',
		]);

		$bookcode = $this->repo->create($request);
        if ($bookcode->id) {
            return back()
                ->with('success', 'Book Code successfully registered.');
        } else {
            return back()
                ->withInput()
                ->with('error', 'There was a problem creating this book. Try again');
        }
	}
}
