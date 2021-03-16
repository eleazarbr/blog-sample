@extends('layouts.app')
@section('title', trans('Welcome'))

@section('content')
  <div class="section">
    <div class="container">
      {{-- Section title --}}
      <div class="flex justify-between items-center mb-5">
        <h2 class="text-3xl font-bold">
          Posts
        </h2>

        {{-- Allow sort posts by published_at date --}}
        <form id="sort-form" method="GET" action="{{ route('web.index') }}">
          <div class="select">
            <select name="order" onchange="document.getElementById('sort-form').submit()">
              <option {{ $order === 'desc' ? 'selected' : '' }} value="desc">Latest</option>
              <option {{ $order === 'asc' ? 'selected' : '' }} value="asc">Oldest</option>
            </select>
          </div>
        </form>
      </div>

      {{-- Posts --}}
      <div class="columns is-multiline">
        @foreach ($posts as $post)
          @include('posts.partials.post', ['post' => $post])
        @endforeach
      </div>
    </div>
  </div>
@endsection
