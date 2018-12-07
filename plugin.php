<?php
 $admins = [
  68038310,
];
$listplugins = [
  "ping"
];
$cplug = count($listplugins) - 1;
for($n=0; $n<=$cplug; $n++) {
  $pluginlist = "plugins/".$listplugins[$n].".php";
  include($pluginlist);
}
unlink("MadelineProto.log");







