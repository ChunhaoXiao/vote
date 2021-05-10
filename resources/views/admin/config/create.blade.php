@extends('admin.layout')

@section('content')
	<form method="post" action="{{route('admin.config.store')}}">
		<div class="form-group">
			<label>开启审核状态</label>
			<div>
				开启<input type="radio" name="is_examine" value="1" @if($data->is_examine == 1) checked @endif>
				关闭<input type="radio" name="is_examine" value="0" @if($data->is_examine == 0) checked @endif>
			</div>
		</div>
		@csrf
		<div class="form-group">
			<button class="btn btn-primary">确定</button>
		</div>
	</form>
@endsection