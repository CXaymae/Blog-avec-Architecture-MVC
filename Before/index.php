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
    <div id=global></h1></a>
    <p>JJe vous souhaite la bienvenue sur ce modeste blog.</p>
        <header>
            <a href="index.php"><h1 id="titreBlog">Mon Blog
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
        </article>
        <hr />
         <?php endforeach; ?>
        </div> <!-- #contenu -->
        <footer id="piedBlog">
        Blog réalisé avec PHP, HTML5 et CSS.
        </footer>
        </div> <!-- #global -->
    </body>
</html>     