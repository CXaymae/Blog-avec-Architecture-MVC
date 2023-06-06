<!-- Affichage à l'utilisateur -->


<?php $titre = 'Mon Blog'; ?>
<!-- e utilise la fonction PHP ob_start. Son rôle est de déclencher la mise en tampon du flux
HTML de sortie : au lieu d'être envoyé au navigateur, ce flux est stocké en mémoire ;
3 La suite du code (boucle foreach) génère les balises HTML article associées aux billet. Le flux
HTML créé est mis en tampon ; -->
<?php ob_start(); ?>
<?php foreach ($billets as $billet): ?>

<article>
    <header>
        <a href="<?= "billet.php?id=" . $billet['id'] ?>">
        <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
        </a>
        <time><?= $billet['date'] ?></time>
    </header>

    <p><?= $billet['contenu'] ?></p>
</article>
<hr />

<?php endforeach; ?>
<!-- la fonction PHP ob_get_clean permet de récupérer dans une variable le flux de
sortie mis en tampon depuis l'appel à ob_start. La variable se nomme ici $contenu, ce qui permet de définir
l'élément spécifique associé ; -->
<?php $contenu = ob_get_clean(); ?>
<!-- on déclenche le rendu du template. Lors du rendu, les valeurs des éléments spécifiques $titre et
$contenu seront insérés dans le résultat HTML envoyé au navigateur. -->
<?php require 'template.php'; ?>