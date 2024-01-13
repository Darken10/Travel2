@props(['post','admin'=>false,'show'=>false])


    <div class="grid grid-cols-1 gap-6 my-6 px-4 md:px-6 lg:px-8">
@if ($post->images != null)

<div class="max-w-xl mx-auto px-4 py-4 bg-white shadow-md rounded-lg">
  <div class="py-2 flex flex-row items-center justify-between">
    <div class="flex flex-row items-center">
      <a href="#" class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg">
        <img class="rounded-full h-8 w-8 object-cover" src="{{ asset('image/image.jpg') }}"alt="">
        <p class="ml-2 text-base font-bold">{{ $post->user->name }}</p>
      </a>
    </div>
    <div class="flex flex-row items-center">
      <p class="text-xs font-semibold text-gray-500">{{ $post->updated_at->format('D d M Y; H:i:s ') }}</p>
    </div>
  </div>
  <div class="mt-2">
    <img class="object-cover w-full rounded-lg" src="{{ asset('image/image.jpg') }}" alt="image">
    <div class="py-2 flex flex-row items-center">
      <a href="{{ route('post.storeLikePost',$post) }}" class="no-underline">
        <button class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg">
          <x-like.logo-love :model="$post" />
        </button>
      </a>
      <a class="text-gray-900" style="text-decoration: none" href="{{ route($admin ? 'admin.comment.index' : 'post.show',$post) }}">
        <button class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg ml-3">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
          <span class="ml-1">{{ $post->countComments() }}</span>
        </button>
      </a>
      <button class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg ml-3">
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5"><path d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
        <span class="ml-1">340</span>
      </button>
    </div>
  </div>
  <div class="py-2">
    <div class=" inline" >
      @foreach ($post->tags as $tag)
          <a href="{{ route('post.filterByTag',$tag) }}">
            <span class=" text-gray-100 bg-purple-800 text-xs m-1 rounded-lg px-2 font-medium text-center capitalize">
              {{ $tag->name }}
            </span>
          </a>
      @endforeach
    </div>
    <a href="{{  route($admin ? 'admin.comment.index' : 'post.show',$post) }}" class=" no-underline ">
      <div class="py-2 text-2xl font-semibold">
        {{ $show ? $post->title : $post->titleExtrait() }}
      </div>
    </a>
    
    <p class="leading-snug">
      {!! $show ? nl2br(e($post->content())) : nl2br(e($post->contentExtrait())) !!}
    </p>
  </div>
</div>


@else

<div class="max-w-xl mx-auto px-4 py-4 bg-white shadow-md rounded-lg">
  <div class="py-2 flex flex-row items-center justify-between">
    <div class="flex flex-row items-center">
      <a href="#" class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg">
        <img class="rounded-full h-8 w-8 object-cover" src="{{ asset('image/image.jpg') }}" alt="">
        <p class="ml-2 text-base font-bold">{{ $post->user->name }}</p>
      </a>
    </div>
    <div class="flex flex-row items-center">
      <p class="text-xs font-semibold text-gray-500">{{ $post->updated_at->format('D d M Y; H:i:s ') }}</p>
    </div>
  </div>
  <div class="py-2">
    <div class=" inline" >
      @foreach ($post->tags as $tag)
          <span class=" text-gray-100 bg-purple-800 text-xs m-1 rounded-lg px-2 font-medium text-center capitalize">
            {{ $tag->name }}
          </span>
      @endforeach
    </div>
    <a href="{{  route($admin ? 'admin.comment.index' : 'post.show',$post) }}" class=" no-underline ">
      <div class="py-2 text-2xl font-semibold">
        {{ $post->titleExtrait() }}
      </div>
    </a>
    
    <p class="leading-snug">
      {{ $post->contentExtrait() }}
    </p>
  </div>
  <div>
    <div class="py-2 flex flex-row items-center">
      <button class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg">
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
        <span class="ml-1">3431</span>
      </button>
      <a class="text-gray-900" style="text-decoration: none" href="{{ route($admin ? 'admin.comment.index' : 'post.show',$post) }}">
        <button class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg ml-3">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
          <span class="ml-1">{{ $post->countComments() }}</span>
        </button>
      </a>
      <button class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg ml-3">
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5"><path d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
        <span class="ml-1">340</span>
      </button>
    </div>
  </div>
</div>

@endif

  </div>
    
