<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($paginator->lastPage() > 1)
    <ul class="pagination">
    @if($paginator->currentPage()!=1)
    <a href="{{ $paginator->url(1) }}"><li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            &laquo;
         </li></a>
         <a href="{{  $paginator->url($paginator->currentPage()-1) }}"><li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
           <
         </li></a>
         @endif 
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 3);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
               $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
            <a href="{{ $paginator->url($i) }}"><li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    {{ $i }}
                </li></a>
            @endif
        @endfor
        @if($paginator->currentPage()!=$paginator->lastPage())
        <a href="{{ $paginator->url($paginator->currentPage()+1) }}"><li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            >
        </li></a>
        <a href="{{ $paginator->url($paginator->lastPage()) }}"><li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
           &raquo;
        </li></a>
        @endif
    </ul>
@endif
