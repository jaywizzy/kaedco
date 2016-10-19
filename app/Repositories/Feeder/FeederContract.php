<?php

namespace App\Repositories\Feeder;

interface FeederContract
{
	public function create($request);
	public function findFeederBySubstation($substationcode);
	public function findAll();

}
