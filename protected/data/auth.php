<?php
return array (
  'user' => 
  array (
    'type' => 2,
    'description' => 'Can only post questions',
    'bizRule' => '',
    'data' => '',
  ),
  'teacher' => 
  array (
    'type' => 2,
    'description' => 'Can answer questions',
    'bizRule' => '',
    'data' => '',
  ),
  'admin' => 
  array (
    'type' => 2,
    'description' => 'Can read a post and post a comment',
    'bizRule' => '',
    'data' => '',
    'children' => 
    array (
      0 => 'teacher',
      1 => 'user',
    ),
  ),
);
