<!DOCTYPE html>
    <html>
    <?php
    if(!isset($_SESSION["user_id"])) {
        header("Location: /login");
    }
    
    include_once('defaults/head.php');
    ?>
    <body>
        <div class="container">
            <?php
            include_once ('defaults/header.php');
            include_once ('defaults/menu.php');
            include_once ('defaults/pictures.php');
            ?>

            <h4>Member</h4>
            <?php
                $currentUser = getUserById($_SESSION["user_id"]);
                echo "Je bent ingelogd als: " . $currentUser->username;
                echo "<br>Je bent " . ($currentUser->is_admin?"admin":"reguliere gebruiker");

            ?>
            <hr>
            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
