@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center">
        <ul class="inline-flex items-center -space-x-px">
            <!-- Tombol Previous -->
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-4 py-2 text-gray-400 border rounded-l-lg cursor-not-allowed bg-gray-100">
                        &laquo; Prev
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 text-gray-700 border rounded-l-lg hover:bg-gray-200">
                        &laquo; Prev
                    </a>
                </li>
            @endif

            <!-- Nomor Halaman -->
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li><span class="px-4 py-2 text-gray-500">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="px-4 py-2 text-white bg-gray-900 border">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="px-4 py-2 text-gray-700 border hover:bg-gray-200">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <!-- Tombol Next -->
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 text-gray-700 border rounded-r-lg hover:bg-gray-200">
                        Next &raquo;
                    </a>
                </li>
            @else
                <li>
                    <span class="px-4 py-2 text-gray-400 border rounded-r-lg cursor-not-allowed bg-gray-100">
                        Next &raquo;
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
