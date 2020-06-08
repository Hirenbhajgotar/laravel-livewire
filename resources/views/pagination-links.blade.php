@if ($paginator->hasPages())
<ul class="my-4">
    {{-- Prev page --}}
    @if ($paginator->onFirstPage())
    <li class="inline-block border border-gray-400 rounded-full mr-8 bg-gray-400 px-4 py-2">Prev</li>
    @else
    <li class="inline-block border border-green-400 rounded-full mr-8 bg-white-400 cursor-pointer px-4 py-2"
        wire:click="previousPage">Prev
    </li>
    @endif
    {{-- End Prev page --}}

    {{-- Numbers --}}
    @foreach ($elements as $element)
        
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="inline-block border border-green-400 rounded-full mx-1 bg-green-400 px-4 py-2">{{ $page }}</li>
                @else
                <li class="inline-block border border-green-400 rounded-full mx-1 bg-white-400 cursor-pointer px-4 py-2"
                    wire:click="gotoPage({{ $page }})">{{ $page }}
                </li>
                @endif
            @endforeach
        @endif
    @endforeach
    {{-- End Numbers --}}

    {{-- Next page --}}
    @if ($paginator->hasMorePages())
    <li class="inline-block border border-green-400 rounded-full ml-8 bg-white-400 cursor-pointer px-4 py-2"
        wire:click="nextPage">Next
    </li>
    @else
    <li class="inline-block border border-gray-400 rounded-full ml-8 bg-gray-400 px-4 py-2">Next
    </li>
    @endif
    {{-- End Next page --}}
</ul>
@endif