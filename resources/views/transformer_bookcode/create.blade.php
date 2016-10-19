@extends('areaoffice.master')

@section('areaoffice_active')
    active
@stop

@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add new Area Office</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_area_office', 'method' => 'POST'])}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Name" name="fname" value="{{old('f_name')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Name" name="lname" value="{{old('l_name')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="textarea" class="form-control" placeholder="Address" name="addy" value="{{old('addy')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="number" class="form-control" placeholder="Phone Number" name="phone" value="{{old('phone')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Area Office</label>
                                    <select class="form-control" name="area_office_name" value="{{old('area_office_name')}}">
                                        @foreach($areaoffices as $areaoffice)

                                            <option value="{{$areaoffice->nerc_code . $areaoffice->kaedc_code}}">{{$areaoffice->area_office_name}}

                                            <option value="{{$areaoffice->nerc_code . $areaoffice->kaedc_code}}">
                                                {{$areaoffice->area_office_name}}
                                            </option>
                                        @endforeach
                                    </select>                                
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group">
                                    <label>Transformer</label>
                                      <select class="form-control" name="transformer" value="{{old('transformer'}" id="transformer_dropdown">
                                       <option> Selected</option>
                                        @foreach ($transformers as $transformer)
                                            <option value=""> </option>
                                        @endforeach
                                    </select>
                                </div>                              
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Book Code</label>
                                      <select class="form-control" name="bookcode" value="{{old('bookcode'}" id="bookcode_dropdown">
                                       <option> Selected</option>
                                        @foreach ($bookcodes as $bookcode)
                                            <option value=""> </option>
                                        @endforeach
                                    </select>
                                </div>                              
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Category</label>
                                      <select class="form-control" name="category" value="{{old('category'}" id="category_dropdown">
                                       <option> Selected</option>
                                        @foreach ($catefories as $category)
                                            <option value=""> </option>
                                        @endforeach
                                    </select>
                                </div>                              
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meter Number</label>
                                        <input type="text" class="form-control" placeholder="Meter Number" name="meterno" value="{{old('meterno')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Initial Meter Reading</label>
                                        <input type="text" class="form-control" placeholder="Initial Meter Reading" name="initMeterReadding" value="{{old('initMeterReading')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Classification</label>
                                    <select class="form-control" name="classification" value="{{old('classification'}" >
                                        <option> Selected</option>
                                        <option value="md">MD</option>
                                        <option value="nonmd">NON-MD</option>                                    
                                    </select>
                                </div>                              
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tariff Type</label>
                                      <select class="form-control" name="tariff" value="{{old('tariff'}" id="tariff_dropdown">
                                       <option> Selected</option>
                                        @foreach ($tariffs as $tariff)
                                            <option value=""> </option>
                                        @endforeach
                                    </select>
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