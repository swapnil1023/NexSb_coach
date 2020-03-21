<?php

//connect to database

$conn = mysqli_connect("localhost","pradyuman","pradyuman","nexsb_coach");

//check the database connection
if(!$conn)
{
    echo "Connection error". mysqli_connect_error();
}

//query to get all pizza from pizzas table
$sql = "SELECT title,ingredients FROM pizzas ORDER BY created_at";

//make qeury and get result
$result = mysqli_query($conn, $sql);

//fetch the rows as an array;
$pizzas= mysqli_fetch_all($result,MYSQLI_ASSOC);

print_r($pizzas);

//free result from memory
mysqli_free_result($result);
//close connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<body>
    <div>
        <ul>
            <?php foreach($pizzas as $pizza){ ?>
            
                <li><?php echo $pizza["title"];?></li>
            <?php }?>            
        
        <ul>
    </div>

</body>
</html>