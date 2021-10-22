@extends('main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update new place') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('maps.update',['id'=>$map['id']])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right ">{{ __('Old_Image') }}</label>
                            <div class="col-md-4 col-form-label text-md-right border">
                                <img src="{{asset($map['image'])}}" height="150px" width="150px" alt="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('New_Image') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" name="image" accept="image/*"
                                    value="{{ $map['avatar'] }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $map['name'] }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ $map['phone'] }}" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="open"
                                class="col-md-4 col-form-label text-md-right">{{ __('Time Open') }}</label>

                            <div class="col-md-6">
                                <input id="open" type="time"
                                    class="form-control @error('open') is-invalid @enderror" name="open"
                                    value="{{ $map['open'] }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="open"
                                class="col-md-4 col-form-label text-md-right">{{ __('Time Close') }}</label>

                            <div class="col-md-6">
                                <input id="close" type="time"
                                    class="form-control @error('close') is-invalid @enderror" name="close"
                                    value="{{ $map['close'] }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address"
                                class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ $map['address'] }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                                <input id="area" type="text"
                                    class="form-control @error('area') is-invalid @enderror" name="area"
                                    value="{{ $map['area'] }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="maps"
                                class="col-md-4 col-form-label text-md-right">{{ __('Maps') }}</label>

                            <div class="col-md-6">
                                <input id="maps" type="text"
                                    class="form-control @error('maps') is-invalid @enderror" name="maps"
                                    value="{{ $map['maps'] }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Categori') }}</label>
                            <div class="col-md-6">
                                <select id="role" class="form-control" name="categori">
                                    <option value="{{$categories_id['id']}}">{{$categories_id['name']}}</option>
                                    @forelse($categories as $categorie)
                                    <option value="{{$categorie['id']}}">{{$categorie['name']}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
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