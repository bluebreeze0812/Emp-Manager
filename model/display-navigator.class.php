<?php
class DisplayNavigator {
    
    function display($type, $pageCount, $pageNow) {
        echo "<p align='center'>";
        
        //first of all, the first-page-hyperlink
        echo "<a href='../controller/crud.php?operate=read&type={$type}&pageNow=0'>&lt;first&gt;</a>&nbsp;&nbsp;";
        
        //and the previous-page-hyperlink
        if ($pageNow == 0) {
            $prev = 0;
        } else {
            $prev = $pageNow - 1;
        }
        echo "<a href='../controller/crud.php?operate=read&type={$type}&pageNow={$prev}'>&lt;prev&gt;</a>&nbsp;&nbsp;";
        
        //and now we have to do some logic
        //if the total number of pages is less than 5, then just show them
        if ($pageCount <= 5) {
            for ($m = 0; $m < $pageCount; $m++) {
                $page = $m + 1;
                echo "<a href='../controller/crud.php?operate=read&type={$type}&pageNow={$m}'>&lt;{$page}&gt;</a>&nbsp;&nbsp;";
            }
        } else {
            if ($pageNow == 0 || $pageNow == 1) {
                for ($m = 0; $m <= 4; $m++) {
                    $page = $m + 1;
                    echo "<a href='../controller/crud.php?operate=read&type={$type}&pageNow={$m}'>&lt;{$page}&gt;</a>&nbsp;&nbsp;";
                }
            } elseif ($pageNow > 1 && $pageNow < ($pageCount - 2)) {
                for ($m = $pageNow - 2; $m <= $pageNow + 2; $m++) {
                    $page = $m + 1;
                    echo "<a href='../controller/crud.php?operate=read&type={$type}&pageNow={$m}'>&lt;{$page}&gt;</a>&nbsp;&nbsp;";
                }
            } elseif ($pageNow >= ($pageCount - 2) || $pageNow == ($pageCount - 1)) {
                for ($m = $pageCount - 5; $m < $pageCount; $m++) {
                    $page = $m + 1;
                    echo "<a href='../controller/crud.php?operate=read&type={$type}&pageNow={$m}'>&lt;{$page}&gt;</a>&nbsp;&nbsp;";
                }
            }
        }
        
        
        //now the next-page-hyperlink
        if (($pageNow + 1) <= ($pageCount - 1)) {
            $next = $pageNow + 1;
        } else {
            $next = $pageNow;
        }
        echo "<a href='../controller/crud.php?operate=read&type={$type}&pageNow={$next}'>&lt;next&gt;</a>&nbsp;&nbsp;";
        
        //and finally, the last-page-hyperlink
        if ($pageCount == 0) {
            $lastPage = 0;
        } else {
            $lastPage = $pageCount - 1;
        }
        echo "<a href='../controller/crud.php?operate=read&type={$type}&pageNow={$lastPage}'>&lt;last&gt;</a>&nbsp;&nbsp;";
        
        //Dont forget to close the <p> tag
        echo "</p>";
        
        
        
        //add a go_to button
        echo "<div style='text-align: center'>";
        echo "<form action='../controller/crud.php' method='get'>";
        echo "<input type='hidden' name='operate' value='read'>";
        echo "<input type='hidden' name='type' value='{$type}'>";
        echo "<input type='text' name='goto_pageNow' size='1'>";
        echo "<input type='submit' value='GO'>";
        echo "</form>";
        echo "</div>";
        
        //display a counting panel
        echo "<p align='center'>";
        $page_panel = $pageNow + 1;
        echo "$page_panel / $pageCount";
        echo "<br>";
        echo "<a href='../view/main.php'>back</a>";
        echo "</p>";
        
        
        
    }
    
}
?>