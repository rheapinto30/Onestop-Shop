<!--not used -->
<form method="post">
    <input type="textbox" name="str" required />
    <input type="submit" name="submit" value="Search" />
</form>

<?php
include('db.php');
if (isset($_POST['submit'])) {
    $str = mysqli_real_escape_string($con, $_POST['str']);
    $sql = "select product_title,product_desc,product_keywords from news where product_title '%$str%' or product_desc '%$str%'
	UNION
	select id, content as title, details,'page' from page where content 
	like '%$str%' or content like '%$str%'";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<a href='result.php?id=" . $row['product_title'] . "&t=" . $row['product_desc'] . "'>" . $row['product_keywords'] . "</a>";
            echo "<br/>";
        }
    } else {
        echo "No data found";
    }
}
?>