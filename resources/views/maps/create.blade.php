@extends('main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new employee') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('maps.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" autocomplete="name" autofocus required>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address') }}" autocomplete="address" autofocus required>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="area"
                                class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                                <input id="area" type="text"
                                    class="form-control @error('area') is-invalid @enderror" name="area"
                                    value="{{ old('area') }}" autocomplete="area" autofocus required>

                                @error('area')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone"
                                class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" autocomplete="phone" required>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="open"
                                class="col-md-4 col-form-label text-md-right">{{ __('Time Open') }}</label>

                            <div class="col-md-6">
                                <input id="open" type="time"
                                    class="form-control @error('open') is-invalid @enderror" name="open"
                                    autocomplete="new-open" required>

                                @error('open')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="close"
                                class="col-md-4 col-form-label text-md-right">{{ __('Time Close') }}</label>

                            <div class="col-md-6">
                                <input id="close" type="time"
                                    class="form-control @error('close') is-invalid @enderror" name="close"
                                    autocomplete="new-close" required>

                                @error('close')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="maps"
                                class="col-md-4 col-form-label text-md-right">{{ __('Maps') }}</label>

                            <div class="col-md-6">
                                <input id="maps" type="text"
                                    class="form-control @error('maps') is-invalid @enderror" name="maps"
                                    autocomplete="new-maps" required>

                                @error('maps')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Categories') }}</label>
                            <div class="col-md-6">
                                <select id="role" class="form-control" name="categori">
                                    <option value="">- - Choose categories - -</option>
                                    @forelse($categories as $categorie)
                                    <option value="{{$categorie['id']}}">{{$categorie['name']}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('categories')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" accept="image/*" name="image" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="role" value="{{auth()->user()->id}}">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
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