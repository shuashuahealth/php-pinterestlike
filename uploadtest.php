<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php




if (isset($_POST['submit'])) {

$form_description = $_POST['form_description'];

$form_data_name = $_FILES['form_data']['name'];

$form_data_size = $_FILES['form_data']['size'];

$form_data_type = $_FILES['form_data']['type'];

$form_data = $_FILES['form_data']['tmp_name'];

  

$connect = MYSQL_CONNECT( "localhost", "root", "") or die("Unable to connect to MySQL server");

mysql_select_db( "pinterest") or die("Unable to select database");

 

$data = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));

 

//echo "mysqlPicture=".$data;

 

 

$result=MYSQL_QUERY( "INSERT INTO ccs_image (description,bin_data,filename,filesize,filetype) VALUES ('$form_description','$data','$form_data_name','$form_data_size','$form_data_type')");

 

$id= mysql_insert_id();

print "<p>This file has the following Database ID: <a href='getdata.php?id=$id'><b>$id</b></a>";



 

MYSQL_CLOSE();

 

} else {

 

?>

 <center>

<form method="post" action="" enctype="multipart/form-data">

File Description:

<input type="text" name="form_description" size="40">

<INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="1000000"> <br>

File to upload/store in database:

<input type="file" name="form_data" size="40">

<p><input type="submit" name="submit" value="submit">

</form>

 </center>

 

<?php

 

}

 

?>

</BODY>


</body>
</html>