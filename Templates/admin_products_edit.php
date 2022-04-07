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

            global $product;
            global $productId;

            if(isset($_POST["submit"])) {
                editProduct($productId, $_POST["category"], $_POST["name"], $_POST["desc"]);
                $product = getProduct($productId);
                ?>
                <div class="alert alert-success" role="alert">
                    Sportapparaat succesvol gewijzigd!
                </div>
            <?php } ?> <!--We sluiten de if af-->

            <h4>Adminpaneel / Sportapparaten / <?=$product->name?></h4>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Afbeelding</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Beschrijving</th>
                </tr>
                </thead>
                    <tr>
                        <td><?=$product->picture?></td>
                        <td><?=$product->name?></td>
                        <td><?=$product->category_id?></td>
                        <td><?=$product->description?></td>
                    </tr>
            </table>

            <form method="POST"> <!--action="upload.php" enctype="multipart/form-data"-->
                <!--<div class="mb-3">
                    <label for="file-upload">Kies afbeelding</label>
                    <br>
                    <input type="file" id="file-upload" name="uploadedfile"></input>
                </div>-->

                <div class="mb-3">
                    <label for="category" class="form-label">Nieuwe categorie</label>
                    <select class="form-select" name="category" id="category" aria-label="Default select example" required>
                        <?php
                        $selected1 = "";
                        $selected2 = "";
                        $selected3 = "";
                        $selected4 = "";
                        if($product->category_id == 1) {
                            $selected1 = " selected";
                        }
                        if($product->category_id == 2) {
                            $selected2 = " selected";
                        }
                        if($product->category_id == 3) {
                            $selected3 = " selected";
                        }
                        if($product->category_id == 4) {
                            $selected4 = " selected";
                        }
                        ?>
                        <option value="1"<?=$selected1?>>Roeitrainers</option>
                        <option value="2"<?=$selected2?>>Crosstrainers</option>
                        <option value="3"<?=$selected3?>>Hometrainers</option>
                        <option value="4"<?=$selected4?>>Loopbanden</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nieuwe naam</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="" value="<?=$product->name?>" required>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Nieuwe beschrijving</label>
                    <textarea class="form-control desc" name="desc" id="desc" placeholder="" required><?=$product->description?></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Wijziging doorvoeren</button>
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
