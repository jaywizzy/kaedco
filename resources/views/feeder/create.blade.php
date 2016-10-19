@extends('layouts.main')

@section('feeder_active')
    active
@stop

@section('navbar')
    @include('feeder.navbar')
@stop

@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Feeder Details</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_feeder', 'method' => 'POST', 'id' => 'showForm'])}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="E.g: Old Airport Junction Feeder" name="name" value="{{old('name')}}">
                                    </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Feeder Nerc Code</label>
                                            <input type="text" class="form-control" placeholder="Feeder Nerc Code" name="feeder_nerc_code" value="{{old('feeder_nerc_code')}}" maxlength="2">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Feeder Kaedc Code</label>
                                            <input type="text" class="form-control" placeholder="Feeder Kaedc Code" name="feeder_kaedc_code" value="{{old('feeder_kaedc_code')}}" maxlength="2">
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Area Office</label>
                                                <select class="form-control" name="area_office_name" value="{{old('area_office_name')}}" id="areaoffice_dropdown" {{count($feeders) < 1 ? "disabled":""}}>
                                                <option value="">Select Area Office</option>
                                                    @foreach($areaoffices as $areaoffice)
                                                        <option value="{{$areaoffice->nerc_code . $areaoffice->kaedc_code}}" {{old('area_office') == $areaoffice->nerc_code ? "selected":""}}>{{$areaoffice->area_office_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Injection Substation </label>
                                                <select class="form-control" name="substation_name" value="{{old('substation_name')}}" id="substation_dropdown">
                                                    <option> Selected</option>
                                                    @foreach ($substations as $substation)
                                                        <option value=""> </option>
                                                    @endforeach
                                                </select>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />
                            <button type="submit" class="btn btn-info btn-fill pull-right" id="submitBtn">Add Feeder</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('layouts.sessions')
                @include('layouts.errors')
            </div>


            <script type="text/javascript">
                $(function() {
                    var updatesubstationDropdown = function() {
                        if ($('#areaoffice_dropdown').val() == '') {
                            $('#substation_dropdown').prop('disabled', true);
                        } else {
                            $('#substation_dropdown').prop('disabled', false);
                        }
                    };                   
                    updatesubstationDropdown();
                    
                    // csrf token
                    var tok = $('#_token').val();
                    
                    // disable submit button when clicked
                    $("#submitBtn").on("click", function() {
                        $("#submitBtn").addClass("disabled");
                    });
                    
                    $('#areaoffice_dropdown').change(function() {
                        updatesubstationDropdown();

                        $.ajax({
                            "type":"POST",
                            "url": "{{route('ajax_areaoffice')}}",
                            "data": {
                                "_token": tok,
                                "areaofficecode": $('#areaoffice_dropdown').val(),
                            },
                            success: function(data) {
                                $('#substation_dropdown').empty();
                                $.each(data, function(i, substation) {
                                    $('#substation_dropdown').append($("<option>").text(substation['substation_name']).attr('value', substation['injection_nerc_code' + 'injection_code_kaedc']));
                                });

                                updatesubstationDropdown();
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log(xhr.responseText);
                            }
                        });
                    });

                    $('#substation_dropdown').change(function() {
                        

                        $.ajax({
                            "type":"POST",
                            "url": "{{route('ajax_substation')}}",
                            "data": {
                                "_token": tok,
                                "substationcode": $('#substation_dropdown').val(),
                            },
                            success: function(data) {
                                $('#feeder_dropdown').empty();
                                $.each(data, function(i, feeder) {
                                    $('#feeder_dropdown').append($("<option>").text(feeder['name']).attr('value', feeder['feeder_nerc_code']));
                                });
                               
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log(xhr.responseText);
                            }
                        });
                    });

                    $('#feeder_dropdown').change(function() {
                        

                        $.ajax({
                            "type":"POST",
                            "url": "{{route('ajax_feeder')}}",
                            "data": {
                                "_token": tok,
                                "hightensioncode": $('#feeder_dropdown').val(),
                            },
                            success: function(data) {
                                $('#hightension_dropdown').empty();
                                $.each(data, function(i, hightension) {
                                    $('#hightension_dropdown').append($("<option>").text(hightension['name']).attr('value', hightension['high_tension_nerc_code']));
                                });
                               
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log(xhr.responseText);
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>
@stop