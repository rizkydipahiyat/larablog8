<?php


/**
 * Helper ini berfungsi untuk link menu aktif pada sidebar
 * setelah membuat helper jangan lupa menuju ke composer.json
 * dan setting autoload
 * setelah selesai lakukan dump autoload pada terminal
 * sekarang gunakan set_active pada sidebar
 */
if (!function_exists('set_active')) {
   function set_active($uri, $output = 'active')
   {
      if (is_array($uri)) {
         foreach ($uri as $u) {
            if (Route::is($u)) {
               return $output;
            }
         }
      } else {
         # code...
         if (Route::is($uri)) {
            return $output;
         }
      }
   }
}
