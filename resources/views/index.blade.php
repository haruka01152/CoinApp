@extends('layouts.layout')

@section('title', 'ホーム')

@section('content')

<div class="py-8 pl-5">
<a href="{{route('add')}}"><i class="fas fa-plus-circle text-green-300 fa-3x"></i></a>
</div>

@if(count($coins) > 0)
<table class="table-fixed m-auto w-11/12">
  <tbody class="text-center">
    @foreach($coins as $key => $coin)
    @if($key % 2)
    <tr>
      @if($coin->icon != null)
      <td class="bg-gray-100 border w-2/4 px-4 py-2"><img src="{{asset('storage/images/' . $coin->icon)}}" alt="{{$coin->name}}ロゴ" style="height:30px"></td>
      @else
      <td class="bg-gray-100 border w-2/4 px-4 py-2"><i class="fab fa-viacoin text-green-300 fa-2x"></i></td>
      @endif
      <td class="bg-gray-100 border w-3/4 px-4 py-2">{{$coin->name}}</td>
      <td class="bg-gray-100 border w-2/4 px-4 py-2">{{$coin->number}}</td>
    </tr>
    @else
    <tr>
      @if($coin->icon != null)
      <td class="border w-2/4 px-4 py-2"><img src="{{asset('storage/images/' . $coin->icon)}}" alt="{{$coin->name}}ロゴ" style="height:30px"></td>
      @else
      <td class="border w-2/4 px-4 py-2"><i class="fab fa-viacoin text-green-300 fa-2x"></i></td>
      @endif
      <td class="border w-3/4 px-4 py-2">{{$coin->name}}</td>
      <td class="border w-2/4 px-4 py-2">{{$coin->number}}</td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>
@else
<div class="py-10 text-center">
<p>データがありません。</p>
</div>
@endif

@endsection