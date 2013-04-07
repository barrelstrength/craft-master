<?php

/**
 * Environment Configuration
 *
 */

return array(

  // Make debugging easier
  'devMode'                 => true,
  'translationDebugOutput'  => false,

  // Member login info duration
  // http://www.php.net/manual/en/dateinterval.construct.php
  'userSessionDuration'           => 'P101Y',
  'rememberedUserSessionDuration' => 'P101Y',
  'rememberUsernameDuration'      => 'P101Y',

);