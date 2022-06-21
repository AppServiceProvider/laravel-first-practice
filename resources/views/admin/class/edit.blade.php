@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <a href="{{route('class.index')}}" class="btn tbn-sm btn-primary" style="float: right"> All Classes</a>
                <div class="card-body">
                    @if(session()->has('success'))
                        <strong class="text-success">{{session()->get('success')}}</strong>
                    @endif

                    {{-- @if(session()->has('error'))
                    <strong class="text-success">{{session()->get('error')}}</strong>
                     @endif --}}

                    <form action="{{route('update')}}" method="post">
                        @csrf
                        <label for="" class="form-table">Class Name</label>
                        <input type="text" name="class_name" class="form-control @error('class_name') is-invalid @enderror" value="{{old('class_name')}}">

                 @error('class_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
