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

            unset($_SESSION["user_id"]);
            if(isset($_SERVER['HTTP_REFERER'])) {
                header('Location: '.$_SERVER['HTTP_REFERER']);  
            } else {
                header('Location: /login');  
            }

            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
