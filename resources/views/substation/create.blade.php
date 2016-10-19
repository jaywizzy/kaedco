<!-- app/views/substations/create.blade.php -->
@extends(layouts.main)
@extends('substation.master')

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
                                        <input type="text" class="form-control" placeholder="E.g: 021" name="injection_nerc_code" value="{{old('injection_nerc_code')}}" maxlength="3">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>INJECTION KAEDC CODE</label>
                                        <input type="text" class="form-control"  placeholder="E.g: 123" name="injection_kaedc_code" value="{{old('injection_kaedc_code')}}" maxlength="3">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>AREA OFFICE</label>
                                        <select name="area_office_name" id=areaofffice_dropdown class="form-control" {{count($areaoffices) < 1 ? "disabled":"" }}>
                                            
                                            <option value="">Area Office</option>
                                            @foreach($areaoffices as $areaoffice)

                                               <!--  <option value="{{ $areaoffice->nerd_code }}" {{old('area_office') == $area_office->nerc_code ? "selected":""}}>{{ $area_office->substation_name }}</option> -->

                                                <option value="{{$areaoffice->nerc_code . $areaoffice->kaedc_code}}">{{$areaoffice->area_office_name}}

                                                <option value="{{$areaoffice->nerc_code . $areaoffice->kaedc_code}}">
                                                    {{$areaoffice->area_office_name}}
                                                </option>
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

           <!--  <div class="col-md-12">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Sub-Station Name</th>
                            <th>Injection Nerc Code</th>
                            <th>Injection Kaedc Code</th>
                            <th>Area Office Nerc</th>
                            <th>Area Office Kaedc</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        @foreach( $substations as $substation )
                            <tr>                                    
                                <td>{{ $substation->substation_name }} </td>
                                <td>{{ $substation->injection_nerc_code }}</td>
                                <td>{{ $substation->injection_kaedc_code }}</td>
                                <td>{{ $substation->area_office_nerc }}</td>
                                <td>{{ $substation->area_office_kaedc }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ '/editsubstation/'.$substation->injection_nerc_code }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> -->
        </div>
    </div>
@stop