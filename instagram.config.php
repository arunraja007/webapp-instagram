<?php
// Setup class
  $instagram = new Instagram(array(
    'apiKey'      => '8a8f7a3fc1654e64824f88a929a8e103',
    'apiSecret'   => 'e22cdb693f3c47feb33353e84ea201d7',
    'apiCallback' => 'http://localhost/instagram/success.php' // must point to success.php
  ));

?>