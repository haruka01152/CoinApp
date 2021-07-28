@extends('layouts.layout')

@section('title', '仮想通貨削除')

@section('content')

<form action="" method="post" class="py-10 w-3/4 m-auto" enctype="multipart/form-data">
    @csrf

    @if($type->icon != null)
    <div class="flex flex-col">
        <label for="icon" class="text-lg text-gray-600 pb-3">【アイコン】</label>

        <div class="py-5">
            <img src="{{asset('storage/images/' . $type->icon)}}" alt="{{$type->name}}ロゴ" style="height:60px; width:60px; margin:0 auto;">
        </div>
    </div>
    @endif

    <div class="flex flex-col mt-8">
        <label for="name" class="text-lg text-gray-600 pb-3">【名前】</label>
        <input type="text" name="name" value="{{$type->name}}" readonly>
    </div>

    <div class="text-center">
        <p class="pt-8">上記のデータを削除してよろしいですか？</p>

        <input type="submit" value="削除" class="mt-10 rounded-lg bg-red-600 text-white px-6 py-2 cursor-pointer">

        <a class="block mt-10 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('edit.VC', ['id' => $type->id]) }}">
            << 戻る </a>
    </div>
</form>

@endsection