@extends('settings.master')

@section('setting_active')
    active
@stop

@section('content')

	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add new Setting</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_setting', 'method' => 'POST'])}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" placeholder="Title" name="title" value="{{old('title')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Footer</label>
                                        <input type="text" class="form-control" placeholder="Footer" name="footer" value="{{old('footer')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-4">
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="text" class="form-control" placeholder="Year" name="year" value="{{old('year')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Month</label>
                                        <input type="text" class="form-control" placeholder="Month" name="month" value="{{old('month')}}">
                                    </div>
                                </div>
                            	<div class="col-md-4">
                                    <div class="form-group">
                                        <label>Company Code</label>
                                        <input type="text" class="form-control" placeholder="Company Code" name="company_code" value="{{old('company_code')}}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Add Setting</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('layouts.sessions')
                @include('layouts.errors')
            </div>

            <div class="col-md-12">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>State Name</th>
                            <th>Title</th>
                            <th>Footer</th>
                            <th>Year</th>
                            <th>Month</th>
                            <th>Company Code</th>
                            <th>State Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($settings as $setting )
                            <tr>                                    
                                <td>{{ $setting->state_name }}</td>
                                <td>{{ $setting->title }}</td>
                                <td>{{ $setting->footer }}</td>
                                <td>{{ $setting->year }}</td>
                                <td>{{ $setting->month }}</td>
                                <td>{{ $setting->company_code }}</td>
                                <td>{{ $setting->state_code }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop