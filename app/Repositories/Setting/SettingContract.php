<?php

namespace App\Repositories\Setting;

interface SettingContract
{
	public function create($request);
	public function edit($settingid, $request);
	public function remove($settingid);
	public function findById($settingid);
	public function findAll();
}
