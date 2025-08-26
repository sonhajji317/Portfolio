    <div>
        <div class="relative overflow-hidden bg-cover bg-no-repeat lg:h-screen "
            style="background-image: url('{{ asset('storage/' . $posts->thumbnail) }}')">
            <a wire:navigate href="/post/{{ $posts->id }}/details">
                <div class="flex items-end h-full">
                    <div class="flex flex-col px-5 py-20 text-white w-full space-y-3">
                        <div class="flex flex-wrap items-start">
                            <h1 class="text-4xl font-bold">{{ $posts->title }}</h1>
                        </div>

                        <div class="flex justify-between text-sm w-full">
                            <div class="flex flex-col">
                                <span>Written by:</span>
                                <strong>{{ $posts->author->name }}</strong>
                                <img src="{{ asset('storage/' . $posts->author->avatar) }}"
                                    class="h-15 w-15 rounded-full mt-2" alt="">
                            </div>

                            <div class="flex flex-col text-right">
                                <span>Published on:</span>
                                <strong>{{ \Carbon\Carbon::parse($posts->published_at)->translatedFormat('d F Y') }}</strong>
                                <span
                                    class="text-sm bg-transparent text-white text-center font-bold px-3 py-1 mt-3 border-1 border-white rounded-full">
                                    {{ $posts->category->name }}
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </a>
        </div>
    </div>
