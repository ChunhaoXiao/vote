@extends('admin.layout')

@section('content')
    <div class="container">
        <p><a class="btn btn-info" href="{{ route('admin.activity.create') }}">添加活动</a></p>

        <table class="table table-bordered">
            <thead>
                <th>活动标题</th>
                <th>开始时间</th>
                <th>结束时间</th>
                <th>图标</th>
            </thead>
            <tbody>
                @foreach($datas as $v)
                    <tr>
                        <td>{{$v->title}}</td>
                        <td>{{ $v->start_date }}</td>
                        <td>{{ $v->end_date }}</td>
                        <td><img src="{{asset('storage/'.$v->icon)}}" alt="" width="50" height="50"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection