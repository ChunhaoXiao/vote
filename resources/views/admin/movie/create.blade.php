@extends("admin.layout")

@section("content_header")
    添加视频
@stop
@section("content")
    <form action="{{isset($data) ? route('admin.movie.update', $data) : route('admin.movie.store')}}" method="post">
    <div class="form-group">
            <label for="">所属活动</label>
            <select name="activity_id" id="" class="form-control">
                @foreach($activities as $v)
                <option @if(isset($data) && $data->activity_id == $v->id) selected @endif value="{{$v->id}}">{{$v->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">标题</label>
            <input type="text" class="form-control" name="title" value="{{$data->title??''}}">
        </div>
        <div class="form-group">
            <label for="">伪造标题</label>
            <input type="text" class="form-control" name="fake_title" value="{{$data->fake_title??''}}">
        </div>

        <div class="form-group">
            <label for="">作者</label>
            <input type="text" class="form-control" name="author" value="{{$data->author??''}}">
        </div>
        <div class="form-group">
            <label for="">描述</label>
            <textarea  class="form-control" name="description" rows="5">{{$data->description??''}}</textarea>
        </div>

        <div class="form-group">
            <label for="">上传视频</label>
            <div>
                <x-upload name="path" id="file"/>
            </div>
        </div>
        <div class="form-group">
            <label for="">图片(蒙骗小程序审核)</label>
            <div>
            <x-upload name="pictures" id="picture" multiple="1"/>
            </div>
        </div>
        @isset($data)
            @foreach($data->pictures as $v)
                <img width="100" height="100" src="{{asset('storage/'.$v)}}" alt="">
            @endforeach
            @method("PUT")
        @endisset
        
        @csrf
        <div class="form-group">
            <button class="btn btn-primary">提交</button>
        </div>
    </form>
@endsection