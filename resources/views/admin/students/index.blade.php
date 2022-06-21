@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Students') }}</div>
                <a href="{{route('students.create')}}" class="btn tbn-sm btn-primary" style="float: right"> Add Student</a>
                <div class="card-body">
                    @if(session()->has('success'))
                    <strong class="text-success">{{session()->get('success')}}</strong>
                @endif
                    <table class="table table-responsive table-stroe">
                        <thead>
                            <tr>
                                <td>SL </td>
                                <td>Roll </td>
                                <td>name </td>
                                <td> Phone</td>
                                <td>Email</td>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php ($i=1) --}}
                            @foreach ( $students as $key=> $row )                      
                            <tr>
                                {{-- <td>{{$i++}}</td> --}}
                                <td>{{++$key}}</td>
                                {{-- <td>{{ $row->class_id}}</td>  --}}
                                <td>{{ $row->class_name}}</td>
                                <td>{{ $row->name}}</td>
                                <td>{{ $row->roll}}</td>
                                <td>{{ $row->phone}}</td>
                                <td>{{ $row->email}}</td>
                                <td>
                                    <a href="{{route('students.show', $row->id)}}" class="btn btn-sm btn-info">Show</a>

                                    <a href="" class="btn btn-sm btn-info">Edit</a>
                                    {{-- <a href="{{route('students.destroy', $row->id)}}" class="btn btn-sm btn-info">Delete</a>  --}}
                                    <form action="{{route('students.destroy', $row->id)}}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{-- <input type="hidden" name="_TOKEN" value="{{csrf_token()}}">  --}}
                                        <button type="submit" class="btn btn-sm btn-info">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
