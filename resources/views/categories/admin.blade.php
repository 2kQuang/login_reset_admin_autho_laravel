@extends('main')
@section('content')
<ul class="list-unstyled CTAs">
    <li>
        <form action="{{route('categories.create')}}" method="get">
            @csrf
            <button type="submit" class="btn btn-outline-success">Add Category</button>
        </form>
    </li>
</ul>
<table class="table table-bordered text-center" style="margin-top:20px;">
    <thead>
        <tr class="bg-dark text-light">
            <th scope="col">Name</th>
            <th scope="col">Setting</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $category)

        <tr>
            <td>{{$category['name']}}</td>
            <td>
                <a href="{{route('categories.edit',['id'=>$category['id']])}}" class="btn btn-success">Update</a>
                <a href="{{route('categories.delete',['id'=>$category['id']])}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">
                <ul class="list-unstyled CTAs">
                    <li>
                        <form action="{{route('categories.create')}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-outline-success">Add Category</button>
                        </form>
                    </li>
                </ul>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection