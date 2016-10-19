<!-- app/views/substations/create.blade.php -->

@extends('substation.master')

@section('substation_active')
    active
@stop

@section('content')
	
    <div class="col-md-12">
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
    </div>
                    
@stop