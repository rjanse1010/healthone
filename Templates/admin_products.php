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

            <h4>Adminpaneel / Sportapparaten</h4>
            <?php
                echo "WIP";
                $days = getTimes();
                foreach($days as $day):?>
                    
                <?php endforeach;
            ?>
            <br>
            <hr>
            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
