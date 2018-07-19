<?php
/**
 * Local Config Override
 * 
 * Overrides added here will get appended to the end of the
 * custom config array for all environments: '*'
 */

return [
	'devMode'          => true,
	'allowAutoUpdates' => true,
  // 'backupDbOnUpdate' => false,
  // 'phpMaxMemoryLimit' => '1G',

  // Send emails that use the Craft Email Service to this address
  // 'testToEmailAddress' => '',

  // Make it easier to login
  // http://www.php.net/manual/en/dateinterval.construct.php
  'elevatedSessionDuration'       => 'P101Y',
  'userSessionDuration'           => 'P101Y',
  'rememberedUserSessionDuration' => 'P101Y',
  'rememberUsernameDuration'      => 'P101Y',
  'invalidLoginWindowDuration'    => 'P101Y',
  'cooldownDuration'              => 'PT1S',
  'maxInvalidLogins'              => 101,
];
