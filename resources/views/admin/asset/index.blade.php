@extends('admin.layout')

@section("content")
    <p><a class="btn btn-info text-white" href="{{route('admin.asset.create')}}">添加</a></p>
    <table class="table table-bordered">
        <thead>
            <th>标识</th>
            <th>描述</th>
            <th>图片</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($datas as $v)
                <tr>
                    <td>{{ $v->mark }}</td>
                    <td>{{ $v->description }}</td>
                    <td><img style="width: 50px; height:50px" src="{{ asset('storage/'.$v->path) }}"/></td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop