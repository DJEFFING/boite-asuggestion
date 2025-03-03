{{-- A chaque fois qu'on veut utiliser cette pagination on doit passer le parametre paginateur dans le include. --}}
<div class="blog-pagination">
    <div class="btn-toolbar justify-content-center mb-15">
        <div class="btn-group">
            @if ($paginateur->onFirstPage())
                <span class="btn btn-outline-primary disabled"><i class="fa fa-angle-double-left"></i></span>
            @else
                <a href="{{ $paginateur->previousPageUrl() }}" class="btn btn-outline-primary"><i class="fa fa-angle-double-left"></i></a>
            @endif

            @foreach ($paginateur->getUrlRange(1, $paginateur->lastPage()) as $page => $url)
                @if ($page == $paginateur->currentPage())
                    <span class="btn btn-primary current">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="btn btn-outline-primary">{{ $page }}</a>
                @endif
            @endforeach

            @if ($paginateur->hasMorePages())
                <a href="{{ $paginateur->nextPageUrl() }}" class="btn btn-outline-primary"><i class="fa fa-angle-double-right"></i></a>
            @else
                <span class="btn btn-outline-primary disabled"><i class="fa fa-angle-double-right"></i></span>
            @endif
        </div>
    </div>
</div>