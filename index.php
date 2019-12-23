<?php include "database.php"; ?>
<?php
    $query = "SELECT * FROM shouts ORDER BY id DESC";
    $shouts = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>SHOUT IT!</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <div id="container">
            <header>
                <h1>SHOUT IT! ShoutBox</h1>
            </header>
            <div id="shouts">
                <ul>
                    <?php while($row = mysqli_fetch_assoc($shouts)) : ?>
                        <li class="shout"><span><?php echo $row['time'] ?> - </span>
                            <strong><?php echo $row['user'] ?></strong> : <?php echo $row['message'] ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <div id="input">
                <?php if(isset($_GET['error'])) : ?>
                    <div class="error">
                        <?php echo $_GET['error']; ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="process.php">
                    <input type="text" name="name" placeholder="Enter your Name"  />
                    <input type="text" name="message" placeholder="Enter your Message" /><br />
                    <input class="shout-btn" type="submit" name="submit" value="Shout It Out" />
                </form>
            </div>
        </div>
    </body>
</html>
