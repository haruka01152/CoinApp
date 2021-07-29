@extends('layouts.layout')

@section('title', '仮想通貨種類一覧')

@section('content')

<style>
  * {
    word-break: break-all;
  }

  td {
    padding: 0;
    height: 0;
  }

  tr {
    border-top: .5px solid gray;
    border-bottom: .5px solid gray;
  }

  .td-link {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    padding: .5rem 1rem;
  }

  .logo {
    padding: .5rem .3rem;
  }
</style>

<div class="py-8 pl-5 flex items-center justify-start">
  <a href="{{route('index')}}"><i class="fas fa-exchange-alt text-green-300 fa-2x" style="transform: scaleX(-1);"></i></a>

  <a href="{{route('add.VC')}}" style="margin-left:2.5rem;"><i class="fas fa-plus-circle text-green-300" style="font-size:35px;"></i></a>
</div>

<a href="{{route('VC')}}" class="inline-block text-lg text-gray-600 ml-5 mb-4"><i class="fas fa-coins"></i>　Virtual Coin List</a>

@if(count($types) > 0)
<table class="table-fixed m-auto w-11/12">
  <tbody class="text-center">
    <tr>
      <th class="py-2 w-little"></th>
      <th class="py-2">@sortablelink('name', 'Name')</th>
    </tr>
    @foreach($types as $key => $type)
    @if($key % 2)
    <tr>
      @if($type->icon != null)
      <td class="bg-gray-100 w-little"><a class="td-link logo" href="{{route('edit.VC', ['id' => $type->id])}}"><img src="{{asset('storage/images/' . $type->icon)}}" alt="{{$type->name}}ロゴ" style="height:30px;"></a></td>
      @else
      <td class="bg-gray-100 w-little"><a class="td-link logo" href="{{route('edit.VC', ['id' => $type->id])}}"><i class="fab fa-viatype text-green-300 fa-2x"></i></a></td>
      @endif
      <td class="bg-gray-100"><a class="td-link" href="{{route('edit.VC', ['id' => $type->id])}}">{{$type->name}}</a></td>
    </tr>
    @else
    <tr>
      @if($type->icon != null)
      <td class=" w-little"><a class="td-link logo" href="{{route('edit.VC', ['id' => $type->id])}}"><img src="{{asset('storage/images/' . $type->icon)}}" alt="{{$type->name}}ロゴ" style="height:30px"></a></td>
      @else
      <td class=" w-little"><a class="td-link logo" href="{{route('edit.VC', ['id' => $type->id])}}"><i class="fab fa-viatype text-green-300 fa-2x"></i></a></td>
      @endif
      <td><a class="td-link" href="{{route('edit.VC', ['id' => $type->id])}}">{{$type->name}}</a></td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>

<div class="py-10">
  {{$types->appends(request()->query())->links('pagination::default')}}
</div>
@else
<div class="py-10 text-center">
  <p>データがありません。</p>
</div>
@endif

@endsection