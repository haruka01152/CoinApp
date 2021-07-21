@extends('layouts.layout')

@section('title', '編集')

@section('content')

<form action="" method="post" class="py-10 w-3/4 m-auto" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col">
        <label for="icon" class="text-lg text-gray-600 pb-3">【アイコン】<br><span class="text-sm">※すでに登録されている場合は上書きされます</span></label>

        @if($coin->icon != null)
        <div class="py-5">
            <img src="{{asset('storage/images/' . $coin->icon)}}" alt="{{$coin->name}}ロゴ" style="height:60px; width:60px; margin:0 auto;">
        </div>
        @endif

        <input type="file" name="icon" class="border">

        @if($coin->icon != null)
        <div class="flex items-center pt-5">
            <input type="checkbox" name="deleteIcon" id="deleteIcon" value="true">
            <label for="deleteIcon" class="pl-3">アイコンを削除する</label>
        </div>
        @endif
    </div>
    <div class="flex flex-col mt-8">
        <label for="name" class="text-lg text-gray-600 pb-3">【名前】</label>
        <input type="text" name="name" value="{{$coin->name}}">
    </div>
    <div class="flex flex-col mt-8">
        <label for="number" class="text-lg text-gray-600 pb-3">【保有数】</label>
        <input type="number" name="number" value="{{$coin->number}}">
    </div>

    @foreach($errors->all() as $error)
    <p class="error">*{{$error}}</p>
    @endforeach

    <div class="mt-10 text-center">
        <input type="submit" value="変更" class="rounded-lg bg-green-300 text-white px-6 py-2 cursor-pointer mr-5">
        <a href="{{route('delete', ['id' => $coin->id])}}" class="rounded-lg bg-gray-500 text-white px-6 py-2 cursor-pointer inline-block">削除</a>

        <a class="block mt-10 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('index') }}">
            << 一覧へ戻る </a>
    </div>
</form>

@endsection