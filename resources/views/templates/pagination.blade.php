<nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            @if($paginator->currentPage() == 1)
                <li class="page-item disabled">
                    <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1">
                        <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link page-link-prev" href="{{$paginator->previousPageUrl()}}" aria-label="Previous" tabindex="-1">
                        <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                    </a>
                </li>
            @endif
            @foreach($paginator->getUrlRange(1, $paginator->lastPage()) as $key => $val)
                @if($paginator->currentPage() == $key)
                    <li class="page-item" aria-current="page"><a class="page-link" href="{{$val}}">{{$key}}</a></li>
                @else
                    <li class="page-item active" aria-current="page"><a class="page-link" href="{{$val}}">{{$key}}</a></li>
                @endif
            @endforeach 
            
            <li class="page-item-total">of {{$paginator->total()}}</li>  
            
            @if($paginator->currentPage() == $paginator->lastPage())
                <li class="page-item disabled">
                    <a class="page-link page-link-next" href="{{$paginator->nextPageUrl()}}" aria-label="Next">
                        Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link page-link-next" href="{{$paginator->nextPageUrl()}}" aria-label="Next">
                        Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                    </a>
                </li>
            @endif
        </ul>
        
    </nav>