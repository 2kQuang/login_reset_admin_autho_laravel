@extends('main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('products.update',['id'=>$product['id']] )}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right ">{{ __('Old_Image') }}</label>
                            <div class="col-md-4 col-form-label text-md-right border">
                                <img src="{{asset($product['image'])}}" height="150px" width="150px" alt="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('New_Image') }}</label>
                            <div class="col-md-6">
                                <input id="avatar" type="file" name="image" accept="image/*"
                                    value="{{ $product['avatar'] }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $product['name_product'] }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="price" value="{{ $product['price'] }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="content" value="{{ $product['content'] }}" required>
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

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <select id="role" class="form-control" name="address">
                                    <option value="{{$map_id['id']}}">{{$map_id['name']}}</option>
                                    @forelse($maps as $map)
                                    <option value="{{$map['id']}}">{{$map['name']}}</option>
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