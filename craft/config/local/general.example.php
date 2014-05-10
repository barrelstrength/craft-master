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
	
	// Have Craft send ALL emails to a single address
	// 'testToEmailAddress'	=> '',

	// Some settings helpful for debugging 
	// 'phpMaxMemoryLimit'          	=> '256M',
	// 'backupDbOnUpdate'            => true,
	// 'translationDebugOutput'     	=> false,
	// 'useCompressedJs'            	=> true,
	// 'cacheDuration'              	=> 'P1D',

	// Make member login settings nice and trusting
	// http://www.php.net/manual/en/dateinterval.construct.php
	'userSessionDuration'           => 'P101Y',
	'rememberedUserSessionDuration' => 'P101Y',
	'rememberUsernameDuration'      => 'P101Y',
	'invalidLoginWindowDuration'    => 'P101Y',
	'cooldownDuration'              => 'PT1S',
	'maxInvalidLogins'              => 101,
	
);