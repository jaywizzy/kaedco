@extends('layouts.main')

@section('navbar')
    @include('areaoffice.navbar')
@stop

@section('areaoffice_active')
    active
@stop

@section('content')

	<div class="col-md-12">
	    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	                <th>Area Office Name</th>
	                <th>NERC Code</th>
	                <th>KAEDCO Code</th>
	            </tr>
	        </thead>
	        <tbody>
	            @foreach( $areaOffices as $areaoffice )
	                <tr>                                    
	                    <td>{{ $areaoffice->area_office_name }} </td>
	                    <td>{{ $areaoffice->nerc_code }}</td>
	                    <td>{{ $areaoffice->kaedc_code }}</td>
	                </tr>
	            @endforeach
	        </tbody>
	    </table>
	</div>
@stop