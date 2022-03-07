<!DOCTYPE html>
    <html>
    <?php
    if(!userIsLoggedIn()) {
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
                global $currentUser;
                echo "Je bent ingelogd als: " . $currentUser->username;
                echo "<br>Je bent " . ($currentUser->is_admin?"admin":"reguliere gebruiker");

            ?>
            <br>
            <a href="/member/edit" class="btn btn-primary">Profiel bewerken</a>
            <hr>
            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
