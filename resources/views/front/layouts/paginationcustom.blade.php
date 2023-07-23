@if ($paginator->hasPages())
    <ul class="pagination pagination-lg justify-content-end">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true"
                    class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark">&lsaquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark"
                    href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled">
                    <span
                        class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item">
                            <span
                                class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark"
                                href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" rel="next"
                    aria-label="@lang('pagination.next')" href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true"
                    class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif
