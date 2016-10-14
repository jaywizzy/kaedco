@extends('category.master')

@section('service_active')
    active
@stop

@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add new Category</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_category', 'method' => 'POST'])}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control" placeholder="Category name" name="category" value="{{old('category')}}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Add Category</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('layouts.session')
                @include('layouts.errors')
            </div>
        </div>
    </div>
@stop