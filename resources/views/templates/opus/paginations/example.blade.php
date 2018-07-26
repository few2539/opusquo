@foreach($paginator as $key => $item)
    <article class="article-test">
        {{ 'ITEM: ' . ($key + 1) }}
    </article>
@endforeach

<?php
$previousPageUrl = $paginator->previousPageUrl();
$nextPageUrl = $paginator->nextPageUrl();
?>

<ul class="pagination">
    @has($previousPageUrl)
        <li>
            <a href="{{ $previousPageUrl }}" rel="prev">&laquo; Previous</a>
        </li>
    @elsehas
        <li class="disabled">
            <span>&laquo; Previous</span>
        </li>
    @endhas

    @has($nextPageUrl)
        <li>
            <a href="{{ $nextPageUrl }}" rel="next">Next &raquo;</a>
        </li>
    @elsehas
        <li class="disabled">
            <span>Next &raquo;</span>
        </li>
    @endhas
</ul>
