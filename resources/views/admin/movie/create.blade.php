@extends("admin.layout")

@section("content_header")
    添加视频
@stop
@section("content")
    <form action="{{route('admin.movie.store')}}" method="post">
        <div class="form-group">
            <label for="">标题</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
            <label for="">作者</label>
            <input type="text" class="form-control" name="author">
        </div>
        <div class="form-group">
            <label for="">描述</label>
            <textarea  class="form-control" name="description" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="">上传视频</label>
            <div>
                <x-upload name="path"/>
            </div>
        </div>
        @csrf
        <div class="form-group">
            <button class="btn btn-primary">提交</button>
        </div>
    </form>
@endsection