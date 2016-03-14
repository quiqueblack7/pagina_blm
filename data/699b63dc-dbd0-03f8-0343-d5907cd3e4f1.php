<?php
return array (
  'uuid' => '699b63dc-dbd0-03f8-0343-d5907cd3e4f1',
  'typeId' => '6',
  'recipients' => 'ventas@bestlightmexico.com.mx',
  'subject' => 'Formulario de contacto',
  'buttonText' => 'Enviar email',
  'reply' => 'Su mensaje ha sido enviado. Muchas gracias.',
  'type' => 'contact',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'name',
      'type' => 'textfield',
      'title' => 'Nombre',
      'required' => true,
    ),
    1 => 
    array (
      'name' => 'mail',
      'type' => 'email',
      'title' => 'Email',
      'required' => true,
    ),
    2 => 
    array (
      'name' => 'message',
      'type' => 'textarea',
      'title' => 'Mensaje',
      'required' => true,
    ),
  ),
  'badCaptcha' => 'El texto introducido no coincide con el texto proporcionado en la imagen.',
  'isPassCaptcha' => false,
);
?>