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
  <x-jet-dropdown align="false" width="48">
    <x-slot name="trigger">
    <i class="fas fa-plus-circle text-green-300 fa-3x"></i>
    </x-slot>

    <x-slot name="content">
      <div class="block px-4 py-2 text-xs text-gray-400">
        追加
      </div>

      <x-jet-dropdown-link href="{{route('add')}}">
        Owned List
      </x-jet-dropdown-link>

      <div class="border-t border-gray-100"></div>

      <x-jet-dropdown-link href="{{ route('add.VC') }}">
        Virtual Currency
      </x-jet-dropdown-link>
    </x-slot>
  </x-jet-dropdown>
</div>

@if(count($coins) > 0)
<table class="table-fixed m-auto w-11/12">
  <tbody class="text-center">
    <tr>
      <th class="py-2 w-little"></th>
      <th class="py-2">@sortablelink('name', 'Name')</th>
      <th class="py-2">@sortablelink('number', 'Number')</th>
      <th class="py-2">@sortablelink('updated_at', 'Updated')</th>
    </tr>
    @foreach($coins as $key => $coin)
    @if($key % 2)
    <tr>
      @if($coin->icon != null)
      <td class="bg-gray-100 w-little"><a class="td-link logo" href="{{route('edit', ['id' => $coin->id])}}"><img src="{{asset('storage/images/' . $coin->icon)}}" alt="{{$coin->name}}ロゴ" style="height:30px;"></a></td>
      @else
      <td class="bg-gray-100 w-little"><a class="td-link logo" href="{{route('edit', ['id' => $coin->id])}}"><i class="fab fa-viacoin text-green-300 fa-2x"></i></a></td>
      @endif
      <td class="bg-gray-100"><a class="td-link" href="{{route('edit', ['id' => $coin->id])}}">{{$coin->name}}</a></td>
      <td class="bg-gray-100"><a class="td-link" href="{{route('edit', ['id' => $coin->id])}}">{{floatval($coin->number)}}</a></td>
      <td class="bg-gray-100"><a class="td-link text-xs" href="{{route('edit', ['id' => $coin->id])}}">{{$coin->updated_at}}</a></td>
    </tr>
    @else
    <tr>
      @if($coin->icon != null)
      <td class=" w-little"><a class="td-link logo" href="{{route('edit', ['id' => $coin->id])}}"><img src="{{asset('storage/images/' . $coin->icon)}}" alt="{{$coin->name}}ロゴ" style="height:30px"></a></td>
      @else
      <td class=" w-little"><a class="td-link logo" href="{{route('edit', ['id' => $coin->id])}}"><i class="fab fa-viacoin text-green-300 fa-2x"></i></a></td>
      @endif
      <td><a class="td-link" href="{{route('edit', ['id' => $coin->id])}}">{{$coin->name}}</a></td>
      <td><a class="td-link" href="{{route('edit', ['id' => $coin->id])}}">{{floatval($coin->number)}}</a></td>
      <td><a class="td-link text-xs" href="{{route('edit', ['id' => $coin->id])}}">{{$coin->updated_at}}</a></td>
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