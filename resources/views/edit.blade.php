@extends('layouts.layout')

@section('title', '編集')

@section('content')

<form action="" method="post" class="py-10 w-3/4 m-auto" enctype="multipart/form-data">
@csrf
    <div class="flex flex-col">
        <label for="icon" class="text-lg text-gray-600 pb-3">【アイコン】※すでに登録されている場合は上書きされます</label>
        <input type="file" name="icon" class="border border-black">
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

    <div class="text-center">
        <input type="submit" value="変更する" class="mt-10 rounded-lg bg-green-300 text-white px-6 py-2 cursor-pointer">

        <a class="block mt-5 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('index') }}">
            << 一覧へ戻る
        </a>
    </div>
</form>

@endsection