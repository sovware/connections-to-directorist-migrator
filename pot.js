const wpPot = require('wp-pot');
 
wpPot({
  destFile: './languages/connections-to-directorist-migrator.pot',
  domain: 'connections-to-directorist-migrator',
  package: 'Directorist Migrator',
  src: './**/*.php'
});