@extends('layouts.layout')

@section('title', '追加')

@section('content')

<form action="" method="post" class="py-10 w-3/4 m-auto" enctype="multipart/form-data">
@csrf
    <h2 class="mb-6 p-2 rounded-full text-lg text-center" style="background-color:#dec02c; color:white;">仮想通貨種類を追加</h2>
    <div class="flex flex-col">
        <label for="icon" class="text-lg text-gray-600 pb-3">【アイコン】</label>
        <input type="file" name="icon">
    </div>
    <div class="flex flex-col mt-8">
        <label for="name" class="text-lg text-gray-600 pb-3">【名前】</label>
        <input type="text" name="name" value="{{old('name')}}">
    </div>

    @foreach($errors->all() as $error)
    <p class="error">*{{$error}}</p>
    @endforeach

    <div class="text-center">
        <input type="submit" value="追加する" class="mt-10 rounded-lg bg-green-300 text-white px-6 py-2 cursor-pointer">

        <a class="block mt-8 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('index') }}">
            << 一覧へ戻る
        </a>
    </div>
</form>

@endsection