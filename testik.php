<?php
$name = $_POST['sirname'];
$email = $_POST['email'];
$text_message = $_POST['message'];

$db=mysqli_connect("localhost", "root","");
mysql_select_db("feedback")

$sql = "INSERT INTO feedback(name, email, message) VALUES ('$name', '$email', '$text_message')";
$result=mysqli_query($db,$sql) or die("Ошибка в запросе!".mysqli_error($db));

header("Location: ".$_SERVER["HTTP_REFERER"]);
?>

$sql="SELECT name, email, message FROM feedback";
$result=mysqli_query($db,$sql);

while ($line=mysqli_fetch_row($result)) {
echo "<b>Имя:</b>".$line[0]."<br>";
echo "<b>Email:</b>".$line[1]."<br>";
echo "<b>Сообщение:</b>".$line[2]."<br>";
}

$comment = $result->fetch_assoc();
	do{echo "<div class='comment' style='border: 1px solid gray; margin-top: 1%; border-radius: 5px; padding: 0.5%;'>Автор: <strong>".$comment['sirname']."</strong><br>".$comment['message']."</div>";

		 }while($comment = $result->fetch_assoc());
?>