<div class="max-w-5xl mx-auto bg-white p-4 sm:p-6 rounded-lg shadow-xl">
    <!-- Judul -->
    <h1 class="text-2xl sm:text-3xl font-bold mb-2">{{ $title }}</h1>

    <!-- Info -->
    <p class="text-gray-500 text-xs sm:text-sm mb-4">
        By {{ $author }} • {{ $category }} • {{ \Carbon\Carbon::parse($published_at)->format('d M Y') }}
    </p>

    <!-- Gambar -->
    <div class="mb-4">
        <img src="{{ asset('storage/' . $thumbnail) }}" alt="{{ $title }}"
            class="rounded-lg w-full h-56 sm:h-72 md:h-[25rem] lg:h-[29rem] object-cover">
    </div>

    <!-- Konten -->
    <div class="prose max-w-none text-sm sm:text-base">
        {!! nl2br(e($content)) !!}
    </div>

    <div class="mt-7">
        <h1 class="font-bold">Comment</h1>
        @forelse ($posts->comments as $comment)
            @if ($comment->approved)
                <div class="border-b py-2">
                    <p class="text-sm text-gray-600 font-semibold">From : {{ $comment->name }}</p>
                    <p class="text-gray-800">{{ $comment->comment }}</p>
                </div>
            @else
                <p class="text-gray-500">No comments yet.</p>
            @endif
        @empty
            <p class="text-gray-500">No comments yet.</p>
        @endforelse
    </div>


    <div>
        <!-- Comment Form -->
        <div class="max-w-[85rem] px-4 py-7 sm:px-6 lg:px-8 lg:py-7 mx-auto">
            <div class="mx-auto max-w-2xl">
                <!-- Title -->
                <div class="text-center">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Post a Comment</h2>
                </div>

                <!-- Card -->
                <div class="mt-5 p-4 md:p-10 bg-white border border-gray-200 rounded-xl sm:mt-10 relative z-10">
                    <form wire:submit.prevent="commentAdd">
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
                            <label for="comment" class="block mb-2 text-sm font-medium">Comment</label>
                            <textarea id="comment" wire:model="comment" name="comment" rows="4"
                                class="w-full px-4 py-2.5 sm:py-3 border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Leave your comment here..."></textarea>
                            @error('comment')
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
