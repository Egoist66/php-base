<?php

/**
 * Dump data to the screen for debugging purposes.
 *
 * @param mixed $data The data to be dumped.
 * @param bool $print
 */
function dump(mixed $data, bool $print = true): void
{
   if($print) {
       echo '<pre style="font-size: 18px; background-color: #000; color: #fff;padding: 10px;margin-bottom: 0px;">';
       print_r($data);
       echo '</pre>';
   }
   else {
       echo '<pre style="font-size: 18px; background-color: #000; color: #fff;padding: 10px;margin-bottom: 0px;">';
       var_dump($data);
       echo '</pre>';
       die();

   }


}