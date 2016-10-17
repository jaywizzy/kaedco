<?php

namespace App\Repositories\Transformer;

interface TransformerContract
{
	public function create($request);
	public function edit($transformerid, $request);
	public function remove($transformerid);
	public function findById($transformerid);
	public function findAll(); 
}
