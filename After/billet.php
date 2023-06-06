<!--  Fichier contrôleur, billet.php, qui fait le lien entre modèle et vue pour répondre au nouveau 
besoin: : le clic sur le titre d'un
billet du blog doit afficher sur une nouvelle page le contenu et les commentaires associés à ce billet.. Elle a besoin de recevoir en paramètre l'identifiant du billet. -->
<?php
require 'Modele.php';
try {
if (isset($_GET['id'])) {
// intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
    $id = intval($_GET['id']);
    if ($id != 0) {
        $billet = getBillet($id);
        $commentaires = getCommentaires($id);
        require 'vueBillet.php';
    }
    else
        throw new Exception("Identifiant de billet incorrect");
}
else
    throw new Exception("Aucun identifiant de billet");
}
catch (Exception $e) {
$msgErreur = $e->getMessage();
require 'vueErreur.php';
}