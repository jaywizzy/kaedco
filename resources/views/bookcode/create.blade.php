@extends('bookcode.master')

@section('bookcode_active')
    active
@stop

@section('content')

	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add new Book Code</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_bookcode', 'method' => 'POST'])}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Code </label>
                                        <input type="text" class="form-control" placeholder="Code" name="code" value="{{old('code')}}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Add Setting</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('layouts.sessions')
                @include('layouts.errors')
            </div>

            <div class="col-md-12">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookcodes as $bookcode )
                            <tr>                                    
                                <td>{{ $bookcode->name }}</td>
                                <td>{{ $bookcode->code }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop