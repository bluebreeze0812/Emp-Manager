<?php

class DisplayTable {
    
    function display($arr) {
        
        echo "<table align='center' width='1000px' border='2px', bordercolor='blue' cellspacing='0'>";
        
        //constrain the header of the table
        echo "<tr><th>ID</th><th>NAME</th><th>PASSWORD</th><th>GRADE</th><th>SALARY</th><th>UPDATE</th><th>DELETE</th></tr>";
        
        //every row of data will show in this format
        for ($i = 0; $i < count($arr); $i++) {
            echo "<tr>";
            for ($j = 0; $j < 5; $j++) {
                echo "<td align='center'>{$arr[$i][$j]}</td>";
            }
        
            //echo the update hyperlink
            echo "<td align='center'>";
            echo "<a href='../controller/crud.php?operate=update&id={$arr[$i][0]}'>update</a>";
            echo "</td>";
        
            //echo the delete hyper link
            echo "<td align='center'>";
            echo "<a href='../controller/crud.php?operate=delete&id={$arr[$i][0]}'>delete</a>";
            echo "</td>";
        
            echo "</tr>";
        }
        
        echo "</table>";
    }
    
}

?>