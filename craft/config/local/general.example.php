<?php 

/**
 * Local Config Override
 * 
 * Overrides added here will get appended to the end of the 
 * custom config array for all environments: '*'
 */

return array(

	// Give us more useful error messages
  'devMode'	=> true,
	
	// Route ALL of the emails that Craft
  // sends to a single email address. 
  'testToEmailAddress'	=> '',

	'translationDebugOutput'     	=> false,
  'useCompressedJs'            	=> true,
  'cacheDuration'              	=> 'P1D',
  'cooldownDuration'           	=> 'PT5M',
  'maxInvalidLogins'           	=> 5,
  'invalidLoginWindowDuration' 	=> 'PT1H',
  'phpMaxMemoryLimit'          	=> '256M',

  // Member login info duration
  // http://www.php.net/manual/en/dateinterval.construct.php
  'userSessionDuration'           => 'P101Y',
  'rememberedUserSessionDuration' => 'P101Y',
  'rememberUsernameDuration'      => 'P101Y',

);