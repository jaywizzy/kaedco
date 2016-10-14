<?php

namespace App\Repositories\Tariff;

interface TariffContract
{
	public function create($request);
    public function edit($tariffid, $request);
    public function remove($tariffid);
    public function findById($tariffid);
    public function findAll();
    
}
