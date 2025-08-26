<div class="bg-white">
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-7 py-2 sm:px-8 lg:px-10 lg:py-3 mx-auto">
        <!-- Title -->
        {{-- <div class="max-w-2xl mx-auto text-center mb-4 lg:mb-4">
            <h2 class="text-2xl text-black font-bold md:text-4xl md:leading-tight">Insights</h2>
            <p class="mt-1 text-black">Stay in the know with insights from industry experts.</p>
        </div> --}}
        <!-- End Title -->

        {{-- Paginate by category --}}
        <div class="mb-6">
            <h2 class="text-center font-bold mb-3 text-2xl">Category</h2>
            <div class="flex justify-center gap-2">
                <button wire:click="$set('selectedCategory', null)"
                    class="px-3 py-1 border-1 rounded-full font-semibold transition duration-500 hover:bg-black hover:text-white hover:cursor-pointer {{ $selectedCategory === null ? 'bg-black text-white' : '' }}">
                    Latest
                </button>

                @foreach ($categories as $category)
                    <button wire:click="$set('selectedCategory', {{ $category->id }})"
                        class="px-3 py-1 border-1 rounded-full font-semibold transition duration-500 hover:bg-black hover:text-white hover:cursor-pointer {{ $selectedCategory === $category->id ? 'bg-black text-white' : '' }}">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Cards Loop -->
            @foreach ($posts as $post)
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
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </p>
                    </div>
                </a>
            @endforeach
            <!-- End Cards Loop -->

        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Blog -->
    <div>
        <!-- Comment Form -->
        <div class="max-w-[85rem] px-4 py-7 sm:px-6 lg:px-8 lg:py-7 mx-auto">
            <div class="mx-auto max-w-2xl">
                <!-- Title -->
                <div class="text-center">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Feedback & Suggestion</h2>
                </div>

                <!-- Card -->
                <div class="mt-5 p-4 md:p-10 bg-white border border-gray-200 rounded-xl sm:mt-10 relative z-10">
                    <form wire:submit.prevent="add">
                        <!-- Name -->
                        <div class="mb-4 sm:mb-8">
                            <label for="name" class="block mb-2 text-sm font-medium">Full name</label>
                            <input type="text" id="name" wire:model="name"
                                class="w-full px-4 py-2.5 sm:py-3 border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Full name">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4 sm:mb-8">
                            <label for="email" class="block mb-2 text-sm font-medium">Email address</label>
                            <input type="email" id="email" wire:model="email"
                                class="w-full px-4 py-2.5 sm:py-3 border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Email address">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Comment -->
                        <div class="mb-4 sm:mb-8">
                            <label for="message" class="block mb-2 text-sm font-medium">Feedback & Suggestion</label>
                            <textarea id="message" wire:model="message" name="message" rows="4"
                                class="w-full px-4 py-2.5 sm:py-3 border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Leave your feedback & suggestion here..."></textarea>
                            @error('message')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button type="submit"
                                class="w-full py-3 px-4 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none transition">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Comment Form -->
    </div>
</div>
