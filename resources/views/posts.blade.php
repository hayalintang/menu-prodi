<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    @foreach ($posts as $post)
      <article class="py-4 max-w-screen-md">
        <div class="bg-gray-200 p-8 shadow-xl">
          <a href="/posts/{{ $post->slug }}" class="hover:underline">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900 drop-shadow-lg">{{ $post->title }}</h2>
          </a>
          <div>
            By
            <a href="/authors/{{ $post->author->username }}" class="hover:underline text-base text-gray-500">{{ $post->author->name }}</a>
            in
            <a href="/categories/{{ $post->category->slug }}" class="hover:underline text-base text-gray-500">{{ $post->category->name }}</a> | {{ $post->created_at->diffForHumans() }}
          </div>
          <p class="my-4 font-light text-justify">{{ Str::limit($post['body'], 150) }}</p>
          <a href="/posts/{{ $post->slug }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
        </div>
      </article>
    @endforeach
  </x-layout>