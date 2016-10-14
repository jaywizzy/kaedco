@extends('tariff.master')

@section('service_active')
    active
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add a Tariff Plan</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_tariff', 'method' => 'POST'])}}
                            <div class="row">
                                <!--<div class="col-md-6">-->
                                <!--    <div class="form-group">-->
                                <!--        <label>Type</label>-->
                                <!--        <select class="form-control" name="type" value="{{old('type')}}">-->
                                <!--            <option> type1 </option>-->
                                <!--            <option> type2 </option>-->
                                <!--            <option> type3 </option>-->
                                <!--        </select> -->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control" placeholder="Service Description" name="description" value="{{old('description')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                     <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" class="form-control" placeholder="Price" name="price" value="{{old('price')}}">
                                    </div>
                                </div>
                               
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Add Service</button>
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
