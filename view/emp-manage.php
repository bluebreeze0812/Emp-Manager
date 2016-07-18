<!DOCTYPE html>
<html>
<head>
<meta http-equiv="charset" content="utf-8">
<title>Employee Manage</title>

<script type="text/javascript">
function goto_page() {
	var want_to_go = document.getElementById("jump").value;
	var URL = "emp-manage.php?pageNow=" + want_to_go;
	location.href = URL;
}
</script>

</head>
<body>
<?php require_once '/program/ZendStudio/project/emp-manage2.0/controller/anti-hotlink.php';?>

<?php 
require_once '/program/ZendStudio/project/emp-manage2.0/model/page-split.class.php';

$pageSplit = new PageSplit();

//check if the pageNow property is already set, if not, default to show the first page.
if (isset($_GET['pageNow'])) {
    $pageNow = $_GET['pageNow'];
} else {
    $pageNow = 1;
}

$pageSize = 10;

//show the data of which page you want, and content 10 rows of data defaultly.
$arr = $pageSplit->page_split('manage_system_emp', $pageSize, $pageNow);

$pageCount = $pageSplit->get_pageCount();

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



//Now we're going to define the navigation bar, they are all contained in a <p> tag.
echo "<p align='center'>";

//first of all, the first-page-hyperlink
echo "<a href='emp-manage.php?pageNow=1'>&lt;first&gt;</a>&nbsp;&nbsp;";

//and the previous-page-hyperlink
if ($pageNow == 1) {
    $prev = 1;
} else {
    $prev = $pageNow - 1;
}
echo "<a href='emp-manage.php?pageNow={$prev}'>&lt;prev&gt;</a>&nbsp;&nbsp;";

//and now we have to do some logic
if ($pageNow == 1 || $pageNow == 2) {
    for ($m = 1; $m <= 5; $m++) {
        echo "<a href='emp-manage.php?pageNow={$m}'>&lt;{$m}&gt;</a>&nbsp;&nbsp;";
    }
} elseif ($pageNow > 2 && $pageNow < ($pageCount - 1)) {
    for ($m = $pageNow - 2; $m <= $pageNow + 2; $m++) {
        echo "<a href='emp-manage.php?pageNow={$m}'>&lt;{$m}&gt;</a>&nbsp;&nbsp;";
    }
} elseif ($pageNow >= ($pageCount - 1) || $pageNow == $pageCount) {
    for ($m = $pageCount - 4; $m <= $pageCount; $m++) {
        echo "<a href='emp-manage.php?pageNow={$m}'>&lt;{$m}&gt;</a>&nbsp;&nbsp;";
    }
}

//now the next-page-hyperlink
if (($pageNow + 1) <= $pageCount) {
    $next = $pageNow + 1;
} else {
    $next = $pageNow;
}
echo "<a href='emp-manage.php?pageNow={$next}'>&lt;next&gt;</a>&nbsp;&nbsp;";

//and finally, the last-page-hyperlink
echo "<a href='emp-manage.php?pageNow={$pageCount}'>&lt;last&gt;</a>&nbsp;&nbsp;";

//Dont forget to close the <p> tag
echo "</p>";



//Now let's add a GOTO button into our page
echo "<p align='center'>";
echo "$pageNow / $pageCount";
echo "&nbsp;";
echo "<input type='text' name='jump' id='jump' size='1'>";
echo "<input type='button' value='GO' onclick='goto_page()'";
echo "</p>";

echo "<br>";
echo "<a href='main.php'>back</a>";
?>

</body>
</html>
