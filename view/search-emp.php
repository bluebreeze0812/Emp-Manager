<!DOCTYPE html>
<html>
<head>
<meta http-equiv="charset" content="UTF-8">
<link rel="stylesheet" href="./css/search-emp.css">
<title>Insert title here</title>

<script type="text/javascript">
function switch_div(val) {
	if (val == "name") {
		document.getElementById("search_by_id").style.display = "none";
		document.getElementById("search_by_name").style.display = "-moz-box";
	} else if (val == "id"){
		document.getElementById("search_by_id").style.display = "-moz-box";
		document.getElementById("search_by_name").style.display = "none";
	}
}
</script>

</head>
<body>
<?php require_once '/program/ZendStudio/project/emp-manage2.0/controller/anti-hotlink.php';?>

<fieldset class="search_field">
<legend>Search</legend>
search by
<input id="type" type="radio" name="type" value="id" onchange="switch_div(this.value)" checked="checked">id
<input id="type" type="radio" name="type" value="name" onchange="switch_div(this.value)">name

<div class="search_div" id="search_by_id">
<form action="../controller/crud.php?operate=read&type=id" method="post">
<label for="id">id:&nbsp;&nbsp;</label>
<input type="text" name="id" id="id">
<br>
<input class="submit" type="submit" value="search">
</form>
</div>

<div class="search_div" id="search_by_name" style="display: none">
<form action="../controller/crud.php?operate=read&type=name" method="post">
<label for="name">name:&nbsp;&nbsp;</label>
<input type="text" name="name" id="name">
<br>
<input class="submit" type="submit" value="search">
</form>
</div>

</fieldset>
</body>
</html>