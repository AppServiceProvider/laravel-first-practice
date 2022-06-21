@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New student') }}</div>
                <a href="{{route('students.index')}}" class="btn tbn-sm btn-primary" style="float: right"> All Student</a>
                <div class="card-body">
                    @if(session()->has('success'))
                        <strong class="text-success">{{session()->get('success')}}</strong>
                    @endif


                    <form action="{{route('students.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Class Name</label>
                            <select class="form-control" id="" name="class_id">
                                @foreach ($classes as $row)
                                    <option value="{{$row->id}}">{{$row->class_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-table">Student name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                         </div>

                         <div class="mb-3">
                            <label for="" class="form-table">Student roll</label>
                            <input type="text" name="roll" class="form-control @error('roll') is-invalid @enderror" value="{{old('roll')}}">
                    @error('roll')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                         </div>

                         
                         <div class="mb-3">
                            <label for="" class="form-table">Student phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">
                    @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                         </div>

                         <div class="mb-3">
                            <label for="" class="form-table">Student email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                    @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                         </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
