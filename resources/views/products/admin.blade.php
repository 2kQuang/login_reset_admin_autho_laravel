@extends('main')
@section('content')
<ul class="list-unstyled CTAs">
    <li>
        <form action="{{route('products.create')}}" method="get">
            @csrf
            <button type="submit" class="btn btn-outline-success">Add Product</button>
        </form>
    </li>
</ul>
<table class="table table-bordered text-center" style="margin-top:20px;">
    <thead>
        <tr class="bg-dark text-light">
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Content</th>
            <th scope="col">Setting</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td><img src="{{$product['image']}}" height="40px" width="40px"></td>
            <td>{{$product['name_product']}}</td>
            <td><?php echo number_format($product['price']).' VND'?></td>
            <td><?php echo substr($product['content'],0,25).' ...'?></td>
            <td>
                <a href="{{route('products.edit',['id'=>$product['id'],'id_categori'=>$product['id_categori'],'id_address'=>$product['id_address']])}}" class="btn btn-success">Update</a>
                <a href="{{route('products.delete',['id'=>$product['id']])}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">
                <ul class="list-unstyled CTAs">
                    <li>
                        <form action="{{route('products.create')}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-outline-success">Add Product</button>
                        </form>
                    </li>
                </ul>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection