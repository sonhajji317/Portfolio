<div class="">
    <div class="py-5 flex justify-center">
        <form wire:submit="search" class="flex items-center space-x-3">
            <input wire:model="query" type="text" placeholder="Search some words..."
                class="w-full max-w-md py-2 px-4 rounded-xl border border-gray-300 focus:border-black focus:ring-2 focus:ring-black text-black placeholder:text-center placeholder-gray-400 shadow-sm transition">
            <button type="submit"
                class="bg-black hover:bg-black/70 text-white font-sm py-2 px-5 rounded-xl shadow transition cursor-pointer">
                Search
            </button>
        </form>

    </div>
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 px-10 mt-2">

        <!-- Cards Loop -->
        @forelse ($posts as $post)
            <a class="group flex flex-col focus:outline-hidden bg-gray-200 rounded-xl hover:rounded-xl hover:shadow-lg"
                wire:navigate href="/post/{{ $post->id }}/details">
                <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
                    <img class="absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-xl h-70 w-full"
                        src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}">
                </div>

                <div class="p-2">
                    <h3
                        class="text-xl font-semibold text-gray-800 underline underline-offset-4 mb-3 group-hover:text-gray-600">
                        {{ $post->category->name }}
                    </h3>
                    <h5 class="font-semibold text-gray-800 group-hover:text-gray-600 line-clamp-1">
                        {{ $post->title }}
                    </h5>
                    <p class="mt-3 text-gray-800 line-clamp-3">
                        {{ $post->content }}
                    </p>
                    <p
                        class="mt-5 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium">
                        Read more
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </p>
                </div>
            </a>
        @empty
            <img src="{{ asset('storage/placeholder-image.jpg') }}" alt="">
            <p class="text-center text-gray-500 col-span-full">No posts found.</p>
        @endforelse
        <!-- End Cards Loop -->
    </div>
    <div class="flex justify-center mt-1">
        {{ $posts->links('vendor.pagination.simple-tailwind', data: ['scrollTo' => false]) }}
    </div>
    <!-- End Grid -->
</div>
