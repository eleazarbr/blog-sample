@extends('layouts.app')
@section('title', trans('Welcome'))

@section('content')
  <div class="section">
    <div class="container">
      @if ($posts->count())
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

        {{-- Pagination --}}
        <div class="flex justify-center">
          {{ $posts->links('partials.pagination') }}
        </div>
      @else
        <div class="columns">
          <div class="column is-6-desktop">
            <div class="notification is-primary is-light">
              There are no posts.
              <a class="font-bold" href="{{ route('register') }}">
                Register
              </a>
              or
              <a class="font-bold" href="{{ route('login') }}">
                log in
              </a>
              to create a new post
            </div>
          </div>
        </div>
      @endif

    </div>
  </div>
@endsection
