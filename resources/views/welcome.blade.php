@extends('layouts.app')
@section('title', trans('Welcome'))

@section('content')
  <div class="section">
    <div class="container">
      {{-- Section title --}}
      <div class="flex justify-between items-center content">
        <h2>
          Posts
        </h2>

        {{-- Allow sort posts by published_at date --}}
        <div class="select">
          <select id="order">
            <option {{ $order === 'desc' ? 'selected' : '' }} value="desc">Most recent</option>
            <option {{ $order === 'asc' ? 'selected' : '' }} value="asc">Old</option>
          </select>
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

@push('scripts')
  <script>
    document.getElementById('order').addEventListener('change', function() {
      window.location.href = route('web.index', {
        order: this.value
      });
    });

  </script>
@endpush
