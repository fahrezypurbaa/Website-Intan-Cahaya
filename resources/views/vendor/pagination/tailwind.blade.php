@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-center mt-8">
        <ul class="flex flex-wrap items-center gap-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 rounded-md cursor-default select-none">
                        ‹
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                       class="px-3 py-2 text-sm font-medium text-[#144F5F] border border-[#144F5F]/30 bg-white rounded-md hover:bg-[#144F5F]/10 transition">
                        ‹
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span class="px-3 py-2 text-sm text-gray-500 bg-white border border-gray-200 rounded-md">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-3 py-2 text-sm font-semibold text-white bg-[#144F5F] border border-[#144F5F] rounded-md cursor-default">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-3 py-2 text-sm text-[#144F5F] bg-white border border-[#144F5F]/30 rounded-md hover:bg-[#144F5F]/10 transition">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                       class="px-3 py-2 text-sm font-medium text-[#144F5F] border border-[#144F5F]/30 bg-white rounded-md hover:bg-[#144F5F]/10 transition">
                        ›
                    </a>
                </li>
            @else
                <li>
                    <span class="px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 rounded-md cursor-default select-none">
                        ›
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
