<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'xy');

/** MySQL database username */
define('DB_USER', 'xy');

/** MySQL database password */
define('DB_PASSWORD', 'admin');

/** MySQL hostname */
define('DB_HOST', 'db');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         'Pe1rrd?X7<-#jQtbr5h1#&&bna?P!/NJ3bLE:Mnc|Li!5 d$X#[8EiTsYp|vcf#l');
define('SECURE_AUTH_KEY',  '=QzK7 A fAO7T$0*=p+H %Jl+;pMcJNLr,?|79@cH_6SCbE `droDc~`eh?O`KFL');
define('LOGGED_IN_KEY',    'G#Qa f{067b358uZG!h,seJ}Q%S7Fe0klwV4I]=Q+hCml4kddDQmrf~JCj M D:Y');
define('NONCE_KEY',        'j?&UiM|)TzWL-L|>FZVeQv)64+~]Bm*58Ff@m`Mz3Ay:)S,TWXp#?I2Q&*Q&F!;a');
define('AUTH_SALT',        'l+AscCj`chC5,;2tn0QNihL<1&Ja2Q?=-m;>@EgKlKZC?KG_LPM9vWj/}G2 c^>_');
define('SECURE_AUTH_SALT', '/YMJk(%LaP|dzoZy[)P`d;a&~_svBL7HmkO9U0l/.HbnBs}aw1Gbw*9O{l4LE.pJ');
define('LOGGED_IN_SALT',   '1yC+5x|`i?b^1;fZSdd05 %-vyVF>- A{H9X)nR_Q$,vUb}1!-6V}OvSmMBa~2OW');
define('NONCE_SALT',       'O%BFhf&+ds}[j,C9*T><6T&Vjbhk%E>Di|2rL_|1[mu?LFSE04+prqsMeGnhHr),');


define('WP_HOME','http://127.0.0.1:8000');
define('WP_SITEURL','http://127.0.0.1:8000');

$table_prefix  = 'wp_';



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


