<!DOCTYPE html>
    <html>
    <?php
    global $currentUser;
    
    if(!userIsLoggedIn() || !$currentUser->is_admin) {
        header("Location: /login");
    }
    
    include_once('defaults/head.php');

    $days = getTimes();
    ?>
    <body>
        <div class="container">
            <?php
            include_once ('defaults/header.php');
            include_once ('defaults/menu.php');
            include_once ('defaults/pictures.php');
            ?>

            <h4>Adminpaneel / Contact</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Opening</th>
                        <th scope="col">Sluiting</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <?php foreach($days as $day):?>
                    <tr>
                        <td><?=$day->name?></td>
                        <td><?=$day->time_open?></td>
                        <td><?=$day->time_close?></td>
                        <td><a href="contact/edit/<?=$day->id?>"><i class="bi bi-pencil-square"></i></a></td>
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
