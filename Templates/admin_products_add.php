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
                <?php
                $catName = strtolower(getCategoryName($_POST["category"]));
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/public/img/categories/" . strtolower(getCategoryName($_POST["category"]) . "/");
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        //echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                        ?>
                        <div class="alert alert-success" role="alert">
                            Product succesvol toegevoegd!
                        </div>
                        <?php
                        addProduct($_POST["category"], strtolower(getCategoryName($_POST["category"])) . "/" . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])), $_POST["name"], $_POST["desc"]);
                    } else {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Product kon niet worden toegevoegd, controleer de afbeelding!
                        </div>
                        <?php
                    }
                }
                /*saveDay($dayId, $_POST["opening"], $_POST["closing"]);
                $day = getDay($dayId);*/
            endif; ?>

            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="fileToUpload">Kies afbeelding</label>
                    <br>
                    <input type="file" id="fileToUpload" name="fileToUpload"></input>
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
                    <label for="name" class="form-label">Naam</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="" required>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Beschrijving</label>
                    <textarea class="form-control" name="desc" id="desc" placeholder="" required></textarea>
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
