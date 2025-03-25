<?php
require 'config.php';
if (isset($_GET['center_id'])) {
  $center_id = (int) $_GET['center_id'];
    $stmt = $pdo->prepare("SELECT * FROM stations WHERE center_id = :center_id ORDER BY station_number");
      $stmt->execute(['center_id' => $center_id]);
        $stations = $stmt->fetchAll();
          $html = '<div class="list-group">';
            foreach ($stations as $station) {
                $html .= '<button type="button" class="list-group-item list-group-item-action" onclick="selectStation(' . $station['id'] . ', \'' . $station['station_number'] . '\')">محطة ' . $station['station_number'] . '</button>';
                  }
                    $html .= '</div>';
                      echo $html;
                      }
                      ?>