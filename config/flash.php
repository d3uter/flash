<?php

/**
 * Created by PhpStorm.
 * User: Marek Pawłowski {marek.pawlowski@infogroup.pl}
 * Date: 15.06.18
 * Time: 13:20
 * Project: flash
 * File: flash.php
 */
return [
  'notifier'=> Laracasts\Flash\FlashNotifier::class,
  'class'=>[
      'success' =>'success',
      'error'   => 'error',
      'warning' => 'warning',
      'info' => 'info',
    ],
  'template' => [
      'message' => 'message',
      'modal' =>'modal'
  ]
];