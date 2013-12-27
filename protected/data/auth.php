<?php
return array (
  'user' => 
  array (
    'type' => 2,
    'description' => 'Can only post questions',
    'bizRule' => '',
    'data' => '',
    'assignments' => 
    array (
      3 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
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
