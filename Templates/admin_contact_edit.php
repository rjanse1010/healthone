<!DOCTYPE html>
    <html>
    <?php
    global $currentUser;
    global $dayId;
    global $day;

    if(!userIsLoggedIn() || !$currentUser->is_admin) {
        header("Location: /login");
    }

    if($day == null) {
        header("Location: /admin/contact");
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

            <h4>Adminpaneel / Contact / <?=$day->name?></h4>
            <?php 
            if(isset($_POST["submit"])):?>
                <div class="alert alert-success" role="alert">
                    Openingstijden op <?=strtolower($day->name)?> succesvol gewijzigd!
                </div>
                <?php 
                saveDay($dayId, $_POST["opening"], $_POST["closing"]);
                $day = getDay($dayId);
            endif; ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Opening</th>
                        <th scope="col">Sluiting</th>
                    </tr>
                </thead>
                <tr>
                    <td><?=$day->time_open?></td>
                    <td><?=$day->time_close?></td>
                </tr>
            </table>

            <form id="editday" method="post">
                <div class="mb-3">
                    <label for="opening" class="form-label">Nieuwe openingstijd</label>
                    <input name="opening" type="time" class="form-control" id="opening" required></input>
                </div>
                <div class="mb-3">
                    <label for="closing" class="form-label">Nieuwe sluitingstijd</label>
                    <input name="closing" type="time" class="form-control closing" id="closing" required></input>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Opslaan</button>
                <a href="/admin/contact" class="btn btn-primary">Terug naar overzicht</a>
            </form>
            <br>
            <hr>
            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
