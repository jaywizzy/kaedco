
@extends('layouts.main')

@section('navbar')
    @include('areaoffice.navbar')
@stop

@section('areaoffice_active')
    active
@stop

@section('stylesheets')
    <link href="/css/responsivemodal.css" rel="stylesheet" />
    <style media="screen">
        body {
            overflow-x: hidden;
            overflow-y: hidden;
        }
    </style>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.errors')
            @include('layouts.sessions')
        </div>
        
        <div class="row">
            @if(count($areaOffices) < 1)
                <div>No Area Office yet!</div>
            @else
                @foreach($areaOffices as $areaoffice)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="content">
                                <h6 style="word-wrap: break-word;text-transform:none;">
                                    <p class="category">Area Office Name</p><span style="font-size:15px;">
                                        {{$areaoffice->area_office_name}}</span>
                                </h6><hr>
                                <h6 style="word-wrap: break-word;text-transform:none;">
                                    <p class="category">NERC Code</p><span style="font-size:15px;">
                                        {{$areaoffice->nerc_code}}</span>
                                </h6><hr>
                                <h6 style="word-wrap: break-word;text-transform:none;">
                                    <p class="category">KAEDCO Code</p><span style="font-size:15px;">
                                        {{$areaoffice->kaedc_code}}</span>
                                </h6>
                                <div class="row">
                                    <div class="modal fade m-medium" id="modal_edit_{{$areaoffice->code}}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-businessunit" data-backdrop="false">
                                        <div class="modal-dialog" role="document">
                                            {{Form::open(['route' => ['update_areaoffice', $areaoffice->nerc_code], 'method' => 'PUT', 'id' => 'showForm'])}}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Edit Business Unit?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Area Office Name</label>
                                                                    <input type="text" class="form-control" placeholder="E.g: Old Airport Business Unit" name="name" value="{{$areaoffice->area_office_name}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>NERC Code</label>
                                                                    <input type="text" class="form-control" placeholder="E.g: 1" name="code" value="{{$areaoffice->nerc_code}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>KAEDCO Code</label>
                                                                    <input type="text" class="form-control" placeholder="E.g: 1" name="code" value="{{$areaoffice->kaedc_code}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        {{Form::submit('Save', ['class' => 'btn btn-info btn-fill pull-right', 'id' => 'submitBtn'])}}
                                                    </div>
                                                </div>
                                            {{Form::close()}}
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="row">
                                    <div class="modal fade m-medium" id="modal_delete_{{$areaoffice->nerc_code}}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-businessunit" data-backdrop="false">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Delete Business Unit?</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="s-text">Remove <strong>'{{ $areaoffice->name }}'</strong> from your list of business units? </br><span class="p-text">This cannot be undone.</span></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{route('delete_areaoffice', $areaoffice->nerc_code)}}" class="btn btn-fill btn-danger pull-right">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <a data-toggle="modal" data-target="#modal_edit_{{$areaoffice->nerc_code}}" id="edit-bu-btn" style="cursor:pointer;">
                                            <i class="fa fa-pencil text-warning"></i> Edit
                                        </a>
                                        <a data-toggle="modal" data-target="#modal_delete_{{$areaoffice->nerc_code}}" id="delete-bu-btn" style="cursor:pointer;margin-left:10px;">
                                            <i class="pe-7s-trash text-warning"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@stop
