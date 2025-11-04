<?php
// Récupération des données JSON
$data = json_decode(file_get_contents("php://input"), true);

$amount = $data['amount'];
$phone = $data['phone'];
$network = $data['network'];
$message = $data['message'];

// Destinataire
$to = "moladis@outlook.fr";
$subject = "Nouveau dépôt Mikosell";

// Corps du mail
$body = "Nouvelle transaction déposée:\n\n";
$body .= "Montant: $amount FCFA\n";
$body .= "Numéro: $phone\n";
$body .= "Réseau: $network\n";
$body .= "Message reçu: $message\n";

// Headers
$headers = "From: mikosell@pro.com\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Envoi du mail
if(mail($to, $subject, $body, $headers)){
    echo json_encode(['success'=>true]);
} else {
    echo json_encode(['success'=>false]);
}
?>

