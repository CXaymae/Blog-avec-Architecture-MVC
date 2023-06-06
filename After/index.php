<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"></link>
    <title>Mon Blog</title>
</head>
<body>
    <div id=global>
    <p>Bienvenue sur Mon blog.</p>
        <header>
            <a href="index.php"><h1 id="titreBlog">Mon Blog</h1></a>
        </header> 
    <div id="contenu">
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8',
        'root', '');
        $billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,'
        . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
        . ' order by BIL_ID desc');
        foreach ($billets as $billet): ?>
        <article>
            <header>
                 <!-- affichage abrégé </?= … ?> au lieu de </?php echo … ?>, -->
                <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
                    <time><?= $billet['date'] ?></time>
            </header>
            <p><?= $billet['contenu'] ?></p>
                <!-- ajouter à notre page une gestion minimaliste des erreurs 
                Le premier require inclut uniquement la définition d'une fonction et est placé en dehors du bloc try. Le reste du
                code est placé à l'intérieur de ce bloc. Si une exception est levée lors de son exécution, une page HTML minimale
                contenant le message d'erreur est affichée.-->
                <?php
                require 'Modele.php';
                try {
                    $billets = getBillets();
                    require 'vueAccueil.php';
                }
                catch (Exception $e) {
                echo '<html><body>Erreur ! ' . $e->getMessage() . '</body></html>';
                }
                ?>

                <?php
                require 'Modele.php';
                try {
                    $billets = getBillets();
                    require 'vueAccueil.php';
                }
                catch (Exception $e) {
                    $msgErreur = $e->getMessage();
                    require 'vueErreur.php';
                }
                ?>
        </article>
        <hr />

         <?php endforeach; ?>
        </div> <!-- #contenu -->
            <footer id="piedBlog">
            Blog modeste avec l'emploi de MVC.
            </footer>
    </div> <!-- #global -->
</body>
</html>     