<!-- Team -->
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="max-w-2xl mx-auto text-center mb-5 lg:mb-5">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">History</h2>
        <p class="text-start">In 2009, a group of nature-loving youths came together to turn their passion into a
            community. They explored mountains, forests, rivers, and beaches, and founded B2N – Back to Nature to
            reconnect with the beauty and serenity of the natural world.
        </p>
        <p class="text-start"> B2N’s mission went beyond adventure—it was about education. Members learned about local
            ecosystems, shared
            knowledge, and promoted conservation, ensuring every step they took left no harm.
        </p>
        <p class="text-start">
            Over time, the community inspired more young people to join, turning explorations into lessons in respect,
            responsibility, and character development.
        </p>
        <p class="text-start"> More than a decade later, B2N continues to guide new members to connect with nature and
            protect it, proving
            that curiosity and passion can create lasting positive change.</p>
    </div>


    <!-- Title -->
    <div class="max-w-2xl mx-auto text-center mb-3 lg:mb-3">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Our Team</h2>
    </div>
    <!-- End Title -->

    <!-- Grid -->
    <div class="flex flex-wrap justify-center gap-6">
        @foreach ($authors as $author)
            <div class="text-center w-40 sm:w-48 lg:w-60">
                <img class="rounded-xl w-full h-full object-cover" src="{{ asset('storage/' . $author->avatar) }}"
                    alt="Avatar">
                <div class="mt-2 sm:mt-4">
                    <h3 class="text-sm font-medium text-gray-800 sm:text-base lg:text-lg">
                        {{ $author->name }}
                    </h3>
                </div>
            </div>
        @endforeach
    </div>

    <!-- End Grid -->
</div>
<!-- End Team -->
