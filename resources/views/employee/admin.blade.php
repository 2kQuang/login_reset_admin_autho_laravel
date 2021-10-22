@extends('main')
@section('content')
<ul class="list-unstyled CTAs">
@if(auth()->user()->role_id == '1')
    <li>
        <form action="{{route('employee.create')}}" method="get">
            @csrf
            <button type="submit" class="btn btn-outline-success">Add Employee</button>
        </form>
    </li>
    @endif
</ul>
<table class="table table-bordered text-center" style="margin-top:20px;">
    <thead>
        <tr class="bg-dark text-light">
            <th scope="col">Avatar</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Setting</th>
        </tr>
    </thead>
    <tbody>
        @forelse($employees as $employee)

        <tr>
            <td><img src="{{$employee['avatar']}}" height="40px" width="40px"></td>
            <td>{{$employee['name']}}</td>
            <td>{{$employee['phone']}}</td>
            <td>{{$employee['address']}}</td>
            <td>{{$employee['email']}}</td>
            @if(auth()->user()->role_id == '1')
            @if($employee['role_id'] != '1')
            <td>
                <a href="{{route('employee.edit',['id'=>$employee['id'],'role_id'=>$employee['role_id']])}}" class="btn btn-success">Update</a>
                <a href="{{route('employee.delete',['id'=>$employee['id']])}}" class="btn btn-danger">Delete</a>
            </td>
            @endif
            @endif
        </tr>
        @empty
        <tr>
            <td>
                <ul class="list-unstyled CTAs">
                    <li>
                        <form action="{{route('employee.create')}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-outline-success">Add Employee</button>
                        </form>
                    </li>
                </ul>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection