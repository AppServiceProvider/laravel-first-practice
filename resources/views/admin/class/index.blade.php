@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <a href="{{route('create')}}" class="btn tbn-sm btn-primary" style="float: right"> Add New</a>
                <div class="card-body">
                    <table class="table table-responsive table-stroe">
                        <thead>
                            <tr>
                                <td>SL </td>
                                <td> Class Name</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php ($i=1) --}}
                            @foreach ( $class as $key=> $row )                      
                            <tr>
                                {{-- <td>{{$i++}}</td> --}}
                                <td>{{++$key}}</td>
                                <td>{{ $row->class_name	}}</td>



                                <td>
                                    <a href="" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{route('classDelete', $row->id)}}" class="btn btn-sm btn-info">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $class->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
