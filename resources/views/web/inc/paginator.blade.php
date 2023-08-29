       
       @if($paginator->hasPages())
       <!-- pagination -->
       <div class="col-md-12">
                    <div class="post-pagination">
                        @if($paginator->onFirstPage())

                        <a  href="{{$paginator->previousPageUrl()}}" class="btn disabled pagination-back pull-left">{{__('web.back')}}</a>
                        @else
                        <a href="{{$paginator->previousPageUrl()}}" class="pagination-back pull-left">{{__('web.back')}}</a>
                       @endif
          <ul class="pages">
          @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif
           @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                              <li class="active">{{$page}}</li>                     
                           @else
                            <!-- <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li> -->
                            <li><a href="{{ $url }}">{{$page}}</a></li>
                        @endif
                    @endforeach
            @endif
            @endforeach 
                            
                                  
              </ul>
                       @if( $paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl()}}" class="pagination-next pull-right">{{__('web.next')}}</a>
                        @else
                         <a href="{{ $paginator->nextPageUrl()}}" class=" btn disabled pagination-next pull-right">{{__('web.next')}}</a>
                       @endif
                      
                    </div>
                </div>
                <!-- pagination -->
    @endif            