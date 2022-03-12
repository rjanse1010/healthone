<!DOCTYPE html>
    <html>
    <?php
    if(!userIsLoggedIn()) {
        header("Location: /login");
    }
    
    include_once('defaults/head.php');

    global $currentUser;
    ?>
    <body>
        <div class="container">
            <?php
            include_once ('defaults/header.php');
            include_once ('defaults/menu.php');
            include_once ('defaults/pictures.php');

            if(isset($_POST["submit"])) {
                editProfile($_SESSION["user_id"], $_POST["username"], $_POST["password"]);
                $currentUser = getUserById($_SESSION["user_id"]);
                echo "<p>Gegevens succesvol gewijzigd</p>";
            }
            ?>

            <h4>Profiel bewerken</h4>

            <form id="loginform" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Nieuwe username</label>
                    <input name="username" type="text" class="form-control" id="username" placeholder="je gebruikersnaam" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Nieuwe wachtwoord</label>
                    <input class="form-control password" name="password" type="password" id="password" placeholder="Wachtwoord" required></input>
                    <label for="show_password" class="form-label">Toon wachtwoord</label>
                    <input type="checkbox" id="show_password" onclick="togglePassword()">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Opslaan</button>
            </form>

            <script src="/js/main.js"></script>
            <hr>
            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
