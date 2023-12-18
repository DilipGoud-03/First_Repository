@extends('user.layouts')

@section('content')
<div class="row justify-content-center mt-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @for($i=0;$i<count($users);$i++) <tr>
                <td>{{$users[$i]->id}}</td>
                <td>{{$users[$i]->name}}</td>
                <td>{{$users[$i]->email}}</td>
                </tr>
                @endfor
        </tbody>
    </table>
</div>
@endsection