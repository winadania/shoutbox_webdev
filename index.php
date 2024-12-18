<html>
    <head>
        <title>ShoutBox</title>
    </head>
<body>
    <form action="send.php" method="post"> 
        <label for="shout">Message:</label>
        <textarea name="shout" maxlength="300" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Shout!">
    </form>

    <?php
    // Connect to the database
    require_once("connection.php");

    // Retrieve all the shouts
    $result = mysqli_query($link, "SELECT * FROM shouts ORDER BY shout_date DESC") 
        or die(mysqli_error($link));

    // Loop through results and display
    while ($data = mysqli_fetch_assoc($result)) {
        $text = htmlspecialchars($data['shout_text']);
        $date = htmlspecialchars($data['shout_date']);
        echo "<p><strong>$date</strong>: $text</p>";
    }
    ?>
</body>
</html>
