<!DOCTYPE html>
    <html>
    <?php
    include_once('defaults/head.php');
    ?>
    <body>
        <div class="container">
            <?php
            include_once ('defaults/header.php');
            include_once ('defaults/menu.php');
            include_once ('defaults/pictures.php');

            if(isset($_POST["submit"])) {
                $validatedRegister = registerUser($_POST["username"], $_POST["password"]);
                if($validatedRegister) { //Als de gebruiker succesvol geregistreerd is, loggen we meteen in
                    $validatedLogin = validateUser($_POST["username"], $_POST["password"]);
                    if($validatedLogin) {
                        $_SESSION['user_id'] = $validatedLogin;
                    } else {
                        echo "<span class='text-danger'>Er kon niet worden ingelogd met de gebruikersnaam " . $_POST["username"] . "</span>";
                    }
                } else {
                    echo "<span class='text-danger'>Er bestaat al een gebruiker met de gebruikersnaam " . $_POST["username"] . "</span>"; //Als de gebruiker al bestaat, error
                }
                // }
            }


            if(userIsLoggedIn()) {
                header('Location: /member');
            }
            ?>
			
            <form id="loginform" method="post">
                <div class="form-head"><h3>Registreren</h3></div>
                <?php 
                if(isset($_SESSION["errorMessage"])) {
                ?>
                <div class="error-message"><?php  echo $_SESSION["errorMessage"]; ?></div>
                <?php 
                unset($_SESSION["errorMessage"]);
                } 
                ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Gebruikersnaam</label>
                    <input name="username" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Je gebruikersnaam" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Wachtwoord</label>
                    <input class="form-control" name="password" type="password" id="password" placeholder="Wachtwoord" required></input>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Registreer</button>
            </form>

            <p>TEST</p>
            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
