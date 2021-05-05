@extends('admin.layout')

@section('content')
    <div class="container">
        <form action="{{ route('admin.activity.store') }}" method="post">
            <div class="form-group">
                <label for="" class="col-form-label">
                    标题
                </label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="" class="col-form-label">
                    活动开始日期
                </label>
                <input type="date" class="form-control" name="start_date">
            </div>
            <div class="form-group">
                <label for="" class="col-form-label">
                    活动截止日期
                </label>
                <input type="date" class="form-control" name="end_date">
            </div>
            <div class="form-group">
                <label for="" class="col-form-label">
                    活动说明
                </label>
                <textarea name="description" id="" cols="30" rows="6" class="form-control"></textarea>
            </div>
            <div class="form-group">
            <label for="">活动图标</label>
            <div>
                <x-upload name="icon"/>
            </div>
            @csrf
            <div class="form-group py-1">
                <button class="btn btn-primary">提交</button>
            </div>
        </div>
        </form>
    </div>
@stop