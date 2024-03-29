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
use Cake\Error\ErrorTrap;
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
    (new ErrorTrap(Configure::read('Error')))->register();
} else {
    (new ErrorTrap(Configure::read('Error')))->register();
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

Configure::write('languages', [1=>'en', 2=>'ru', 3=>'ar', 4=>'de', 5=>'cn', 6=>'fa', 7=>'tr' ]);
Configure::write('languages_ids', [ 'en'=>1, 'ru'=>2, 'ar'=>3, 'de'=>4, 'cn'=>5, 'fa'=>6, 'tr'=>7 ]);
Configure::write('app_folder',  in_array(env('SERVER_NAME'), ['localhost', 'devzonia.com']) ? '/ptpms' : '' );
Configure::write('isLocal',  in_array(env('SERVER_NAME'), ['localhost']) ? true : false );
Configure::write('searchGroups', [1=>'language', 2=>'price', 3=>'keyword', 4=>'address', 5=>'specs', 6=>'features', 7=>'netspace', 8=>'grossspace', 9=>'monthlytax', 10=>'deposit']);
Configure::write('searchable', [1=>'properties', 2=>'projects']);
Configure::write('actionsName', ['getpassword'=>__('getpassword'), 'save'=>__('save'), 'save_new'=>__('insert'), 'update'=>__('update'), 'delete'=>__('delete'), 'login'=>__('login'), 'enable'=>__('enable'), 'disable'=>__('disable'), 'delimage'=>__('delimage')]);

Configure::write('clms', ['param_space', 'param_delivertype', 'param_deliverdate', 'param_totalunits', 'keyword', 'language_id', 'project_id', 'category_id', 'features_ids', 'property_title', 'property_desc', 'property_photos', 'property_price', 'property_oldprice', 'property_loc', 'adrs_country', 'adrs_city', 'adrs_region', 'adrs_district', 'adrs_street', 'adrs_block', 'adrs_no', 'param_netspace', 'param_grossspace', 'param_rooms', 'param_bedrooms', 'param_buildage', 'param_floors', 'param_floor', 'param_heat', 'param_bathrooms', 'param_balconies', 'param_isfurnitured', 'param_isresale', 'param_usestatus', 'param_monthlytax', 'param_payment', 'param_ownership', 'param_ownertype', 'param_deposit', 'seo_title', 'seo_keywords', 'seo_desc', 'stat_created', 'stat_updated', 'stat_views', 'stat_shares', 'rec_state', 'param_space', 'param_delivertype', 'param_deliverdate', 'param_totalunits', 'param_blocks', 'param_bldfloors', 'param_residential_units', 'param_commercial_units', 'param_unit_types', 'param_units_size_range', 'property_usp', 'property_currency']);

Configure::write('currencies', [4=>'GBP', 1=>'EUR', 2=>'USD', 3=>'TRY']);
Configure::write('currencies_icons', [4=>'£', 1=>'€', 2=>'$', 3=>'₺']);
Configure::write('stats', [[0=>__("disabled"), 1=>__("enabled"), 2=>__('sold')]]);
            
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
		'docs'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
	],
	'admin.admin'=>[//     (top level admin) 
		'categories'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],
		'properties'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'projects'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'floorplans'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'offices'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'users'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],
		'messages'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>0],
		'logs'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],
		'searchlogs'=>['create'=>1, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'configs'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],
		'sellers'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
		'developers'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],

		'proposals'=>['create'=>0, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],
		'histories'=>['create'=>0, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>1],
		'docs'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
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
		'docs'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>1],
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
		'sellers'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>0, 'allids'=>0],
		'developers'=>['create'=>1, 'read'=>1, 'update'=>0, 'delete'=>0, 'allids'=>0],

		'proposals'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>0],
		'histories'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
		'docs'=>['create'=>1, 'read'=>1, 'update'=>1, 'delete'=>1, 'allids'=>0],
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
		'docs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
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
		'docs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
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
		'docs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
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
		'docs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
	],
	'user.client'=>[//      (end user, services consumer like tenant) // buyer
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
		'docs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
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
		'docs'=>['create'=>0, 'read'=>0, 'update'=>0, 'delete'=>0, 'allids'=>0],
	],
]);

// last_category_id = 663
// countries range from 1300-1542

/////////////////////////////////////////////////////////////////////////////
//////////////////////////// COUNTRIES //////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
$countries_categories = [
	1300=>'Afghanistan',
	1301=>'Aland Islands',
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
	1353=>'Cote D Ivoire',
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
	1415=>'Korea, Democratic People Republic of',
	1416=>'Korea, Republic of',
	1417=>'Kuwait',
	1418=>'Kyrgyzstan',
	1419=>'Lao People Democratic Republic',
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
	1542=>'Zimbabwe'
];
Configure::write('COUNTRIES_CATEGORIES', $countries_categories);

/////////////////////////////////////////////////////////////////////////////
//////////////////////////// PROJS //////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

$proj_categories = [ // ids 600 - 610
	600=>"commercials",	
	601=>"homes",
	602=>"mix_homes_and_commercials",
];
Configure::write('PROJ_CATEGORIES', $proj_categories);

$proj_specs = [ //ids 610 - 800
	"main"=>[		
		610=>"param_delivertype",
		611=>"param_space",
		612=>"param_deliverdate",
		613=>"param_totalunits",
		614=>"param_blocks",
		615=>"param_bldfloors",
		616=>"param_residential_units",
		617=>"param_commercial_units",
		618=>"param_unit_types",
		665=>"param_isresidence", 
		666=>"param_iscitizenship",
		619=>"param_units_size_range",
		// 667=>"param_downpayment",
		// 668=>"param_installment",
		// 669=>"param_installment_months",
	],		
	// "param_delivertype"
	610=>[		
		620=>"deliver_immediate",
		621=>"deliver_underbuild",
		622=>"deliver_offplan",
	],		
	// "param_unit_types"
	618=>[		
		623=>"room_studio",
		624=>"room_1_1",
		625=>"room_1.5_1",
		626=>"room_2_0",
		627=>"room_2_1",
		628=>"room_2.5_1",
		629=>"room_2_2",
		630=>"room_3_1",
		631=>"room_3.5_1",
		632=>"room_3_2",
		633=>"room_4_0",
		634=>"room_4_1",
		635=>"room_4.5_1",
		636=>"room_4_2",
		637=>"room_4_3",
		638=>"room_4_4",
		639=>"room_5_1",
		640=>"room_5_2",
		641=>"room_5_3",
		642=>"room_5_4",
		643=>"room_6_1",
		644=>"room_6_2",
		645=>"room_6_3",
		646=>"room_6_4",
		647=>"room_7_1",
		648=>"room_7_2",
		649=>"room_7_3",
		650=>"room_8_1",
		651=>"room_8_2",
		652=>"room_8_3",
		653=>"room_8_4",
		654=>"room_9_1",
		655=>"room_9_2",
		656=>"room_9_3",
		657=>"room_9_4",
		658=>"room_9_5",
		659=>"room_9_6",
		660=>"room_10_1",
		661=>"room_10_2",
		662=>"more_than_10",
		663=>"duplex",
		670=>"room_1_1_duplex",
		671=>"room_1.5_1_duplex",
		672=>"room_2_0_duplex",
		673=>"room_2_1_duplex",
		674=>"room_2.5_1_duplex",
		675=>"room_2_2_duplex",
		676=>"room_3_1_duplex",
		677=>"room_3.5_1_duplex",
		678=>"room_3_2_duplex",
		679=>"room_4_0_duplex",
		680=>"room_4_1_duplex",
		681=>"room_4.5_1_duplex",
		682=>"room_4_2_duplex",
		683=>"room_4_3_duplex",
		684=>"room_4_4_duplex",
		685=>"room_5_1_duplex",
		686=>"room_5_2_duplex",
		687=>"room_5_3_duplex",
		688=>"room_5_4_duplex",
		689=>"room_6_1_duplex",
		690=>"room_6_2_duplex",
		691=>"room_6_3_duplex",
		692=>"room_6_4_duplex",
		693=>"room_7_1_duplex",
		694=>"room_7_2_duplex",
		695=>"room_7_3_duplex",
		696=>"room_8_1_duplex",
		697=>"room_8_2_duplex",
		698=>"room_8_3_duplex",
		699=>"room_8_4_duplex",
		700=>"room_9_1_duplex",
		701=>"room_9_2_duplex",
		702=>"room_9_3_duplex",
		703=>"room_9_4_duplex",
		704=>"room_9_5_duplex",
		705=>"room_9_6_duplex",
		706=>"room_10_1_duplex",
		707=>"room_10_2_duplex",
		664=>"loft"
	],
	// param_isresidence 
	665=>[],
	// param_iscitizenship
	666=>[],
	// // param_downpayment
	// 667=>[],
	// // param_installment
	// 668=>[],
	// // param_installment_months
	// 669=>[],
];
Configure::write('PROJ_SPECS', $proj_specs);

$proj_features = [ // ids 500 - 600
	"main"=>[
		500=>"schooling",
		501=>"health",
		502=>"social_facilities",
		503=>"building_features",
		504=>"transportation",
	],
	// schooling			
	500=>[			
		505=>"school_nursery",
		506=>"school_kindergarten",
		507=>"school_elementary",
		508=>"school_high",
	],			
	// health			
	501=>[			
		509=>"health_center",
		510=>"health_polyclinic",
		511=>"health_pharmacy",
		512=>"health_veterinary",
	],			
	// facilities			
	502=>[			
		513=>"facility_gym",
		514=>"facility_sauna",
		515=>"facility_turkish_path",
		516=>"facility_tennis_court",
		517=>"facility_steam_room",
		518=>"facility_indoor_garage",
		519=>"facility_outdoor_garage",
		520=>"facility_basketball_court",
		521=>"facility_shared_pool",
		522=>"facility_private_pool",
		523=>"facility_outdoor_pool",
		524=>"facility_indoor_pool",
	],			
	// building features			
	503=>[			
		525=>"bldfeature_cctv",
		526=>"bldfeature_elevators",
		527=>"bldfeature_concierge",
		528=>"bldfeature_security_24_7",
		529=>"bldfeature_sound_insulation",
		530=>"bldfeature_thermal_insulation",
		531=>"bldfeature_water_depot",
		532=>"bldfeature_water_depot_hydrophore",
		547=>"bldfeature_earthquake",
	],			
	// transportation			
	504=>[			
		533=>"trans_airport",
		534=>"trans_bosphorus",
		535=>"trans_metro",
		536=>"trans_coast",
		537=>"trans_e_5",
		538=>"trans_eurasia",
		539=>"trans_highway",
		540=>"trans_marmaray",
		541=>"trans_metrobus",
		542=>"trans_minibus",
		543=>"trans_port",
		544=>"trans_tem",
		545=>"trans_ferry",
		546=>"trans_train",
	]
];
Configure::write('PROJ_FEATURES', $proj_features);
Configure::write('PROP_FACILITIES', $proj_features);

/////////////////////////////////////////////////////////////////////////////
//////////////////////////// PROPS //////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

$prop_categories = [ // ids 100 - 400
	100=>"apartment",
	101=>"villa",
	102=>"commercial",
	103=>"land",
	104=>"hotel",
	105=>"house",
	106=>"bungalow",
	107=>"penthouse",
	108=>"building",
];
Configure::write('PROP_CATEGORIES', $prop_categories);

$prop_specs = [
	"main"=>[		
		150=>"param_isresale",
		151=>"param_iscitizenship",
		152=>"param_rooms",
		153=>"param_buildage",
		154=>"param_floors",
		155=>"param_floor",
		156=>"param_heat",
		157=>"param_bathrooms",
		158=>"param_balconies",
		159=>"param_isfurnitured",
		160=>"param_usestatus",
		161=>"param_netspace",
		162=>"param_grossspace",
		// 163=>"param_ownertype", moved to step 5 (Photos)
		164=>"param_titledeed",
		333=>"param_monthlytax",
		334=>"param_deposit",
		165=>"param_ownership",
		166=>"param_isresidence",
		167=>"param_iscommission_included",
	],	
	// "param_isresale"	
	150=>[],
	// "param_iscitizenship"
	151=>[],
	// "param_isfurnitured"
	159=>[],
	// "param_isresidence"
	166=>[],
	// "param_iscommission_included"
	167=>[],
	
	//"param_rooms"		
	152=>[		
		168=>"room_studio",
		169=>"room_1_1",
		170=>"room_1.5_1",
		171=>"room_2_0",
		172=>"room_2_1",
		173=>"room_2.5_1",
		174=>"room_2_2",
		175=>"room_3_1",
		176=>"room_3.5_1",
		177=>"room_3_2",
		178=>"room_4_0",
		179=>"room_4_1",
		180=>"room_4.5_1",
		181=>"room_4_2",
		182=>"room_4_3",
		183=>"room_4_4",
		184=>"room_5_1",
		185=>"room_5_2",
		186=>"room_5_3",
		187=>"room_5_4",
		188=>"room_6_1",
		189=>"room_6_2",
		190=>"room_6_3",
		191=>"room_6_4",
		192=>"room_7_1",
		193=>"room_7_2",
		194=>"room_7_3",
		195=>"room_8_1",
		196=>"room_8_2",
		197=>"room_8_3",
		198=>"room_8_4",
		199=>"room_9_1",
		200=>"room_9_2",
		201=>"room_9_3",
		202=>"room_9_4",
		203=>"room_9_5",
		204=>"room_9_6",
		205=>"room_10_1",
		206=>"room_10_2",
		208=>"duplex",
		335=>"room_1_1_duplex",
		336=>"room_1.5_1_duplex",
		337=>"room_2_0_duplex",
		338=>"room_2_1_duplex",
		339=>"room_2.5_1_duplex",
		340=>"room_2_2_duplex",
		341=>"room_3_1_duplex",
		342=>"room_3.5_1_duplex",
		343=>"room_3_2_duplex",
		344=>"room_4_0_duplex",
		345=>"room_4_1_duplex",
		346=>"room_4.5_1_duplex",
		347=>"room_4_2_duplex",
		348=>"room_4_3_duplex",
		349=>"room_4_4_duplex",
		350=>"room_5_1_duplex",
		351=>"room_5_2_duplex",
		352=>"room_5_3_duplex",
		353=>"room_5_4_duplex",
		354=>"room_6_1_duplex",
		355=>"room_6_2_duplex",
		356=>"room_6_3_duplex",
		357=>"room_6_4_duplex",
		358=>"room_7_1_duplex",
		359=>"room_7_2_duplex",
		360=>"room_7_3_duplex",
		361=>"room_8_1_duplex",
		362=>"room_8_2_duplex",
		363=>"room_8_3_duplex",
		364=>"room_8_4_duplex",
		365=>"room_9_1_duplex",
		366=>"room_9_2_duplex",
		367=>"room_9_3_duplex",
		368=>"room_9_4_duplex",
		369=>"room_9_5_duplex",
		370=>"room_9_6_duplex",
		371=>"room_10_1_duplex",
		372=>"room_10_2_duplex",
		207=>"more_than_10",
	],		
	//"param_buildage"		
	153=>[		
		209=>"age_0",
		210=>"age_1",
		211=>"age_2",
		212=>"age_3",
		213=>"age_4",
		214=>"age_5_10",
		215=>"age_11_15",
		216=>"age_16_20",
		217=>"age_21_25",
		218=>"age_26_30",
		219=>"more_than_30"
	],		
	//"param_floors"		
	154=>[		
		220=>"floors_1",
		221=>"floors_2",
		222=>"floors_3",
		223=>"floors_4",
		224=>"floors_5",
		225=>"floors_6",
		226=>"floors_7",
		227=>"floors_8",
		228=>"floors_9",
		229=>"floors_10",
		230=>"floors_11",
		231=>"floors_12",
		232=>"floors_13",
		233=>"floors_14",
		234=>"floors_15",
		235=>"floors_16",
		236=>"floors_17",
		237=>"floors_18",
		238=>"floors_19",
		239=>"floors_20",
		240=>"floors_21",
		241=>"floors_22",
		242=>"floors_23",
		243=>"floors_24",
		244=>"floors_25",
		245=>"floors_26",
		246=>"floors_27",
		247=>"floors_28",
		248=>"floors_29",
		249=>"floors_more_than_30",
	],		
	//"param_floor"		
	155=>[		
		250=>"floor_1",
		251=>"floor_2",
		252=>"floor_3",
		253=>"floor_4",
		254=>"floor_5",
		255=>"floor_6",
		256=>"floor_7",
		257=>"floor_8",
		258=>"floor_9",
		259=>"floor_10",
		260=>"floor_11",
		261=>"floor_12",
		262=>"floor_13",
		263=>"floor_14",
		264=>"floor_15",
		265=>"floor_16",
		266=>"floor_17",
		267=>"floor_18",
		268=>"floor_19",
		269=>"floor_20",
		270=>"floor_21",
		271=>"floor_22",
		272=>"floor_23",
		273=>"floor_24",
		274=>"floor_25",
		275=>"floor_26",
		276=>"floor_27",
		277=>"floor_28",
		278=>"floor_29",
		279=>"floor_minus_4",
		280=>"floor_minus_3",
		281=>"floor_minus_2",
		282=>"floor_minus_1",
		283=>"floor_basement",
		284=>"floor_ground",
		285=>"floor_garden",
		286=>"floor_enterance",
		287=>"floor_upper_enterance",
		288=>"floor_independent",
		289=>"floor_villa",
		290=>"floor_top",
		291=>"floor_more_than_30",
	],		
	//"param_heat"		
	156=>[		
		292=>"heat_no",
		293=>"heat_fireplace",
		294=>"heat_gas",
		295=>"heat_ground_heater",
		296=>"heat_central",
		297=>"heat_centeral_shared",
		298=>"heat_combi",
		299=>"heat_underground_heater",
		300=>"heat_air_conditioning",
		301=>"heat_ancoil_unit",
		302=>"heat_solar",
		303=>"heat_geothermal",
		304=>"heat_grate_firepalce",
		305=>"heat_vrv",
		306=>"heat_hover",
	],		
	//"param_bathrooms"		
	157=>[		
		307=>"bath_no",
		308=>"bath_1",
		309=>"bath_2",
		310=>"bath_3",
		311=>"bath_4",
		312=>"bath_5",
		313=>"bath_6",
		314=>"bath_more_than_6",
	],		
	//"param_balconies"		
	158=>[		
		315=>"balcony_no",
		316=>"balcony_1",
		317=>"balcony_2",
		318=>"balcony_3_and_more",
	],		
	//"param_usestatus"		
	160=>[		
		319=>"usage_empty",
		320=>"usage_tanent",
		321=>"usage_owner",
	],		
	//"param_ownership"	titledeed type	
	165=>[		
		322=>"ownership_Condominium",
		323=>"ownership_Floor_Easement",
		324=>"ownership_Shared",
		325=>"ownership_Agricultural_Land",
		326=>"ownership_Plot_of_Land",
	],		
	//"param_ownertype"		
	163=>[		
		327=>"seller_landowner",
		328=>"seller_project_mananger",
		329=>"seller_individual",
		330=>"seller_office",
		331=>"seller_bank",
		332=>"seller_agency",
	],		
];
Configure::write('PROP_SPECS', $prop_specs);

$prop_features = [ // ids 400 - 500 
	"main"=>[				
		400=>"direction",
		401=>"internal_features",
		402=>"scenery",
	],			
	//"direction"			
	400=>[			
		403=>"west",
		404=>"east",
		405=>"south",
		406=>"north",
	],			
	//"internal_features"			
	401=>[			
		407=>"air_conditioning",
		408=>"intercom",
		409=>"smart_house",
		410=>"open_kitchen",
		411=>"closed_kitchen",
		412=>"elctrical_appliances",
		413=>"bbq",
		414=>"fireplace",
		415=>"builtin_closet",
		416=>"dressing_room",
		417=>"builtin_kitchen_appliances",
		418=>"washing_machine",
		419=>"laundary_dryer",
		420=>"storage_room",
		421=>"builtin_sink_wc",
		422=>"ensuite_pathroom",
		423=>"path_tub",
		424=>"jacuzzi",
	],			
	//"scenery"			
	402=>[			
		425=>"sea",
		426=>"city",
		427=>"lake",
		428=>"nature",
		429=>"bosphorus",
		430=>"swimming_pool",
		431=>"park_ladscape",
	],
];
Configure::write('PROP_FEATURES', $prop_features+$proj_features);
