@if($paginator->hasPages())


<div class="col-md-12">
    <div class="post-pagination">
        <a href="{{ $paginator->previousPageUrl() }}" class="pagination-back pull-left">Back</a>
        <ul class="pages">

@foreach ($elements as $element)

{{-- Array Of Links --}}
@if (is_array($element))
    @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active">{{ $page }}</li>

        @else
        <li><a href="$url">{{ $page }}</a></li>

        @endif
    @endforeach
@endif
@endforeach

</ul>
							<!-- pagination -->

									<a href="{{ $paginator->nextPageUrl() }}" class="pagination-next pull-right">Next</a>
								</div>
							</div>
							<!-- pagination -->

                            @endif
