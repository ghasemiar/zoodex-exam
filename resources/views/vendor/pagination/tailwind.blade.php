@if ($paginator->hasPages())
    <nav class="pagination flex items-center justify-center space-x-1 mt-4">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="btn btn-sm btn-disabled">«</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-sm">«</a>
        @endif

        {{-- Sliding Window for Page Numbers --}}
        @php
            $start = max(1, $paginator->currentPage() - 1); // Start from 1 page before the current page
            $end = min($paginator->lastPage(), $paginator->currentPage() + 1); // End at 1 page after the current page
        @endphp

        @for ($page = $start; $page <= $end; $page++)
            @if ($page == $paginator->currentPage())
                <span class="btn btn-sm btn-active">{{ $page }}</span>
            @else
                <a href="{{ $paginator->url($page) }}" class="btn btn-sm">{{ $page }}</a>
            @endif
        @endfor

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-sm">»</a>
        @else
            <span class="btn btn-sm btn-disabled">»</span>
        @endif
    </nav>
@endif
