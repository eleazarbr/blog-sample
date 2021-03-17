<div class="column is-one-third-desktop is-half-tablet">
  <div class="box content h-full">
    <h3 class="title is-5">
      {{ $post->title }}
    </h3>
    <p class="subtitle is-7">
      Published at
      {{ $post->published_at->toFormattedDateString() }}
      by
      {{ $post->user['name'] }}
    </p>
    <p class="text-base">
      {{ $post->description }}
    </p>
  </div>
</div>
