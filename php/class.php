<?php

class maintenance {
   private static $maintenance_mode;

   public static function activateMaintenance() {
    // activer le mode maintenance
    self::$maintenance_mode = true;
  }

  public static function deactivateMaintenance() {
    // désactiver le mode maintenance
    self::$maintenance_mode = false;
  }

  public static function displayMaintenancePage() {
    // afficher la page de maintenance
    include 'maintenance.php';
    exit();
  }
}

?>
