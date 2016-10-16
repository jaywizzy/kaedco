@extends('hightension.master')

@section('hightension_active')
    active
@stop

@section('content')

	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add new High Tension</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_hightension', 'method' => 'POST'])}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" placeholder="Name" name="title" value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Footer</label>
                                        <input type="text" class="form-control" placeholder="High Tension Code" name="high_tension_code" value="{{old('high_tension_code')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-4">
                                    <div class="form-group">
                                        <label>Area Office</label>
                                        <select>
                                            <option> </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Substation</label>
                                        <select>
                                            <option> </option>
                                        </select>
                                    </div>
                                </div>
                            	<div class="col-md-4">
                                    <div class="form-group">
                                        <label>Feeder</label>
                                        <select>
                                            <option> </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Add High Tension</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('layouts.sessions')
                @include('layouts.errors')
            </div>
        </div>
    </div>

@stop