<div class="pagination">
    {{-- Previous page link --}}
    @if ($paginator->onFirstPage())
        <button type="button" class="page-link disabled" disabled>
            <strong>&lt;</strong>
        </button>
    @else
        <button type="button" class="page-link" onclick="location.href='{{ $paginator->previousPageUrl() }}'" rel="prev"><strong>&lt;</strong></button>
    @endif

    {{-- Pagination elements --}}
    @foreach ($elements as $element)
    {{-- "Three dots" separator --}}
    @if (is_string($element))
        <span>{{ $element }}</span>
    @endif

    {{-- Array of links --}}
    @if (is_array($element))
        @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
                <button type="button" class="page-link current">{{ $page }}</button>
            @else
                <button type="button" class="page-link" onclick="location.href='{{ $url }}'">{{ $page }}</button>
            @endif
        @endforeach
    @endif
@endforeach

    {{-- Next page link --}}
    @if ($paginator->hasMorePages())
        <button type="button" class="page-link" onclick="location.href='{{ $paginator->nextPageUrl() }}'" rel="next"><strong>&gt;</strong></button>
    @else
        <button type="button" class="page-link disabled" disabled>
            <strong>&gt;</strong>
        </button>    
    @endif
</div>