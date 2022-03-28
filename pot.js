const wpPot = require('wp-pot');
 
wpPot({
  destFile: './languages/drectorist-migrator.pot',
  domain: 'drectorist-migrator',
  package: 'Directorist Migrator',
  src: './**/*.php'
});