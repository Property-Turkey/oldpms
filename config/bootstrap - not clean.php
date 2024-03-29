<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.8
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

/*
 * Configure paths required to find CakePHP + general filepath constants
 */
require __DIR__ . DIRECTORY_SEPARATOR . 'paths.php';

/*
 * Bootstrap CakePHP.
 *
 * Does the various bits of setup that CakePHP needs to do.
 * This includes:
 *
 * - Registering the CakePHP autoloader.
 * - Setting the default application paths.
 */
require CORE_PATH . 'config' . DS . 'bootstrap.php';

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Database\TypeFactory;
use Cake\Database\Type\StringType;
use Cake\Datasource\ConnectionManager;
use Cake\Error\ConsoleErrorHandler;
use Cake\Error\ErrorHandler;
use Cake\Http\ServerRequest;
use Cake\Log\Log;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Routing\Router;
use Cake\Utility\Security;

/*
 * See https://github.com/josegonzalez/php-dotenv for API details.
 *
 * Uncomment block of code below if you want to use `.env` file during development.
 * You should copy `config/.env.example` to `config/.env` and set/modify the
 * variables as required.
 *
 * The purpose of the .env file is to emulate the presence of the environment
 * variables like they would be present in production.
 *
 * If you use .env files, be careful to not commit them to source control to avoid
 * security risks. See https://github.com/josegonzalez/php-dotenv#general-security-information
 * for more information for recommended practices.
*/
// if (!env('APP_NAME') && file_exists(CONFIG . '.env')) {
//     $dotenv = new \josegonzalez\Dotenv\Loader([CONFIG . '.env']);
//     $dotenv->parse()
//         ->putenv()
//         ->toEnv()
//         ->toServer();
// }

/*
 * Read configuration file and inject configuration into various
 * CakePHP classes.
 *
 * By default there is only one configuration file. It is often a good
 * idea to create multiple configuration files, and separate the configuration
 * that changes from configuration that does not. This makes deployment simpler.
 */
try {
    Configure::config('default', new PhpConfig());
    Configure::load('app', 'default', false);
} catch (\Exception $e) {
    exit($e->getMessage() . "\n");
}

/*
 * Load an environment local configuration file to provide overrides to your configuration.
 * Notice: For security reasons app_local.php **should not** be included in your git repo.
 */
if (file_exists(CONFIG . 'app_local.php')) {
    Configure::load('app_local', 'default');
}

/*
 * When debug = true the metadata cache should only last
 * for a short time.
 */
if (Configure::read('debug')) {
    Configure::write('Cache._cake_model_.duration', '+2 minutes');
    Configure::write('Cache._cake_core_.duration', '+2 minutes');
    // disable router cache during development
    Configure::write('Cache._cake_routes_.duration', '+2 seconds');
}

/*
 * Set the default server timezone. Using UTC makes time calculations / conversions easier.
 * Check http://php.net/manual/en/timezones.php for list of valid timezone strings.
 */
date_default_timezone_set(Configure::read('App.defaultTimezone'));

/*
 * Configure the mbstring extension to use the correct encoding.
 */
mb_internal_encoding(Configure::read('App.encoding'));

/*
 * Set the default locale. This controls how dates, number and currency is
 * formatted and sets the default language to use for translations.
 */
ini_set('intl.default_locale', Configure::read('App.defaultLocale'));

/*
 * Register application error and exception handlers.
 */
$isCli = PHP_SAPI === 'cli';
if ($isCli) {
    (new ConsoleErrorHandler(Configure::read('Error')))->register();
} else {
    (new ErrorHandler(Configure::read('Error')))->register();
}

/*
 * Include the CLI bootstrap overrides.
 */
if ($isCli) {
    require CONFIG . 'bootstrap_cli.php';
}

/*
 * Set the full base URL.
 * This URL is used as the base of all absolute links.
 */
$fullBaseUrl = Configure::read('App.fullBaseUrl');
if (!$fullBaseUrl) {
    $s = null;
    if (env('HTTPS')) {
        $s = 's';
    }

    $httpHost = env('HTTP_HOST');
    if (isset($httpHost)) {
        $fullBaseUrl = 'http' . $s . '://' . $httpHost;
    }
    unset($httpHost, $s);
}
if ($fullBaseUrl) {
    Router::fullBaseUrl($fullBaseUrl);
}
unset($fullBaseUrl);

Cache::setConfig(Configure::consume('Cache'));
ConnectionManager::setConfig(Configure::consume('Datasources'));
TransportFactory::setConfig(Configure::consume('EmailTransport'));
Mailer::setConfig(Configure::consume('Email'));
Log::setConfig(Configure::consume('Log'));
Security::setSalt(Configure::consume('Security.salt'));

/*
 * Setup detectors for mobile and tablet.
 * If you don't use these checks you can safely remove this code
 * and the mobiledetect package from composer.json.
 */
ServerRequest::addDetector('mobile', function ($request) {
    $detector = new \Detection\MobileDetect();

    return $detector->isMobile();
});
ServerRequest::addDetector('tablet', function ($request) {
    $detector = new \Detection\MobileDetect();

    return $detector->isTablet();
});
/*
 * You can enable default locale format parsing by adding calls
 * to `useLocaleParser()`. This enables the automatic conversion of
 * locale specific date formats. For details see
 * @link https://book.cakephp.org/4/en/core-libraries/internationalization-and-localization.html#parsing-localized-datetime-data
 */
// \Cake\Database\TypeFactory::build('time')
//    ->useLocaleParser();
// \Cake\Database\TypeFactory::build('date')
//    ->useLocaleParser();
// \Cake\Database\TypeFactory::build('datetime')
//    ->useLocaleParser();
// \Cake\Database\TypeFactory::build('timestamp')
//    ->useLocaleParser();
// \Cake\Database\TypeFactory::build('datetimefractional')
//    ->useLocaleParser();
// \Cake\Database\TypeFactory::build('timestampfractional')
//    ->useLocaleParser();
// \Cake\Database\TypeFactory::build('datetimetimezone')
//    ->useLocaleParser();
// \Cake\Database\TypeFactory::build('timestamptimezone')
//    ->useLocaleParser();

// There is no time-specific type in Cake
TypeFactory::map('time', StringType::class);

/*
 * Custom Inflector rules, can be set to correctly pluralize or singularize
 * table, model, controller names or whatever other string is passed to the
 * inflection functions.
 */
//Inflector::rules('plural', ['/^(inflect)or$/i' => '\1ables']);
//Inflector::rules('irregular', ['red' => 'redlings']);
//Inflector::rules('uninflected', ['dontinflectme']);

Configure::write('gmapKey', 'AIzaSyD2EC1RqRSh1Rm6NC4_cMt2CHtrZBKzUTE');
Configure::write('AdminRoles', ['admin.root', 'admin.admin', 'admin.portfolio', 'admin.supervisor', 'admin.callcenter', 'admin.content']);
Configure::write('UserRoles', ['user.portfolio', 'user.agency', 'user.client', 'user.developer']);

Configure::write('roles', [
	'user.portfolio'=>'user.portfolio', 
	'user.agency'=>'user.agency', 
	'user.client'=>'user.client', 
	'user.developer'=>'user.developer', 
	'admin.content'=>'admin.content', 
	'admin.portfolio'=>'admin.portfolio', 
	'admin.callcenter'=>'admin.callcenter', 
	'admin.supervisor'=>'admin.supervisor', 
	'admin.admin'=>'admin.admin', 
	'admin.root'=>'admin.root', 
]);

Configure::write('languages', [3=>'tr', 1=>'en']);
Configure::write('languages_ids', ['tr'=>3, 'en'=>1]);
Configure::write('app_folder',  in_array(env('SERVER_NAME'), ['localhost', 'devzonia.com']) ? '/ptpms' : '' );
Configure::write('isLocal',  in_array(env('SERVER_NAME'), ['localhost']) ? true : false );
Configure::write('searchGroups', [1=>'language', 2=>'price', 3=>'keyword', 4=>'address', 5=>'specs', 6=>'features', 7=>'netspace', 8=>'grossspace', 9=>'monthlytax', 10=>'deposit']);
Configure::write('searchable', [1=>'properties', 2=>'projects']);
Configure::write('actionsName', ['getpassword'=>__('getpassword'), 'save'=>__('save'), 'save_new'=>__('insert'), 'update'=>__('update'), 'delete'=>__('delete'), 'login'=>__('login'), 'enable'=>__('enable'), 'disable'=>__('disable'), 'delimage'=>__('delimage')]);

Configure::write('clms', ['param_space', 'param_delivertype', 'param_deliverdate', 'param_totalunits', 'keyword', 'language_id', 'project_id', 'category_id', 'features_ids', 'property_title', 'property_desc', 'property_photos', 'property_price', 'property_oldprice', 'property_loc', 'adrs_country', 'adrs_city', 'adrs_region', 'adrs_district', 'adrs_street', 'adrs_block', 'adrs_no', 'param_netspace', 'param_grossspace', 'param_rooms', 'param_bedrooms', 'param_buildage', 'param_floors', 'param_floor', 'param_heat', 'param_bathrooms', 'param_balconies', 'param_isfurnitured', 'param_isresale', 'param_usestatus', 'param_monthlytax', 'param_payment', 'param_ownership', 'param_ownertype', 'param_deposit', 'seo_title', 'seo_keywords', 'seo_desc', 'stat_created', 'stat_updated', 'stat_views', 'stat_shares', 'rec_state', 'param_space', 'param_delivertype', 'param_deliverdate', 'param_totalunits', 'param_blocks', 'param_bldfloors', 'param_residential_units', 'param_commercial_units', 'param_unit_types', 'param_units_size_range', 'property_usp', 'property_currency']);

Configure::write('currencies', [4=>'GBP', 1=>'EUR', 2=>'USD', 3=>'TRY']);
Configure::write('currencies_icons', [4=>'£', 1=>'€', 2=>'$', 3=>'₺']);
Configure::write('roles_badge', [ 
	'user.portfolio'=> 0, 'user.agency'=> 1, 'user.client'=> 2, 'user.developer'=> 3, 'admin.content'=> 4,
	'admin.portfolio'=> 5, 'admin.callcenter'=> 6, 'admin.supervisor'=> 7, 'admin.admin'=> 8, 'admin.root'=> 9
]);

Configure::write('ROLES', [
	'admin.root'=>[//     (technical top level admin) 
		'categories'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'properties'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'projects'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'floorplans'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'offices'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'users'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'messages'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'logs'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'searchlogs'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'configs'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'sellers'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'developers'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],

		'proposals'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'histories'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],

	],
	'admin.admin'=>[//     (top level admin) 
		'categories'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],
		'properties'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'projects'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'floorplans'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'offices'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'users'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'messages'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>0],
		'logs'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],
		'searchlogs'=>['create'=>0, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'configs'=>['create'=>0, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],
		'sellers'=>['create'=>0, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],
		'developers'=>['create'=>0, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],

		'proposals'=>['create'=>0, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],
		'histories'=>['create'=>0, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],
	],
	'admin.supervisor'=>[//     (office manager, portfolio manager) 
		'categories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'properties'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],
		'projects'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],
		'floorplans'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'offices'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'users'=>['create'=>0, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'messages'=>['create'=>1, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'logs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'searchlogs'=>['create'=>0, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'configs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'sellers'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'developers'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],

		'proposals'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'histories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
	],
	'admin.portfolio'=>[//     (protfolio manager, portfolio owner) 
		'categories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'properties'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'projects'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],
		'floorplans'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'offices'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'users'=>['create'=>0, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'messages'=>['create'=>1, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'logs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'searchlogs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'configs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'sellers'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'developers'=>['create'=>1, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],

		'proposals'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>0],
		'histories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
	],
	'admin.callcenter'=>[//     (sales advizor) 
		'categories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'properties'=>['create'=>0, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'projects'=>['create'=>0, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'floorplans'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'offices'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'users'=>['create'=>0, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'messages'=>['create'=>1, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'logs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'searchlogs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'configs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'sellers'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'developers'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],

		'proposals'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>0],
		'histories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
	],
	'admin.content'=>[//     (ricky) 
		'categories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'properties'=>['create'=>0, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'projects'=>['create'=>0, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'floorplans'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'offices'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'users'=>['create'=>0, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'messages'=>['create'=>1, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'logs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'searchlogs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'configs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'sellers'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'developers'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],

		'proposals'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'histories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
	],
	'user.portfolio'=>[//     (third party, broker, individual) 
		'categories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'properties'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'projects'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'floorplans'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>0],
		'offices'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'users'=>['create'=>0, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'messages'=>['create'=>1, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'logs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'searchlogs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'configs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'sellers'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'developers'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],

		'proposals'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>0],
		'histories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
	],
	'user.agency'=>[//      (imtilak, etc..) 
		'categories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'properties'=>['create'=>0, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'projects'=>['create'=>0, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'floorplans'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'offices'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'users'=>['create'=>0, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'messages'=>['create'=>1, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'logs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'searchlogs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'configs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'sellers'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'developers'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],

		'proposals'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'histories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
	],
	'user.client'=>[//      (end user, services consumer like tenant) 
		'categories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'properties'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'projects'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'floorplans'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>0],
		'offices'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'users'=>['create'=>0, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'messages'=>['create'=>1, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'logs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'searchloos'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'configs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'sellers'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'developers'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],

		'proposals'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'histories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
	],
	'user.developer'=>[//     (constructions companies) 
		'categories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'properties'=>['create'=>0, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'projects'=>['create'=>0, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'floorplans'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'offices'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'users'=>['create'=>0, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'messages'=>['create'=>1, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'logs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'searchlogs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'configs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'sellers'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'developers'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],

		'proposals'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'histories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
	],
]);

// last_category_id = 937
// countries range from 1300-1542

/////////////////////////////////////////////////////////////////////////////
//////////////////////////// COUNTRIES //////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
$countries_categories = [
	1300=>'Afghanistan',
	1301=>'Åland Islands',
	1302=>'Albania',
	1303=>'Algeria',
	1304=>'American Samoa',
	1305=>'AndorrA',
	1306=>'Angola',
	1307=>'Anguilla',
	1308=>'Antarctica',
	1309=>'Antigua and Barbuda',
	1310=>'Argentina',
	1311=>'Armenia',
	1312=>'Aruba',
	1313=>'Australia',
	1314=>'Austria',
	1315=>'Azerbaijan',
	1316=>'Bahamas',
	1317=>'Bahrain',
	1318=>'Bangladesh',
	1319=>'Barbados',
	1320=>'Belarus',
	1321=>'Belgium',
	1322=>'Belize',
	1323=>'Benin',
	1324=>'Bermuda',
	1325=>'Bhutan',
	1326=>'Bolivia',
	1327=>'Bosnia and Herzegovina',
	1328=>'Botswana',
	1329=>'Bouvet Island',
	1330=>'Brazil',
	1331=>'British Indian Ocean Territory',
	1332=>'Brunei Darussalam',
	1333=>'Bulgaria',
	1334=>'Burkina Faso',
	1335=>'Burundi',
	1336=>'Cambodia',
	1337=>'Cameroon',
	1338=>'Canada',
	1339=>'Cape Verde',
	1340=>'Cayman Islands',
	1341=>'Central African Republic',
	1342=>'Chad',
	1343=>'Chile',
	1344=>'China',
	1345=>'Christmas Island',
	1346=>'Cocos (Keeling) Islands',
	1347=>'Colombia',
	1348=>'Comoros',
	1349=>'Congo',
	1350=>'Congo, The Democratic Republic of the',
	1351=>'Cook Islands',
	1352=>'Costa Rica',
	1353=>'Cote D\'Ivoire',
	1354=>'Croatia',
	1355=>'Cuba',
	1356=>'Cyprus',
	1357=>'Czech Republic',
	1358=>'Denmark',
	1359=>'Djibouti',
	1360=>'Dominica',
	1361=>'Dominican Republic',
	1362=>'Ecuador',
	1363=>'Egypt',
	1364=>'El Salvador',
	1365=>'Equatorial Guinea',
	1366=>'Eritrea',
	1367=>'Estonia',
	1368=>'Ethiopia',
	1369=>'Falkland Islands (Malvinas)',
	1370=>'Faroe Islands',
	1371=>'Fiji',
	1372=>'Finland',
	1373=>'France',
	1374=>'French Guiana',
	1375=>'French Polynesia',
	1376=>'French Southern Territories',
	1377=>'Gabon',
	1378=>'Gambia',
	1379=>'Georgia',
	1380=>'Germany',
	1381=>'Ghana',
	1382=>'Gibraltar',
	1383=>'Greece',
	1384=>'Greenland',
	1385=>'Grenada',
	1386=>'Guadeloupe',
	1387=>'Guam',
	1388=>'Guatemala',
	1389=>'Guernsey',
	1390=>'Guinea',
	1391=>'Guinea-Bissau',
	1392=>'Guyana',
	1393=>'Haiti',
	1394=>'Heard Island and Mcdonald Islands',
	1395=>'Holy See (Vatican City State)',
	1396=>'Honduras',
	1397=>'Hong Kong',
	1398=>'Hungary',
	1399=>'Iceland',
	1400=>'India',
	1401=>'Indonesia',
	1402=>'Iran, Islamic Republic Of',
	1403=>'Iraq',
	1404=>'Ireland',
	1405=>'Isle of Man',
	1406=>'Israel',
	1407=>'Italy',
	1408=>'Jamaica',
	1409=>'Japan',
	1410=>'Jersey',
	1411=>'Jordan',
	1412=>'Kazakhstan',
	1413=>'Kenya',
	1414=>'Kiribati',
	1415=>'Korea, Democratic People\'S Republic of',
	1416=>'Korea, Republic of',
	1417=>'Kuwait',
	1418=>'Kyrgyzstan',
	1419=>'Lao People\'S Democratic Republic',
	1420=>'Latvia',
	1421=>'Lebanon',
	1422=>'Lesotho',
	1423=>'Liberia',
	1424=>'Libyan Arab Jamahiriya',
	1425=>'Liechtenstein',
	1426=>'Lithuania',
	1427=>'Luxembourg',
	1428=>'Macao',
	1429=>'Macedonia, The Former Yugoslav Republic of',
	1430=>'Madagascar',
	1431=>'Malawi',
	1432=>'Malaysia',
	1433=>'Maldives',
	1434=>'Mali',
	1435=>'Malta',
	1436=>'Marshall Islands',
	1437=>'Martinique',
	1438=>'Mauritania',
	1439=>'Mauritius',
	1440=>'Mayotte',
	1441=>'Mexico',
	1442=>'Micronesia, Federated States of',
	1443=>'Moldova, Republic of',
	1444=>'Monaco',
	1445=>'Mongolia',
	1446=>'Montserrat',
	1447=>'Morocco',
	1448=>'Mozambique',
	1449=>'Myanmar',
	1450=>'Namibia',
	1451=>'Nauru',
	1452=>'Nepal',
	1453=>'Netherlands',
	1454=>'Netherlands Antilles',
	1455=>'New Caledonia',
	1456=>'New Zealand',
	1457=>'Nicaragua',
	1458=>'Niger',
	1459=>'Nigeria',
	1460=>'Niue',
	1461=>'Norfolk Island',
	1462=>'Northern Mariana Islands',
	1463=>'Norway',
	1464=>'Oman',
	1465=>'Pakistan',
	1466=>'Palau',
	1467=>'Palestinian Territory, Occupied',
	1468=>'Panama',
	1469=>'Papua New Guinea',
	1470=>'Paraguay',
	1471=>'Peru',
	1472=>'Philippines',
	1473=>'Pitcairn',
	1474=>'Poland',
	1475=>'Portugal',
	1476=>'Puerto Rico',
	1477=>'Qatar',
	1478=>'Reunion',
	1479=>'Romania',
	1480=>'Russian Federation',
	1481=>'RWANDA',
	1482=>'Saint Helena',
	1483=>'Saint Kitts and Nevis',
	1484=>'Saint Lucia',
	1485=>'Saint Pierre and Miquelon',
	1486=>'Saint Vincent and the Grenadines',
	1487=>'Samoa',
	1488=>'San Marino',
	1489=>'Sao Tome and Principe',
	1490=>'Saudi Arabia',
	1491=>'Senegal',
	1492=>'Serbia and Montenegro',
	1493=>'Seychelles',
	1494=>'Sierra Leone',
	1495=>'Singapore',
	1496=>'Slovakia',
	1497=>'Slovenia',
	1498=>'Solomon Islands',
	1499=>'Somalia',
	1500=>'South Africa',
	1501=>'South Georgia and the South Sandwich Islands',
	1502=>'Spain',
	1503=>'Sri Lanka',
	1504=>'Sudan',
	1505=>'Suriname',
	1506=>'Svalbard and Jan Mayen',
	1507=>'Swaziland',
	1508=>'Sweden',
	1509=>'Switzerland',
	1510=>'Syrian Arab Republic',
	1511=>'Taiwan, Province of China',
	1512=>'Tajikistan',
	1513=>'Tanzania, United Republic of',
	1514=>'Thailand',
	1515=>'Timor-Leste',
	1516=>'Togo',
	1517=>'Tokelau',
	1518=>'Tonga',
	1519=>'Trinidad and Tobago',
	1520=>'Tunisia',
	1521=>'Turkey',
	1522=>'Turkmenistan',
	1523=>'Turks and Caicos Islands',
	1524=>'Tuvalu',
	1525=>'Uganda',
	1526=>'Ukraine',
	1527=>'United Arab Emirates',
	1528=>'United Kingdom',
	1529=>'United States',
	1530=>'United States Minor Outlying Islands',
	1531=>'Uruguay',
	1532=>'Uzbekistan',
	1533=>'Vanuatu',
	1534=>'Venezuela',
	1535=>'Viet Nam',
	1536=>'Virgin Islands, British',
	1537=>'Virgin Islands, U.S.',
	1538=>'Wallis and Futuna',
	1539=>'Western Sahara',
	1540=>'Yemen',
	1541=>'Zambia',
	1542=>'Zimbabwe',
];
Configure::write('COUNTRIES_CATEGORIES', $countries_categories);

$usp_categories = [
	909=>"Unique port view",	
	910=>"Great investment deal",
	911=>"Wide interface",
	912=>"Big backyard",
	913=>"High end finishing",
	914=>"Luxury area",	
	915=>"Active market",
	916=>"Easy accessible",
	917=>"High walls",
	918=>"Family friendly environment",
	919=>"Peaceful place",
	920=>"Historical",
];
Configure::write('USP_CATEGORIES', $usp_categories);

/////////////////////////////////////////////////////////////////////////////
//////////////////////////// PROJS //////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

$proj_categories = [
	800=>"commercials",	
	801=>"homes",
	921=>"mix_homes_and_commercials",
];
Configure::write('PROJ_CATEGORIES', $proj_categories);

$proj_specs = [
	"main"=>[
		803=>"param_delivertype",
		802=>"param_space",
		804=>"param_deliverdate",
		805=>"param_totalunits",
		858=>"param_blocks",
		867=>"param_bldfloors",
		868=>"param_residential_units",
		869=>"param_commercial_units",
		870=>"param_unit_types",
		871=>"param_units_size_range",
	],
	803=>[
		855=>"deliver_immediate",
		856=>"deliver_underbuild",
		857=>"param_offplan",
	],
	870=>[
		922=>"room_studio",
		923=>"room_1_1",
		924=>"room_1.5_1",
		925=>"room_2_0",
		926=>"room_2_1",
		874=>"room_2.5_1",
		875=>"room_2_2",
		876=>"room_3_1",
		877=>"room_3.5_1",
		878=>"room_3_2",
		879=>"room_4_0",
		880=>"room_4_1",
		881=>"room_4.5_1",
		882=>"room_4_2",
		883=>"room_4_3",
		884=>"room_4_4",
		885=>"room_5_1",
		886=>"room_5_2",
		887=>"room_5_3",
		888=>"room_5_4",
		889=>"room_6_1",
		890=>"room_6_2",
		891=>"room_6_3",
		892=>"room_6_4",
		893=>"room_7_1",
		894=>"room_7_2",
		895=>"room_7_3",
		896=>"room_8_1",
		897=>"room_8_2",
		898=>"room_8_3",
		899=>"room_8_4",
		900=>"room_9_1",
		901=>"room_9_2",
		902=>"room_9_3",
		903=>"room_9_4",
		904=>"room_9_5",
		905=>"room_9_6",
		906=>"room_10_1",
		907=>"room_10_2",
		908=>"more_than_10",
		928=>"duplex",
	]
];
Configure::write('PROJ_SPECS', $proj_specs);

$proj_features = [
	"main"=>[
		806=>"security",
		810=>"extras",
		812=>"schooling",
		817=>"kitchen",
		819=>"health",
		825=>"sociality",
		834=>"social_facilities",
		843=>"building_features",
		851=>"transportation",
	],
	// security
	806=>[
		807=>"security_24hours",
		808=>"security_night_guard",
		809=>"security_monitoring_cameras",
		866=>"security_intercom",
	],
	// extras
	810=>[
		811=>"extra_garden",
		864=>"extra_indoor_parking",
		865=>"extra_outdoor_parking",
	],
	// schooling
	812=>[
		813=>"school_nursery",
		814=>"school_kindergarten",
		815=>"school_elementary",
		816=>"school_high",
	],
	// kitchen
	817=>[
		818=>"kitchen_treatment",
	],
	// health
	819=>[
		820=>"health",
		821=>"health_center",
		822=>"health_polyclinic",
		823=>"health_pharmacy",
		824=>"health_veterinary",
	],
	// socialities
	825=>[	
		826=>"social_entertainment_center",
		827=>"social_gym",
		828=>"social_park",
		829=>"social_restaurant",
		830=>"social_cafe_bar",
		831=>"social_cinema",
		832=>"social_bicycle_track", 
		833=>"social_library",
	],
	// facilities
	834=>[
		835=>"facility_tennis",
		836=>"facility_fitness",
		837=>"facility_pool",
		838=>"facility_basketball",
		839=>"facility_volleyball",
		840=>"facility_walking_track",
		841=>"facility_squash_hall",
		842=>"facility_spa",
	],
	// building features
	843=>[
		844=>"bldfeature_booster",
		845=>"bldfeature_generator",
		846=>"bldfeature_parking_closed",
		847=>"bldfeature_parking_guests",
		848=>"bldfeature_sound_insulation",
		849=>"bldfeature_water_depot",
		850=>"bldfeature_lightning",
	],
	// transportation
	851=>[
		852=>"trans_public",
		853=>"trans_highway",
		854=>"trans_freebus",
	]
];
Configure::write('PROJ_FEATURES', $proj_features);
Configure::write('PROP_FACILITIES', $proj_features);

/////////////////////////////////////////////////////////////////////////////
//////////////////////////// PROPS //////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
$prop_categories = [
	100=>"apartment",
	101=>"villa",
	102=>"commercial",
	103=>"land",
	104=>"hotel",
];
Configure::write('PROP_CATEGORIES', $prop_categories);

$prop_specs = [
	"main"=>[
		468=>"param_isresale",
		471=>"param_iscitizenship",
		110=>"param_rooms",
		151=>"param_buildage",
		163=>"param_floors",	
		194=>"param_floor",	
		237=>"param_heat",
		253=>"param_bathrooms",
		262=>"param_balconies",	
		265=>"param_isfurnitured",
		268=>"param_usestatus",		
		108=>"param_netspace",
		109=>"param_grossspace",
		286=>"param_ownertype",
		931=>"param_titledeed",
		// 272=>"param_monthlytax",	
		// 273=>"param_payment",	
		280=>"param_ownership",
		// 291=>"param_deposit",
		// 292=>"param_bedrooms",
		929=>"param_isresidence",
		930=>"param_iscommission_included",

		// 'param_payment', 'param_ownership', 'param_deposit', 'param_bedrooms', 'param_ownertype', 'param_monthlytax'
	],
	//"param_rooms"
	110=>[
		111=>"room_studio",
		112=>"room_1_1",
		113=>"room_1.5_1",
		114=>"room_2_0",
		115=>"room_2_1",
		116=>"room_2.5_1",
		117=>"room_2_2",
		118=>"room_3_1",
		119=>"room_3.5_1",
		120=>"room_3_2",
		121=>"room_4_0",
		122=>"room_4_1",
		123=>"room_4.5_1",
		124=>"room_4_2",
		125=>"room_4_3",
		126=>"room_4_4",
		127=>"room_5_1",
		128=>"room_5_2",
		129=>"room_5_3",
		130=>"room_5_4",
		131=>"room_6_1",
		132=>"room_6_2",
		133=>"room_6_3",
		134=>"room_6_4",
		135=>"room_7_1",
		136=>"room_7_2",
		137=>"room_7_3",
		138=>"room_8_1",
		139=>"room_8_2",
		140=>"room_8_3",
		141=>"room_8_4",
		142=>"room_9_1",
		143=>"room_9_2",
		144=>"room_9_3",
		145=>"room_9_4",
		146=>"room_9_5",
		147=>"room_9_6",
		148=>"room_10_1",
		149=>"room_10_2",
		150=>"more_than_10",
		927=>"duplex",
	],
	//"param_buildage"
	151=>[	
		152=>"age_0",
		153=>"age_1",
		154=>"age_2",
		155=>"age_3",
		156=>"age_4",
		157=>"age_5_10",
		158=>"age_11_15",
		159=>"age_16_20",
		160=>"age_21_25",
		161=>"age_26_30",
		162=>"more_than_30"
	],
	//"param_floors"
	163=>[	
		164=>"floors_1",
		165=>"floors_2",
		166=>"floors_3",
		167=>"floors_4",
		168=>"floors_5",
		169=>"floors_6",
		170=>"floors_7",
		171=>"floors_8",
		172=>"floors_9",
		173=>"floors_10",
		174=>"floors_11",
		175=>"floors_12",
		176=>"floors_13",
		177=>"floors_14",
		178=>"floors_15",
		179=>"floors_16",
		180=>"floors_17",
		181=>"floors_18",
		182=>"floors_19",
		183=>"floors_20",
		184=>"floors_21",
		185=>"floors_22",
		186=>"floors_23",
		187=>"floors_24",
		188=>"floors_25",
		189=>"floors_26",
		190=>"floors_27",
		191=>"floors_28",
		192=>"floors_29",
		193=>"floors_more_than_30",
	],
	//"param_floor"
	194=>[		
		207=>"floor_1",
		208=>"floor_2",
		209=>"floor_3",
		210=>"floor_4",
		211=>"floor_5",
		212=>"floor_6",
		213=>"floor_7",
		214=>"floor_8",
		215=>"floor_9",
		216=>"floor_10",
		217=>"floor_11",
		218=>"floor_12",
		219=>"floor_13",
		220=>"floor_14",
		221=>"floor_15",
		222=>"floor_16",
		223=>"floor_17",
		224=>"floor_18",
		225=>"floor_19",
		226=>"floor_20",
		227=>"floor_21",
		228=>"floor_22",
		229=>"floor_23",
		230=>"floor_24",
		231=>"floor_25",
		232=>"floor_26",
		233=>"floor_27",
		234=>"floor_28",
		235=>"floor_29",
		195=>"floor_minus_4",
		196=>"floor_minus_3",
		197=>"floor_minus_2",
		198=>"floor_minus_1",
		199=>"floor_basement",
		200=>"floor_ground",
		201=>"floor_garden",
		202=>"floor_enterance",
		203=>"floor_upper_enterance",
		204=>"floor_independent",
		205=>"floor_villa",
		206=>"floor_top",
		236=>"floor_more_than_30",
	],
	//"param_heat"
	237=>[		
		238=>"heat_no",
		239=>"heat_fireplace",
		240=>"heat_gas",
		241=>"heat_ground_heater",
		242=>"heat_central",
		243=>"heat_centeral_shared",
		244=>"heat_combi",
		245=>"heat_underground_heater",
		246=>"heat_air_conditioning",
		247=>"heat_ancoil_unit",
		248=>"heat_solar",
		249=>"heat_geothermal",
		250=>"heat_grate_firepalce",
		251=>"heat_vrv",
		252=>"heat_hover",
	],
	//"param_bathrooms"
	253=>[		
		254=>"bath_no",
		255=>"bath_1",
		256=>"bath_2",
		257=>"bath_3",
		258=>"bath_4",
		259=>"bath_5",
		260=>"bath_6",
		261=>"bath_more_than_6",
	],
	//"param_balconies"
	262=>[		
		263=>"balcony_no",
		264=>"balcony_1",
		936=>"balcony_2",
		937=>"balcony_3_and_more",
	],
	//"param_isfurnitured"
	265=>[		
		266=>"furnitured_no",
		267=>"furnitured_yes",
	],
	//"param_usestatus"
	268=>[
		269=>"usage_empty",
		270=>"usage_tanent",
		271=>"usage_owner",
	],
	//"param_payment"
	273=>[	
		274=>"pay_upfront",
		275=>"pay_minimum_percentage",
		276=>"pay_installment_months_commision",
		277=>"pay_commission_percentage",
		278=>"pay_net_plus_structure",
		279=>"pay_net_by_seller",
	],
	//"param_ownership"
	280=>[		
		281=>"ownership_biuldings",
		282=>"ownership_upper_ground",
		283=>"ownership_share",
		284=>"ownership_ground",
		285=>"ownership_unkonwn",
	],
	//"param_ownertype"
	286=>[		
		// 287=>"from_owner",
		// 288=>"from_office",
		// 289=>"from_developer",
		// 290=>"from_bank",
		859=>"seller_landowner",	
		860=>"seller_project_mananger",
		861=>"seller_individual",
		862=>"seller_office",
		863=>"seller_bank",
		863=>"seller_agency",
	],
	//"param_bedrooms"
	292=>[		
		293=>"bed_0",
		294=>"bed_1",
		295=>"bed_2",
		296=>"bed_3",
		297=>"bed_4",
		298=>"bed_5",
		299=>"bed_more_than_5",
	],
	//"param_isresale"
	468=>[		
		469=>"resale_no",
		470=>"resale_yes",
	],
	//"param_iscitizenship"
	471=>[		
		472=>"cbi_no",
		473=>"cbi_yes",
	],
	// "param_isresidence"
	929=>[		
		932=>"isresidence_no",
		933=>"isresidence_yes",
	],
	// "param_iscommission_included"
	930=>[		
		934=>"iscommission_included_no",
		935=>"iscommission_included_yes",
	],
	// "param_titledeed" 
];
Configure::write('PROP_SPECS', $prop_specs);

$prop_features = [
	"main"=>[
		300=>"direction",
		305=>"internal_features",
		361=>"external_features",
		386=>"around",
		409=>"transportation",
		430=>"view",
		438=>"house_type", 
		454=>"accessbility_for_disabled_people",
		// 921=>"facilities"
	],
	//"direction"
	300=>[
		301=>"west",
		302=>"east",
		303=>"south",
		304=>"north",
	],
	//"internal_features"
	305=>[
		306=>"adsl",
		307=>"woodwork",
		308=>"smart_house",
		309=>"alarm_thief",
		310=>"alarm_fire",
		311=>"turkish_toilet",
		312=>"aluminum_joinery",
		313=>"american_door",
		314=>"american_kitchen",
		315=>"built_in_oven",
		316=>"lift",
		317=>"barbecue",
		318=>"household_appliances",
		319=>"painted",
		320=>"dishwasher",
		321=>"refrigerator",
		322=>"washing_machine",
		323=>"dryer_machine",
		324=>"laundry_room",
		325=>"steel_door",
		326=>"shower_cabin",
		327=>"wall_paper",
		328=>"master_bathroom",
		329=>"bakery",
		330=>"fiber_internet",
		331=>"dressing_room",
		332=>"closet",
		333=>"video_intercom",
		334=>"hilton_bathroom",
		335=>"intercom_system",
		336=>"isicam",
		337=>"jacuzzi",
		338=>"plasterboard",
		339=>"cellar",
		340=>"air_conditioning",
		341=>"bathtub",
		342=>"laminate_floor",
		343=>"marley",
		344=>"furniture",
		345=>"kitchen_built_in",
		346=>"kitchen_laminate",
		347=>"kitchen_gas",
		348=>"blinds",
		349=>"hardwood_floor",
		350=>"pvc_joinery",
		351=>"ceramic_floor",
		352=>"cooktop_cooker",
		353=>"spot_lighting",
		354=>"water_heater",
		355=>"fireplace",
		356=>"terrace",
		358=>"cloakroom",
		359=>"wi_fi",
		360=>"face_recognition_fingerprint",
	],
	//"external_features"
	361=>[	
		362=>"lift",
		363=>"steam_room",
		364=>"security",
		365=>"bath",
		366=>"booster",
		367=>"thermal_insulation",
		368=>"generator",
		369=>"cable_tv",
		370=>"camera_system",
		371=>"covered_garage",
		372=>"doorman",
		373=>"nursery",
		374=>"private_pool",
		375=>"car_park",
		376=>"playground",
		377=>"sauna",
		378=>"sound_insulation",
		379=>"siding",
		380=>"sports_field",
		381=>"water_tank",
		382=>"tennis_court",
		383=>"satellite",
		384=>"fire_escape",
		385=>"swimming_pool_outdoor",
	],
	//"around"
	386=>[
		387=>"mall",
		388=>"council",
		389=>"mosque",
		390=>"djemevi",
		391=>"sea_edge",
		392=>"pharmaceutical",
		393=>"entertainment_center",
		394=>"fair",
		395=>"hospital",
		396=>"synagogue",
		397=>"primary_school_middle_school",
		398=>"fire_department",
		399=>"church",
		400=>"high_school",
		401=>"market",
		402=>"park",
		403=>"police_station",
		404=>"the_health_clinic",
		405=>"neighborhood_market",
		406=>"gym",
		407=>"town_center",
		408=>"university",
	],
	//"transportation"
	409=>[
		410=>"highway",
		411=>"trolley_bus",
		412=>"eurasia_tunnel",
		413=>"bosphorus_bridges",
		414=>"street",
		415=>"sea_bus",
		416=>"filled",
		417=>"e_5",
		418=>"airport",
		419=>"dock",
		420=>"marmaray",
		421=>"metro",
		422=>"metrobus",
		423=>"minibus",
		424=>"bus_stop",
		425=>"beach",
		426=>"cable_car",
		427=>"tem",
		428=>"tram",
		429=>"railway_station",
	],
	//"view"
	430=>[	
		431=>"throat",
		432=>"sea",
		433=>"nature",
		434=>"lake",
		435=>"swimming_pool",
		436=>"park_green_space",
		437=>"city",
	],
	//"house_type"
	438=>[	
		439=>"mezzanine",
		440=>"mezzanine_duplex",
		441=>"garden_duplex",
		442=>"garden_floor",
		443=>"bahceli",
		444=>"roof_duplex",
		445=>"top_floor",
		446=>"forlex",
		447=>"garage_above_shop",
		448=>"ground_floor",
		449=>"floor_duplex",
		450=>"detached_entry",
		451=>"reverse_duplex",
		452=>"triplex",
		453=>"ground_floor",
	],
	//"accessbility_for_disabled_people"
	454=>[	
		455=>"car_parking",
		456=>"lift",
		457=>"bath",
		458=>"wide_hallway",
		459=>"entrance_ramp",
		460=>"stairs",
		461=>"kitchen",
		462=>"room_door",
		463=>"park",
		464=>"socket_electrical_switch",
		465=>"handle_railing",
		466=>"toilet",
		467=>"swimming_pool",
	],
	//"facilities"
	// 921=>[
	// 	922=>"jhgjhgh",
	// 	923=>"uytuy",
	// 	924=>"uyoui",
	// 	925=>"mgchjgfh",
	// ]
];
Configure::write('PROP_FEATURES', $prop_features);
