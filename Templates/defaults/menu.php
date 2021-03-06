<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            Sportcenter
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/home">home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categories">sportapparaten</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php
                if(isset($_SESSION["user_id"])) {
                    echo "<li class='nav-item'><a class='nav-link' href='/member'>profiel</a></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='/logout'>uitloggen</a></li>";
                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='/register'>registreren</a></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='/login'>inloggen</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>