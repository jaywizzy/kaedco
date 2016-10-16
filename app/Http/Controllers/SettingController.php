<?php

namespace App\Http\Controllers;

use App\Repositories\Setting\SettingContract;
use Illuminate\Http\Request;
use Session;

class SettingController extends Controller
{
    protected $repo;

	public function __construct(SettingContract $settingContract){
		$this->repo = $settingContract;

	}
	public function create(){
		$settings = $this->repo->findAll();
		return view('settings.create')->with('settings', $settings);
	}

	public function store(Request $request){
		$this->validate($request, 
		[
			'title' => 'required',
			'footer' => 'required',
			'year' => 'required',
			'month' => 'required',
			'company_code' => 'required',
		]);

		$setting = $this->repo->create($request);
        if ($setting->id) {
            return back()
                ->with('success', 'Setting successfully registered.');
        } else {
            return back()
                ->withInput()
                ->with('error', 'There was a problem creating this setting. Try again');
        }
	}
}
