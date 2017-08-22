<?php
//http://university.netology.ru/u/belous/me/lesson12/lesson4_1.php
$book_db = new PDO("mysql:host = http://university.netology.ru;dbname=global", "belous", "neto1253", array(PDO::ATTR_PERSISTENT => true));
$row = array();
$sql = 'SELECT * FROM books';
if (!empty($_GET['isbn'])) {
	$sql === 'SELECT * FROM books'? $sql .= ' WHERE isbn LIKE "%' . $_GET['isbn'] . '%"': $sql .= ' AND isbn LIKE "%' . $_GET['isbn'] . '%"';
} 
if (!empty($_GET['name'])) {
	$sql === 'SELECT * FROM books'? $sql .= ' WHERE name LIKE "%' . $_GET['name'] . '%"': $sql .= ' AND name LIKE "%' . $_GET['name'] . '%"';
}
if (!empty($_GET['author'])) {
	$sql === 'SELECT * FROM books'? $sql .= ' WHERE author LIKE "%' . $_GET['author'] . '%"': $sql .= ' AND author LIKE "%' . $_GET['author'] . '%"';
}
$utf = $book_db->query("SET NAMES 'utf8';");
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
<h1>Библиотека:</h1>
<form method="GET">
    <input type="text" name="isbn" placeholder="ISBN" value="<?=!empty($_GET['isbn'])?@$_GET['isbn']:'';?>"/>
    <input type="text" name="name" placeholder="Название книги" value="<?=!empty($_GET['name'])?@$_GET['name']:'';?>"/>
    <input type="text" name="author" placeholder="Автор книги" value="<?=!empty($_GET['author'])?@$_GET['author']:'';?>"/>
    <input type="submit" value="Поиск"/>
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
    foreach ($book_db->query($sql) as $row) {
        $row[] = $row;
        echo '<tr><td>' . $row['name'] . '</td>
	<td>' . $row['author'] . '</td>
	<td>' . $row['year'] . '</td>
	<td>' . $row['genre'] . '</td>
	<td>' . $row['isbn'] . '</td></tr>';
    }
    ?>
</table>
</html>
