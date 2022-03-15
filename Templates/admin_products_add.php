<!DOCTYPE html>
    <html>
    <?php

    if(!userIsLoggedIn() || !$currentUser->is_admin) {
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

            <h4>Adminpaneel / Sportapparaten / Toevoegen</h4>
            <?php 
            if(isset($_POST["submit"])):?>
                <div class="alert alert-success" role="alert">
                    Openingstijden op succesvol gewijzigd!
                </div>
                <?php 
                /*saveDay($dayId, $_POST["opening"], $_POST["closing"]);
                $day = getDay($dayId);*/
            endif; ?>

            <form method="POST" action="upload.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="file-upload">Kies afbeelding</label>
                    <br>
                    <input type="file" id="file-upload" name="uploadedfile"></input>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Categorie</label>
                    <select class="form-select" name="category" id="category" aria-label="Default select example" required>
                        <option value="1" selected>Roeitrainers</option>
                        <option value="2">Crosstrainers</option>
                        <option value="3">Hometrainers</option>
                        <option value="4">Loopbanden</option>
                    </select>
                </div>
            
                <div class="mb-3">
                    <label for="username" class="form-label">Naam</label>
                    <input name="username" type="text" class="form-control" id="username" placeholder="" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Beschrijving</label>
                    <textarea class="form-control password" name="password" type="password" id="password" placeholder="" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Toevoegen</button>
                <a href="/admin/products" class="btn btn-primary">Annuleren</a>
            </form>
            <br>
            <hr>
            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
