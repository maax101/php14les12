<?php
$book_db = new PDO('mysql:host=localhost;dbname=books1','root','', array(PDO::ATTR_PERSISTENT => true));
$get_key = array();
$get_value = array();
foreach ($_GET as $key => $value) {
	$get_key[] = $key;
	$get_value[] = $value;
}
var_dump($get_key);
var_dump($get_value);

$sql="SELECT * from books where".$get_key."like "%".$get_value."%"";
$utf = $book_db->query("SET NAMES 'utf8';");
$row=array();

?>
<html>

<style>
    table { 
        border-spacing: 0;
        border-collapse: collapse;
    }

    table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
    }
    
    table th {
        background: #eee;
    }
</style>
<h1>Библиотека</h1>
<form method="GET">
    <input type="text" name="isbn" placeholder="ISBN" value="" />
    <input type="text" name="name" placeholder="Название книги" value="" />
    <input type="text" name="author" placeholder="Автор книги" value="" />
    <input type="submit" value="Поиск" />
</form>
	<table border="1">
		<tr>
 		<th>Название</th>
	    <th>Автор</th>
	    <th>Год выпуска</th>
	    <th>Жанр</th>
	    <th>ISBN</th>
		</tr>		
<?php 
foreach($book_db->query($sql) as $row) {
	$row[]=$row;
	echo '<tr><td>'.$row['name'].'</td><td>'.$row['author'].'</td><td>'.$row['year'].'</td><td>'.$row['genre'].'</td><td>'.$row['isbn'].'</td></tr>';
}
?>
	</table>
</html>