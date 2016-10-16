<?php

namespace App\Repositories\AreaOffice;

interface AreaOfficeContract
{
	public function create($request);
    public function edit($areaOficeId, $request);
    public function remove($areaOficeId);
    public function findById($areaOficeId);
    public function findAll();
}
