@extends('main')
@section('content')
<ul class="list-unstyled CTAs">
    <li>
        <form action="{{route('maps.create')}}" method="get">
            @csrf
            <button type="submit" class="btn btn-outline-success">Add place</button>
        </form>
    </li>
</ul>
<table class="table table-bordered text-center" style="margin-top:20px;">
    <thead>
        <tr class="bg-dark text-light">
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Area</th>
            <th scope="col">Phone</th>
            <th scope="col">Time Open</th>
            <th scope="col">Time Close</th>
            <th scope="col">Setting</th>
        </tr>
    </thead>
    <tbody>
        @forelse($maps as $map)

        <tr>
            <td><img src="{{$map['image']}}" height="40px" width="40px"></td>
            <td>{{$map['name']}}</td>
            <td>{{$map['address']}}</td>
            <td>{{$map['area']}}</td>
            <td>{{$map['phone']}}</td>
            <td>{{$map['open']}}</td>
            <td>{{$map['close']}}</td>
            <td>
                <a href="{{route('maps.edit',['id'=>$map['id'],'id_categori'=>$map['id_categori']])}}" class="btn btn-success">Update</a>
                <a href="{{route('maps.delete',['id'=>$map['id']])}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9">
                <ul class="list-unstyled CTAs">
                    <li>
                        <form action="{{route('maps.create')}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-outline-success">Add place</button>
                        </form>
                    </li>
                </ul>
            </td>
        </tr>

        @endforelse
    </tbody>
</table>
@endsection