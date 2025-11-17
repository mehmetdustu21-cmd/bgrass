<?php return array (
  'Archos' => 
  array (
    'regex' => 'Archos.*GAMEPAD([2]?)',
    'device' => 'console',
    'model' => 'Gamepad $1',
  ),
  'Microsoft' => 
  array (
    'regex' => 'Xbox',
    'device' => 'console',
    'models' => 
    array (
      0 => 
      array (
        'regex' => 'Xbox Series X',
        'model' => 'Xbox Series X',
      ),
      1 => 
      array (
        'regex' => 'Xbox One X',
        'model' => 'Xbox One X',
      ),
      2 => 
      array (
        'regex' => 'Xbox One',
        'model' => 'Xbox One',
      ),
      3 => 
      array (
        'regex' => 'XBOX_ONE_ED',
        'model' => 'Xbox One S',
      ),
      4 => 
      array (
        'regex' => 'Xbox',
        'model' => 'Xbox 360',
      ),
    ),
  ),
  'Nintendo' => 
  array (
    'regex' => 'Nintendo (([3]?DS[i]?)|Wii[U]?|Switch|GameBoy)',
    'device' => 'console',
    'model' => '$1',
  ),
  'OUYA' => 
  array (
    'regex' => 'OUYA',
    'device' => 'console',
    'model' => 'OUYA',
  ),
  'Sanyo' => 
  array (
    'regex' => 'Aplix_SANYO',
    'device' => 'console',
    'model' => '3DO TRY',
  ),
  'Sega' => 
  array (
    'regex' => 'Dreamcast|Aplix_SEGASATURN',
    'device' => 'console',
    'models' => 
    array (
      0 => 
      array (
        'regex' => 'Dreamcast',
        'model' => 'Dreamcast',
      ),
      1 => 
      array (
        'regex' => 'Aplix_SEGASATURN',
        'model' => 'Saturn',
      ),
    ),
  ),
  'JXD' => 
  array (
    'regex' => 'JXD_S601WIFI',
    'device' => 'console',
    'model' => 'S601 WiFi',
  ),
  'Sony' => 
  array (
    'regex' => '(?:PlayStation ?(4 Pro|[2-5]|Portable|Vita)|sony_tv;ps5;|\\(PS3\\))',
    'device' => 'console',
    'models' => 
    array (
      0 => 
      array (
        'regex' => 'sony_tv;ps5;',
        'model' => 'PlayStation 5',
      ),
      1 => 
      array (
        'regex' => 'PlayStation 4 PRO',
        'model' => 'PlayStation 4 Pro',
      ),
      2 => 
      array (
        'regex' => '\\(PS3\\)',
        'model' => 'PlayStation 3',
      ),
      3 => 
      array (
        'regex' => 'PlayStation ?(4 Pro|[2-5]|Portable|Vita)',
        'model' => 'PlayStation $1',
      ),
    ),
  ),
  'Retroid Pocket' => 
  array (
    'regex' => 'Retroid Pocket',
    'device' => 'console',
    'models' => 
    array (
      0 => 
      array (
        'regex' => 'Pocket ([23]) ?(?:Plus|\\+)',
        'model' => '$1 Plus',
      ),
      1 => 
      array (
        'regex' => 'Pocket 4 Pro',
        'model' => '4 Pro',
      ),
      2 => 
      array (
        'regex' => 'Pocket ([235])',
        'model' => '$1',
      ),
    ),
  ),
);