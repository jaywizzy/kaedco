<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\Transformer\TransformerContract;

class TransformerController extends Controller
{
    protected repo;

    public function __construct(TransformerContract $transformerContract) {
    	$this->repo = $transformerContract
    }

    public function create() {
    	$transformers = $this->repo->findAll();
    	return view('transformer.create')->with('transformers', $transformers);
    }
}
