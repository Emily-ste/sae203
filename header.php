<header>
    <nav class="navbar navbar-expand-lg navbar-dark mx-lg-5 mx-sm-3">
        <div class="container-fluid">
            <a class="navbar-brand" style="font-family: 'Satisfy', cursive;" href="/">Wrapped</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listing.php">Liste</a>
                    </li>
                    <li class="nav-item" id="searchButton">
                        <a data-bs-toggle="collapse" href="#collapseSearch" class="nav-link" href="">Rechercher</a>
                        <div class="collapse" id="collapseSearch"> 
                        <form method="GET" action="reponse_recherche.php" data-parsley-validate>
                            <input type="text" name="album" id="" placeholder="Recherche">
                            <select class="formInput" name="artist">
                                <option value="">Tous les artistes</option>
                                <?php
                                $mabd = connexion();
                                $req = "SELECT nom_artist FROM artists";
                                $resultat = $mabd->query($req);
                                foreach ($resultat as $value) {
                                    $v = str_replace(' ', '+',$value['nom_artist']);
                                    echo '<option value='.$v.'>'.ucwords($value['nom_artist']).'</option>';
                                }
                                ?>
                            </select>
                            <button type="submit" class="bi bi-search" id="submit"></button>
                        </form>
                        </div>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="admin/admin.php">Admin</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
</header>
