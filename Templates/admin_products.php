<!DOCTYPE html>
    <html>
    <?php
    global $currentUser;
    global $products;
    
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

            <h4>Adminpaneel / Sportapparaten</h4>
            <a href="/admin/products/add" class="btn btn-primary">Sportapparaat toevoegen</a>
            <?php
                //echo "WIP";
            ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Afbeelding</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Beschrijving</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <?php foreach($products as $product):
                    $desc = mb_substr($product->description, 0, 100, 'utf8');
                    if($desc != $product->description) {
                        $desc .= "…";
                    }
                    ?>
                    <tr>
                        <td><?=$product->picture?></td>
                        <td><?=$product->name?></td>
                        <td><?=$product->category_id?></td>
                        <td><?=$desc?></td>
                        <td><a class="text-black" href="products/edit/<?=$product->id?>"><i class="bi bi-pencil-square"></i></a></td>
                        <td><a class="text-black" href="products/delete/<?=$product->id?>"><i class="bi bi-trash"></i></a></td>
                    </tr>
                <?php endforeach;?>
            </table>
            <br>
            <hr>
            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
