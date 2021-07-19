@extends('layouts.layout')

@section('title', 'ホーム')

@section('content')

<div class="py-8 pl-5">
<a href="{{route('add')}}"><i class="fas fa-plus-circle text-green-300 fa-3x"></i></a>
</div>

@if(count($coins) > 0)
<table class="table-fixed m-auto w-3/4">
  <tbody class="text-center">
    @foreach($coins as $coin)
    <tr>
      @if($coin->icon != null)
      <td class="border w-2/4 px-4 py-2"><img src="" alt=""></td>
      @else
      <td class="border w-2/4 px-4 py-2"><i class="fas fa-viacoin text-green-300"></i></td>
      @endif
      <td class="border w-3/4 px-4 py-2">{{$coin->name}}</td>
      <td class="border w-2/4 px-4 py-2">{{$coin->number}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<div class="py-10 text-center">
<p>データがありません。</p>
</div>
@endif

@endsection