<?php
$API_KEY = '637271484:AAEv2GBi-vMLKDSw_mxJGbZIMi1K8xbvkSQ';
$hook_url = 'https://khabar-arz.ml/water/set.php';
$hok="https://api.telegram.org/bot$API_KEY/setWebhook?url=$hook_url";
echo file_get_contents($hok);

?>
