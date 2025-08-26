@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-3 mt-6">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                ← Prev
            </span>
        @else
            <button wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                class="px-4 py-2 text-sm font-medium bg-black text-white rounded-lg shadow hover:bg-black/80  hover:cursor-pointer transition">
                ← Prev
            </button>
        @endif

        {{-- Page Info --}}
        <span class="px-3 py-1 text-sm font-semibold text-gray-700">
            Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
        </span>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                class="px-4 py-2 text-sm font-medium bg-black text-white rounded-lg shadow hover:bg-black/80  hover:cursor-pointer transition">
                Next →
            </button>
        @else
            <span class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                Next →
            </span>
        @endif
    </nav>
@endif
