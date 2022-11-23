<?php
$assinatura = $_POST['image'];
$assinatura = str_replace('data:image/png;base64,', '', $assinatura);
$assinatura = str_replace(' ', '+', $assinatura);
$data = base64_decode($assinatura);
file_put_contents(time().'.png', $data);
?>