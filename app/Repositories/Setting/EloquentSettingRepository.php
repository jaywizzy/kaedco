<?php

namespace App\Repositories\Setting;

use App\Repositories\Setting\SettingContract;
use App\Setting;

class EloquentSettingRepository implements SettingContract
{
	public function create($request)
	{
		$setting = new Setting();
		$this->setSettingProperties($setting, $request);
		$setting->save();
		return $setting;
	}

	public function edit($settingid, $request)
	{
		$setting = $this->findById($settingid);
		$this->setSettingProperties($setting, $request);
		$setting->save();
		return $setting;
	}

	public function remove($settingid)
	{
		$setting = $this->findById($settingid);
		return $setting->delete();

	}

	public function findById($settingid)
	{
		return Setting::find($settingid);

	}

	public function  findAll()
	{
		return Setting::all();
	}

	public function setSettingProperties($setting, $request) {
		$setting->state_code = 2;
		$setting->title = $request->title;
		$setting->footer = $request->footer;
		$setting->year = $request->year;
		$setting->month = $request->month;
		$setting->company_code = $request->company_code;
		$setting->state_name = "Kaduna";

	}
}
