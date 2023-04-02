<?php
/*

---------------------------------------
Kirby Configuration For Localhost
---------------------------------------

*/

return [
  'environment' => 'local',
  'schnti.cachebuster.active' => false,
  'debug'  => true,
  'thumbs' => [
    'driver' => 'im',
    'bin' => '/usr/bin/convert'
  ]
];
