<!DOCTYPE html>
<html>
<head>
<meta http-equiv="charset" content="UTF-8">
<link rel="stylesheet" href="./css/emp-update.css">
<title>Update</title>
</head>
<body>
<fieldset class="update_field">
<legend>Update</legend>
<div class="update_div">
<?php require_once '/program/ZendStudio/project/emp-manage2.0/controller/anti-hotlink.php';?>

<?php 
    require_once '/program/ZendStudio/project/emp-manage2.0/model/emp-service.class.php';
    $empService = new EmpService();
    
    //get emp id that sent from crud page
    $id = $_GET['id'];
    
    //grab the infromation that match the id
    $arr = $empService->get_empinfo($id);
    
    echo "<form action='../controller/crud.php?operate=update&id={$id}' method='post'>";    
?>

<p>
<label for="name">name:</label>
<input type="text" name="name" id="name" value="<?php echo $arr[0]['name'];?>">
</p>

<p>
<label for="password">password:&nbsp;&nbsp;</label>
<input type="text" name="password" id="password" value="<?php echo $arr[0]['password'];?>">
</p>

<p>
<label for="grade">grade:</label>
<input type="text" name="grade" id="grade" value="<?php echo $arr[0]['grade'];?>">
</p>

<p>
<label for="salary">salary:</label>
<input type="text" name="salary" id="salary" value="<?php echo $arr[0]['salary'];?>">
</p>


<!-- THIS IS TELLING THE CRUD PAGE THAT WE HAVE ALREADY DONE WITH THE UPDATE FORM -->
<input type="hidden" name="update_fulfil" value="update_fulfil">


<p>
<input type="submit" value="update">
</p>

</form>
</div>
</fieldset>
</body>
</html>