@extends('layouts.app')
@section('title', trans('Posts'))

@section('content')
  <div class="section">
    <div class="container">
      {{-- Section title --}}
      <div class="content">
        <h2>
          My Posts
        </h2>

        {{-- Options --}}
        <div class="buttons">
          <a href="{{ route('posts.create') }}" class="button is-primary">
            <span class="icon"><i class="fa fa-plus"></i></span>
            <span class="text-sm font-bold">
              Add
            </span>
          </a>
          <a href="" class="button is-danger">
            <span class="icon"><i class="fa fa-download"></i></span>
            <span class="text-sm font-bold">
              Import
            </span>
          </a>
        </div>
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
