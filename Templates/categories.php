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
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
        </ol>
    </nav>
    <div class="row gy-3 ">
			<?php
			
			foreach($categories as $category) :?> <!-- Toon alle categorieën -->
				<div class="col-sm-4 col-md-3">
					<div class="card">
						<div class="card-body text-center">
							<a href="/category/<?=$category->id?>">
								<img class="category-img img-responsive center-block" src='/img/categories/<?=$category->picture?>'/>
							</a>
							<div class="card-title mb-3"><?=$category->name?></div>
						</div>

					</div>
				</div>
			<?php endforeach;?>
    </div>

    <hr>
    <?php
    include_once('defaults/footer.php');

    ?>
</div>

</body>
</html>

