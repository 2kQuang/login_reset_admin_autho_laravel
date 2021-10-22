@extends('main')
@section('content')
@if(session()->has('msg'))
<b style="color: green">{{session()->get('msg')}}</b>
<br>
@endif



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('categories.update',['id'=>$categories['id']])}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" name="name"
                                value="{{$categories['name']}}" required>
                        </div>

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="role" value="{{auth()->user()->id}}">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection