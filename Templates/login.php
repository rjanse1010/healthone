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
                // if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
                $validated = validateUser($_POST["username"], $_POST["password"]);
                if($validated) {
                    $_SESSION['user_id'] = $validated;
                } else {
                    echo "<span class='text-danger'>De ingevoerde gebruikersnaam en/of het wachtwoord kloppen niet</span>";
                }
                // }
            }


            if(userIsLoggedIn()) {
                header('Location: /member');
            }
            ?>
			
            <form id="loginform" method="post">
                <div class="form-head"><h3>Login</h3></div>
                <?php 
                if(isset($_SESSION["errorMessage"])) {
                ?>
                <div class="error-message"><?php  echo $_SESSION["errorMessage"]; ?></div>
                <?php 
                unset($_SESSION["errorMessage"]);
                } 
                ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input name="username" type="text" class="form-control" id="exampleFormControlInput1" placeholder="je gebruikersnaam" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input class="form-control" name="password" type="password" id="password" placeholder="Wachtwoord" required></input>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </form>

            <p>TEST</p>
            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
