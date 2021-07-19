@extends('layouts.layout')

@section('title', 'ホーム')

@section('content')

<div class="py-8 pl-5">
<a href=""><i class="fas fa-plus-circle text-green-300 fa-3x"></i></a>
</div>

<table class="table-fixed m-auto">
  <tbody class="text-center">
    <tr>
      <td class="border px-4 py-2"><i class="fas fa-adjust fa-2x"></i></td>
      <td class="border w-3/4 px-4 py-2">Coin</td>
      <td class="border w-2/4 px-4 py-2">300</td>
    </tr>
    <tr>
      <td class="border px-4 py-2"><i class="fas fa-adjust fa-2x"></i></td>
      <td class="border px-4 py-2">Coin</td>
      <td class="border px-4 py-2">300</td>
    </tr>
    <tr>
      <td class="border px-4 py-2"><i class="fas fa-adjust fa-2x"></i></td>
      <td class="border px-4 py-2">Coin</td>
      <td class="border px-4 py-2">300</td>
    </tr>
  </tbody>
</table>
@endsection