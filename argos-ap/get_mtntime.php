<?php
    require_once('../mtn.php');
    if ($site_config['maintenance'] && isset($site_config['maintenance_start'])) {
        $duration = time() - $site_config['maintenance_start'];
        $mtntime = gmdate('H:i:s', $duration);
    } else {
        $mtntime =  '00:00:00';
    }
    echo $mtntime;
?>
