<div class="btn-toolbar justify-content-center mb-15">
<style>
    .current{
        background: blue !important;
        border-radius: 10px !important;
    }
    .current a{
        color: #fff;
    }
</style>
    <div class="btn-group">
        <ul class="pagination">
            {{-- Bouton précédent --}}
            <li class="{{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-outline-primary prev" aria-label="Previous">
                    <i class="fa fa-angle-double-left"></i>
                </a>
            </li>

            {{-- Boucle sur les numéros de page --}}
            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                <li class="{{ $paginator->url($page) === $paginator->url($paginator->currentPage()) ? 'current' : '' }} ">
                    <a href="{{ $url }}" class="btn btn-outline-primary ">{{ $page }}</a>
                </li>
            @endforeach

            {{-- Bouton suivant --}}
            <li class="{{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-outline-primary next" aria-label="Next">
                    <i class="fa fa-angle-double-right"></i>
                </a>
            </li>
        </ul>
    </div>
</div>