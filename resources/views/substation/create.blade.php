<!-- app/views/substations/create.blade.php -->

@extends('layouts.main')

@section('substation_active')
    active
@stop

@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add new Sub-Station</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_substation', 'method' => 'POST'])}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="E.g: Old Airport Substation" name="substation_name" value="{{old('substation_name')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>INJECTION NERC CODE</label>
                                        <input type="text" class="form-control" placeholder="E.g: 123" name="injection_nerc_code" value="{{old('injection_nerc_code')}}" maxlength="3">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>INJECTION KAEDC CODE</label>
                                        <input type="text" class="form-control" placeholder="E.g: 321" name="injection_kaedc_code" value="{{old('injection_kaedc_code')}}" maxlength="3">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>AREA OFFICE</label>
                                            <select class="form-control" name="area_office_name" value="{{old('area_office_name')}}" id="areaoffice_dropdown" {{count($feeders) < 1 ? "disabled":""}}>
                                                <option value="">Select Area Office</option>
                                                    @foreach($areao_ffices as $area_office)
                                                <option value="{{$area_office->nerc_code . $area_office->kaedc_code}}" {{old('area_office') == $areaoffice->nerc_code ? "selected":""}}>{{$area_office->area_office_name}}</option>
                                                        @endforeach
                                            </select>                         
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
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