@extends('layouts.layout')

@section('title', 'ホーム')

@section('content')

<style>
  * {
    word-break: break-all;
  }

  td {
    padding: 0;
    height: 0;
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
  <a href="{{route('add')}}"><i class="fas fa-plus-circle text-green-300 fa-3x"></i></a>
</div>

<div class="flex pb-5">
<div>@sortablelink('name', 'アルファベット順')</div>
    <div>@sortablelink('updated_at', '更新順')</div>
</div>

@if(count($coins) > 0)
<table class="table-fixed m-auto w-11/12">
  <tbody class="text-center">
    <tr class="bg-gray-300">
      <th class="py-2 border border-black w-little">Icon</th>
      <th class="py-2 border border-black">Name</th>
      <th class="py-2 border border-black">Number</th>
      <th class="py-2 border border-black">Updated</th>
    </tr>
    @foreach($coins as $key => $coin)
    @if($key % 2)
    <tr>
      @if($coin->icon != null)
      <td class="bg-gray-100 border border-black w-little"><a class="td-link logo" href="{{route('edit', ['id' => $coin->id])}}"><img src="{{secure_asset('storage/images/' . $coin->icon)}}" alt="{{$coin->name}}ロゴ" style="height:30px;"></a></td>
      @else
      <td class="bg-gray-100 border border-black w-little"><a class="td-link logo" href="{{route('edit', ['id' => $coin->id])}}"><i class="fab fa-viacoin text-green-300 fa-2x"></i></a></td>
      @endif
      <td class="bg-gray-100 border border-black"><a class="td-link" href="{{route('edit', ['id' => $coin->id])}}">{{$coin->name}}</a></td>
      <td class="bg-gray-100 border border-black"><a class="td-link" href="{{route('edit', ['id' => $coin->id])}}">{{$coin->number}}</a></td>
      <td class="bg-gray-100 border border-black"><a class="td-link text-xs" href="{{route('edit', ['id' => $coin->id])}}">{{$coin->updated_at}}</a></td>
    </tr>
    @else
    <tr>
      @if($coin->icon != null)
      <td class="border border-black w-little"><a class="td-link logo" href="{{route('edit', ['id' => $coin->id])}}"><img src="{{secure_asset('storage/images/' . $coin->icon)}}" alt="{{$coin->name}}ロゴ" style="height:30px"></a></td>
      @else
      <td class="border border-black w-little"><a class="td-link logo" href="{{route('edit', ['id' => $coin->id])}}"><i class="fab fa-viacoin text-green-300 fa-2x"></i></a></td>
      @endif
      <td class="border border-black"><a class="td-link" href="{{route('edit', ['id' => $coin->id])}}">{{$coin->name}}</a></td>
      <td class="border border-black"><a class="td-link" href="{{route('edit', ['id' => $coin->id])}}">{{$coin->number}}</a></td>
      <td class="border border-black"><a class="td-link text-xs" href="{{route('edit', ['id' => $coin->id])}}">{{$coin->updated_at}}</a></td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>

<div class="py-10">
  {{$coins->appends(request()->query())->links('pagination::default')}}
</div>
@else
<div class="py-10 text-center">
  <p>データがありません。</p>
</div>
@endif

@endsection