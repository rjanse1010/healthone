<!DOCTYPE html>
    <html>
    <?php
    global $currentUser;
    global $productId;
    global $product;

    if(!userIsLoggedIn() || !$currentUser->is_admin) {
        header("Location: /login");
    }

    if($product == null) {
        header("Location: /admin/products");
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

            <h4>Adminpaneel / Sportapparaten / <?=$product->name?> verwijderen</h4>
            <?php 
            if(isset($_POST["submit"])):?>
                <div class="alert alert-success" role="alert">
                    Sportapparaat succesvol verwijderd!
                </div>
                <a href="/admin/products" class="btn btn-primary">Terug naar overzicht</a>
                <?php 
                deleteProduct($productId);
            else:?>
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

                <form id="editday" method="post">
                    <label for="submit" class="form-label">Weet je zeker dat je dit apparaat wilt verwijderen? Dit kan niet ongedaan worden gemaakt.</label>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary">Ga door</button>
                    <a href="/admin/products" class="btn btn-primary">Annuleer</a>
                </form>
            <?php endif; ?>
            <br>
            <hr>
            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
