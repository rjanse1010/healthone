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
			
			$currentDay = date("N", strtotime(date("l"))); //Get number of current day of the week from 1 to 7
            $days = getTimes();
            ?>
			
			<p>We zijn momenteel te bereiken via info@healthone.com. Tevens zijn we telefonisch bereikbaar via 015-2578924.</p>
			
			<h4>Openingstijden</h4>
            <!-- <ul class="list-group ">
			  <li class="list-group-item d-flex justify-content-between align-items-center">Maandag <span class="badge bg-success rounded-pill">Geopend van 07:00u tot 20:00u</span></li>
			  <li class="list-group-item d-flex justify-content-between align-items-center">Dinsdag <span class="badge bg-success rounded-pill">Geopend van 08:00u tot 20:00u</span></li>
			  <li class="list-group-item d-flex justify-content-between align-items-center">Woensdag <span class="badge bg-success rounded-pill">Geopend van 07:00u tot 20:00u</span></li>
			  <li class="list-group-item d-flex justify-content-between align-items-center">Donderdag <span class="badge bg-success rounded-pill">Geopend van 08:00u tot 20:00u</span></li>
			  <li class="list-group-item d-flex justify-content-between align-items-center">Vrijdag <span class="badge bg-success rounded-pill">Geopend van 07:00u tot 20:30u</span></li>
			  <li class="list-group-item d-flex justify-content-between align-items-center">Zaterdag <span class="badge bg-success rounded-pill">Geopend van 08:00u tot 13:00u</span></li>
			  <li class="list-group-item rounded-0 d-flex justify-content-between align-items-center">Zondag <span class="badge bg-success rounded-pill">Geopend van 08:00u tot 13:00u</span></li>
			</ul> -->

            <ul class="list-group ">
                <?php
                foreach($days as $day):?>
                    <?php
                    $openTime = date('G:i', strtotime($day->time_open)); //We halen de seconden eruit (vanwege het datatype TIME in de database)
                    $closeTime = date('G:i', strtotime($day->time_close));
                    ?>
                    <li class="list-group-item rounded-0 d-flex justify-content-between align-items-center <?=$currentDay==($day->id + 1)?'active':''?>"><?=$day->name?> <span class="badge bg-success rounded-pill">Geopend van <?=$openTime?>u tot <?=$closeTime?>u</span></li>
                <?php endforeach; ?> <!-- De klasse 'active' wordt toegevoegd als het de huidige dag is, om deze dag blauw te markeren (via bootstrap). -->
            </ul>
			
			<div style="width: 100%"><iframe scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=300&amp;hl=nl&amp;q=Zuidhoornseweg%206a,%202635%20DJ%20Den%20Hoorn+(HealthOne)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="300" frameborder="0"><a href="https://www.mapsdirections.info/nl/cirkel-straal-kaart/">Cirkel op kaart Google</a></iframe></div>

            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
