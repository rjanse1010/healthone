<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>

<body>

<div class="container">
	
    <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');

    
    global $product; //product
    global $productId; //product id
    global $currentUser;
    $catId = $product->category_id; //category name
    $catName = getCategoryName($catId); //category name

    if(isset($_POST["submit"]) && userIsLoggedIn()) {
        $fUserId = $_SESSION["user_id"];
        $fTitle = $_POST["title"];
        $fContent = $_POST["content"];
        $fRating = $_POST["rating"];
//        var_dump($fName);
//        var_dump($fTitle);
//        var_dump($fContent);
//        var_dump($fRating);
        if($fRating >= 1 && $fRating <= 5) {
            saveReview($fUserId, $fTitle, $fContent, $fRating, $productId);
        } else {
            echo "<script>alert('Je beoordeling is te laag of te hoog! Kies 1 tot 5 sterren');</script><p class='text-danger'></p>";
        }
    }

    $reviews=getReviews($productId);
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
			<li class="breadcrumb-item"><a href="/category/<?=$catId?>"><?=$catName?></a></li>
			<li class="breadcrumb-item"><a href="/product/<?=$productId?>"><?=$product->name?></a></li>
        </ol>
    </nav>
	<div class="row gy-3 ">
        <img class="product-details-img img-fluid" src="/img/categories/<?=$product->picture?>" />

        <?php
        echo "<h2>" . $product->name . " <small class='text-secondary'>in categorie " . $catName . "</small></h2><br>";
        echo "<p>" . $product->description . "</p><br>";
        echo "<h3>Reviews</h3>";

        $rating = getAverageRating($productId);
        $ratingRound = floor($rating);
        
        if($rating == null) {
            echo "<p>Er zijn nog geen reviews, ";
            if(!userIsLoggedIn()) {
                echo "log in om feedback achter te laten.</p>";
            } else {
                echo "laat hieronder jouw feedback achter.</p>";
            }
        } else {
            for($i = 0; $i < $ratingRound; $i++) :?> <!-- We gebruiken hier ratingRound omdat we niet door halve nummers (decimalen) kunnen gaan in een loop. In het geval dat er een halve ster bijmoet, doen we die er straks apart weer bij.-->
                <img class="product-rating img-fluid" src="/img/star.png" />
            <?php endfor;
            if($rating != $ratingRound) { // In het geval dat er een halve ster bijmoet; dan is de afgeronde rating namelijk anders dan de echte rating met .5
                echo "<img class='product-rating img-fluid' src='/img/star_half.png' />";
            }
            
            echo "<p>Gebruikers geven dit apparaat $rating ster(ren).</p>";

            foreach($reviews as $review) :?>
                <div class="col-sm-4 col-md-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <?php for($i = 0; $i < $review->rating; $i++) :?> <!--Toon het aantal sterren -->
                                <img class="product-rating img-fluid" src="/img/star.png" />
                                <?php if($i >= 4) break; //Toon nooit meer dan 5 sterren
                            endfor; ?>
                            <hr>
                            <h5 class="card-title mb-3"><?=$review->title?></h5>
                            <p class="card-text">“<?=$review->text?>” - <?=getUserById($review->user_id)->username?></p>
                            
                        </div>

                    </div>
                </div>
            <?php endforeach;
        }



        if(userIsLoggedIn()):?>

        <div class="col-sm-4 col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-file-plus"></i> Review toevoegen
                    </a>
                </div>

            </div>
        </div>

        <!-- Button trigger modal -->
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Review toevoegen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="reviewform" method="post">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Naam</label>
                            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Pieter Henk" required disabled value="<?=$currentUser->username?>">
                        </div>
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Titel</label>
                            <input class="form-control" name="title" type="text" id="name" placeholder="Bijvoorbeeld: heel degelijk apparaat" required></input>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Inhoud</label>
                            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Geef hier jouw beoordeling van het apparaat in" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label">Beoordeling</label>
                            <select class="form-select" name="rating" id="rating" aria-label="Default select example" required>
                            <option value="1">1 ster</option>
                            <option value="2">2 sterren</option>
                            <option value="3" selected>3 sterren</option>
                            <option value="4">4 sterren</option>
                            <option value="5">5 sterren</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuleren</button>
                    <button type="submit" name="submit" form="reviewform" class="btn btn-primary">Opslaan</button>
                </div>
                </div>
            </div>
        </div>

        <?php endif; ?>
	
	</div>

    <hr>
    <?php
    include_once('defaults/footer.php');

    ?>
</div>

</body>
</html>

