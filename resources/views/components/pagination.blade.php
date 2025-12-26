@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center">
        <div class="inline-flex items-center gap-2 rounded-3xl border border-purple-200/60 bg-white/60 backdrop-blur-sm shadow-lg px-3 py-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span
                    aria-disabled="true"
                    aria-label="@lang('pagination.previous')"
                    class="px-3 py-2 rounded-2xl border border-purple-200/40 bg-white/40 text-purple-300 cursor-not-allowed select-none"
                >
                    ‹ Prev
                </span>
            @else
                <a
                    href="{{ $paginator->previousPageUrl() }}"
                    rel="prev"
                    aria-label="@lang('pagination.previous')"
                    class="px-3 py-2 rounded-2xl border border-purple-200/50 bg-white/50 text-purple-700 hover:bg-white/80 hover:shadow-md transition-all duration-200"
                >
                    ‹ Prev
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true" class="px-3 py-2 text-purple-500/70 select-none">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span
                                aria-current="page"
                                class="px-4 py-2 rounded-2xl font-semibold text-white shadow-md bg-gradient-to-r from-pink-400 via-purple-400 to-blue-400"
                            >
                                {{ $page }}
                            </span>
                        @else
                            <a
                                href="{{ $url }}"
                                aria-label="@lang('Go to page :page', ['page' => $page])"
                                class="px-4 py-2 rounded-2xl border border-purple-200/50 bg-white/50 text-purple-700 hover:bg-white/80 hover:shadow-md transition-all duration-200"
                            >
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a
                    href="{{ $paginator->nextPageUrl() }}"
                    rel="next"
                    aria-label="@lang('pagination.next')"
                    class="px-3 py-2 rounded-2xl border border-purple-200/50 bg-white/50 text-purple-700 hover:bg-white/80 hover:shadow-md transition-all duration-200"
                >
                    Next ›
                </a>
            @else
                <span
                    aria-disabled="true"
                    aria-label="@lang('pagination.next')"
                    class="px-3 py-2 rounded-2xl border border-purple-200/40 bg-white/40 text-purple-300 cursor-not-allowed select-none"
                >
                    Next ›
                </span>
            @endif
        </div>
    </nav>
@endif


