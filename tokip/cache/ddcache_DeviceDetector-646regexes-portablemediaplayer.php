<?php return array (
  'Apple' => 
  array (
    'regex' => '(?:Apple-)?iPod',
    'device' => 'portable media player',
    'models' => 
    array (
      0 => 
      array (
        'regex' => '(?:Apple-)?iPod1[C,_]?1',
        'model' => 'iPod Touch 1G',
      ),
      1 => 
      array (
        'regex' => '(?:Apple-)?iPod2[C,_]?1',
        'model' => 'iPod Touch 2G',
      ),
      2 => 
      array (
        'regex' => '(?:Apple-)?iPod3[C,_]?1',
        'model' => 'iPod Touch 3',
      ),
      3 => 
      array (
        'regex' => '(?:Apple-)?iPod4[C,_]?1',
        'model' => 'iPod Touch 4',
      ),
      4 => 
      array (
        'regex' => '(?:Apple-)?iPod5[C,_]?1',
        'model' => 'iPod Touch 5',
      ),
      5 => 
      array (
        'regex' => '(?:Apple-)?iPod7[C,_]?1',
        'model' => 'iPod Touch 6',
      ),
      6 => 
      array (
        'regex' => '(?:Apple-)?iPod9[C,_]?1|iPodTouch7',
        'model' => 'iPod Touch 7',
      ),
      7 => 
      array (
        'regex' => '(?:Apple-)?iPod',
        'model' => 'iPod Touch',
      ),
    ),
  ),
  'Cowon' => 
  array (
    'regex' => 'COWON ([^;/]+) Build',
    'device' => 'portable media player',
    'model' => '$1',
  ),
  'FiiO' => 
  array (
    'regex' => 'FiiO',
    'device' => 'portable media player',
    'models' => 
    array (
      0 => 
      array (
        'regex' => 'M11 Plus LTD',
        'model' => 'M11 Plus LTD',
      ),
      1 => 
      array (
        'regex' => 'FiiO M(11S|1[157]|6)',
        'model' => 'M$1',
      ),
    ),
  ),
  'Microsoft' => 
  array (
    'regex' => 'Microsoft ZuneHD',
    'device' => 'portable media player',
    'model' => 'Zune HD',
  ),
  'Panasonic' => 
  array (
    'regex' => '(SV-MV100)',
    'device' => 'portable media player',
    'model' => '$1',
  ),
  'Samsung' => 
  array (
    'regex' => 'YP-(G[SIPB]?1|G[57]0|GB70D)',
    'device' => 'portable media player',
    'models' => 
    array (
      0 => 
      array (
        'regex' => 'YP-G[B]?1',
        'model' => 'Galaxy Player 4.0',
      ),
      1 => 
      array (
        'regex' => 'YP-G70',
        'model' => 'Galaxy Player 5.0',
      ),
      2 => 
      array (
        'regex' => 'YP-GS1',
        'model' => 'Galaxy Player 3.6',
      ),
      3 => 
      array (
        'regex' => 'YP-GI1',
        'model' => 'Galaxy Player 4.2',
      ),
      4 => 
      array (
        'regex' => 'YP-GP1',
        'model' => 'Galaxy Player 5.8',
      ),
      5 => 
      array (
        'regex' => 'YP-G50',
        'model' => 'Galaxy Player 50',
      ),
      6 => 
      array (
        'regex' => 'YP-GB70D',
        'model' => 'Galaxy Player 70 Plus',
      ),
    ),
  ),
  'Wizz' => 
  array (
    'regex' => '(DV-PTB1080)(?:[);/ ]|$)',
    'device' => 'portable media player',
    'model' => '$1',
  ),
  'Shanling' => 
  array (
    'regex' => 'Shanling M6',
    'device' => 'portable media player',
    'models' => 
    array (
      0 => 
      array (
        'regex' => 'Shanling (M6\\(21\\))',
        'model' => '$1',
      ),
    ),
  ),
  'Sylvania' => 
  array (
    'regex' => '(SLTDVD102[34])',
    'device' => 'portable media player',
    'model' => '$1',
  ),
  'KuGou' => 
  array (
    'regex' => 'KuGou[_ -](P5)',
    'device' => 'portable media player',
    'model' => '$1',
  ),
  'Surfans' => 
  array (
    'regex' => '(Y57A)(?:[);/ ]|$)',
    'device' => 'portable media player',
    'model' => '$1',
  ),
  'Oilsky' => 
  array (
    'regex' => 'Oilsky (M501|M303)(?:-Pro)?(?:[);/ ]|$)',
    'device' => 'portable media player',
    'models' => 
    array (
      0 => 
      array (
        'regex' => 'M303-Pro',
        'model' => 'M303 Pro',
      ),
      1 => 
      array (
        'regex' => '(M501|M303)',
        'model' => '$1',
      ),
    ),
  ),
  'Diofox' => 
  array (
    'regex' => 'Diofox[ _](M8|M10|M508)(?:[);/ ]|$)',
    'device' => 'portable media player',
    'model' => '$1',
  ),
  'MECHEN' => 
  array (
    'regex' => 'MECHEN',
    'device' => 'portable media player',
    'models' => 
    array (
      0 => 
      array (
        'regex' => 'MECHEN[- _]([^;/)]+)[- _]Pro(?: Build|[);])',
        'model' => '$1 Pro',
      ),
      1 => 
      array (
        'regex' => 'MECHEN[- _]([^;/)]+)(?: Build|[);])',
        'model' => '$1',
      ),
    ),
  ),
);