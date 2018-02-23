@if ($paginator->hasPages())
  <nav class="pagination is-centered m-r-50 m-t-20">
    @if ($paginator->onFirstPage())
        <a class="pagination-prev" disabled>&laquo;</a>
    @else
        <a href="{{$paginator->previousPageUrl()}}" class="pagination-previous" rel="prev">&raquo;</a>
    @endif

    <ul class="pagination-list">
        {{-- Previous Page Link --}}

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><span class="pagination-ellipsis">&hellip;</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                          <a class="pagination-link is-current">{{ $page }}</a>
                        </li>
                    @else
                        <li><a href="{{ $url }}" class="pagination-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
    </ul>
    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
    @else
        <li class="disabled"><span>&raquo;</span></li>
    @endif
  </nav>
@endif
