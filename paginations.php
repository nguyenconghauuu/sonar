<?php
    $totalItems = $count;
    $totalItemspage = 10;
    $pageRange = 3;
    if($pageRange%2 == 0){
        $pageRange += 1;
    }
    $currPage = (isset($_GET["page"]))? $_GET["page"] : 1;

    $totalPages = ceil($totalItems / $totalItemspage);

    $position = ($currPage -1)*$totalItemspage;
    $listpages = '';
    $pageHtml ='';
    if($totalPages > 1){
        $start = '<li>Start</li>';
        $prev = '<li>Prev</li>';
        if($currPage > 1){
            $start = '<li><a href="?page=1">Start</a></li>';
            $prev = '<li><a href="?page='.($currPage-1).'">Prev</a></li>';
        }
        $next = '<li>Next</li>';
        $end = '<li>End</li>';
        if($currPage < $totalPages){
            $next = '<li><a href="?page='.($currPage+1).'">Next</a></li>';
            $end = '<li><a href="?page='.($totalPages).'">End</a></li>';
        }
        if($pageRange < $totalPages){
            if($currPage == 1){
                $startPage = 1;
                $endPage = $pageRange;
            }else if($currPage == $totalPages){
                $startPage = $totalPages - $pageRange +1;
                $endPage = $totalPages;
            }else{
                $startPage = $currPage - ($pageRange -1)/2;
                $endPage = $currPage + ($pageRange -1)/2;
            }

        }else{
            $startPage = 1;
            $endPage = $totalPages;
        }
        for($i =$startPage ; $i <= $endPage ; $i++){
            if($i == $currPage){
                $listpages .= '<li class="active"><a href="?page='.$i.'">'.$i.'</a></li>';
            }
            else{
                $listpages .= '<li><a href="?page='.$i.'">'.$i.'</a></li>';
            }
        }
            $pageHtml = '<ul class="pagination">
                            '.$start
                            .$prev
                            .$listpages
                            .$next
                            .$end.'
                        </ul>';
        }

?>