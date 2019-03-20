<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"].'/pronote/APP/include/header.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/pronote/APP/pronote_management.php');

// Vérification des accès a la page
if(empty($_COOKIE['user']) || $_COOKIE['poste'] == 'ETU') {
    $erreur = new pronote_management();
    $erreur->setMessage('Vous n\'avez pas accès a cette page','index.php');
}else{
// Création d'un objet "Message" de type "pronote_management"
$Message = new pronote_management();
// Execution de la fonction getMessage
$Message->getMessage();

?>

<div class="offset-2 col-md-8 col-xs-2">
    <div class="form-area text-center">
        <form id="form-contact" method="POST" action="/pronote/traitement/absence/absence-traitement.php">
            <br>
            <h3 style="margin-bottom: 25px; text-align: center;">Formulaire d'absence</h3>
            <div class="form-group">
                <input type="date" id="start" name="dateabs" value="2019-02-21" min="2019-01-01" max="2019-12-31">
            </div>
            <input type="hidden" name="id_etu" value="<?php echo $_GET['id_etu']?>">
            <button type="submit" id="submit" name="submit" class="btn btn-primary">Ajouter l'absence</button>
        </form>
        <form>
            <input class="btn btn-secondary" type="button" value="Retour" onclick="history.go(-1)">
        </form>
    </div>
</div>
<?php
include($_SERVER["DOCUMENT_ROOT"].'/pronote/APP/include/footer.php');}
?>