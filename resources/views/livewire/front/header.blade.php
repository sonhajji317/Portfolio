<header class="bg-white">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex-1 md:flex md:items-center md:gap-12">
                <a wire:navigate href="/"
                    class="text-2xl font-bold hover:scale-110 transition duration-300 ease-in-out">B2N
                    Blog</a>
            </div>

            <div class="md:flex md:items-center md:gap-12">
                <nav aria-label="Global" class="hidden md:block">
                    <ul class="flex items-center gap-6 text-sm">
                        <li>
                            <a class="relative font-semibold px-2 py-1 rounded-md text-black 
                                   hover:cursor-pointer 
                                   after:content-[''] after:absolute after:left-0 after:bottom-0 
                                   after:w-0 after:h-[2px] after:bg-black 
                                   after:transition-all after:duration-300 
                                   hover:after:w-full {{ request()->is('/') ? 'after:w-full' : '' }}"
                                wire:navigate href="/">
                                Home
                            </a>
                        </li>
                        <li>
                            <a class="relative font-semibold px-2 py-1 rounded-md text-black 
                                   hover:cursor-pointer 
                                   after:content-[''] after:absolute after:left-0 after:bottom-0 
                                   after:w-0 after:h-[2px] after:bg-black 
                                   after:transition-all after:duration-300 
                                   hover:after:w-full {{ Route::is('post.all') ? 'after:w-full' : (Route::is('post.details') ? 'after:w-full' : '') }}"
                                wire:navigate href="{{ route('post.all') }}">
                                Post
                            </a>
                        </li>
                        <li>
                            <a class="relative font-semibold px-2 py-1 rounded-md text-black 
                                   hover:cursor-pointer 
                                   after:content-[''] after:absolute after:left-0 after:bottom-0 
                                   after:w-0 after:h-[2px] after:bg-black 
                                   after:transition-all after:duration-300 
                                   hover:after:w-full {{ Route::is('about') ? 'after:w-full' : '' }}"
                                wire:navigate href="{{ route('about') }}"> About </a>
                        </li>

                        <li>
                            <a class="relative font-semibold px-2 py-1 rounded-md text-black 
                                   hover:cursor-pointer 
                                   after:content-[''] after:absolute after:left-0 after:bottom-0 
                                   after:w-0 after:h-[2px] after:bg-black 
                                   after:transition-all after:duration-300 
                                   hover:after:w-full {{ Route::is('contact.me') ? 'after:w-full' : '' }}"
                                wire:navigate href="{{ route('contact.me') }}"> Contact </a>
                        </li>
                    </ul>
                </nav>
            </div>


        </div>
    </div>
</header>
