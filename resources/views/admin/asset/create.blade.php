@extends('admin.layout')

@section("content_header")
    添加资源
@stop
@section("content")
    <div class="container">
        <form action="{{route('admin.asset.store')}}" method="post">
            <div class="form-group">
                <label for="">标记</label>
                <input type="text" class="form-control" name="mark">
            </div>
            <div class="form-group">
                <label for="">描述</label>
                <input type="text" class="form-control" name="description">
            </div>
            <div class="form-group">
                <label for="">文件上传</label>
                <div>
                    <x-upload name="path"/>
                </div>
            </div>
            @csrf
            <div class="form-group">
                <button class="btn btn-primary">提交</button>
            </div>
        </form>
    </div>
@endsection