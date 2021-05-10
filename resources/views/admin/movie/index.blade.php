@extends('admin.layout')
@section('content')
    <div>
        <a href="{{route('admin.movie.create')}}">添加</a>

        <div>
        	<table class="table table-bordered">
        		
        		<thead>
        			<th>标题</th>
        			<th>所属活动</th>
        			<th>发布时间</th>
        			<th> 缩略图</th>
        			<th></th>
        		</thead>
        		<tbody>
        			@foreach($datas as $v)

        				<tr>
        					
        					<td>{{$v->title}}</td>
        					<td>{{$v->activity->title}}</td>
        					<td>{{$v->created_at}}</td>
        					<td><img src="{{asset('storage/'.$v->thumb)}}" style="width:50px;height:50px"></td>
        					<td><a href="javascript:;" class="far fa-trash-alt" data-url="{{route('admin.movie.destroy', $v)}}"></a></td>
        				</tr>
        			@endforeach
        		</tbody>
        	</table>
        </div>
    </div>
@endsection

@section('js')

@parent
<script>

	$(function(){
		$(".fa-trash-alt").on('click', function(){
			const url = $(this).data('url')

			Swal.fire({
			  title: '确定删除?',
			  text: "确定删除吗?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: '确定',
			  cancelButtonText:'取消'
			}).then((result) => {
				console.log(result.value);
			  if (result.value) {
			  		$.ajax({
			  			url:url,
			  			type:'delete',
			  			success:res => {
			  				console.log(res);
			  				location.reload();
			  			}
			  		})
			  }
			})
			//alert('dellete');
		})
	})
	
</script>

@endsection