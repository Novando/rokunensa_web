<div class="page-btn">
	@if($paginator->hasPages())
		@if ($paginator->onFirstPage())
			<span class="off">&#8592;</span>
		@else
	    	<span wire:click="previousPage">&#8592;</span>
	    @endif

	    @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <small>{{ $element }}</small>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="off">{{ $page }}</span>
                    @else
                        <span wire:click="gotoPage({{ $page }})">{{ $page }}</span>
                    @endif
                @endforeach
            @endif
        @endforeach

	    @if ($paginator->hasMorePages())
	        <span wire:click="nextPage">&#8594;</span>
	    @else
	    	<span class="off">&#8594;</span>
	    @endif
	@endif
</div>