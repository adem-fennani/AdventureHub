<?php
include '../Controller/ProduitC.php';

$ProduitC = new Produit(config::getConnexion());

try {
    $ProduitC->deleteProduit($_GET["id"]);
    header('Location:ListProduit.php');
} catch (PDOException $e) {
    echo 'Error deleting product: ' . $e->getMessage();
}
?>
