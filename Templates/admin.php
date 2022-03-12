<!DOCTYPE html>
    <html>
    <?php
    global $currentUser;
    
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

            <h4>Adminpaneel</h4>
            <p>Kies een pagina om te bewerken of in te zien</p>
            <a href="/admin/products" class="btn btn-primary">Sportapparaten</a>
            <br><br>
            <a href="/admin/contact" class="btn btn-primary">Contact</a>
            <br>
            <hr>
            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
