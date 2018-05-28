@if ($paginator->hasPages())
    <ul class="pagination">
    	<li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}"><i class="fa fa-backward"></i></a></li>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link"><i class="fa fa-arrow-circle-left"></i></span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-arrow-circle-left"></i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-arrow-circle-right"></i></a></li>
        @else
            <li class="page-item disabled"><span class="page-link"><i class="fa fa-arrow-circle-right"></i></span></li>
        @endif
        <li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}"><i class="fa fa-forward"></i></a></li>
    </ul>
@endif
