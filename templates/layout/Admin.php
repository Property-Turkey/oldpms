<!DOCTYPE html>
<html lang="<?= $currlang ?>">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?= $this->fetch('title') ?>
    </title>
    
    <link rel="shortcut icon" href="<?=$app_folder?>/webroot/img/favicon.ico">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

    <!-- jQuery -->
    <?php //echo $this->Html->script('/gentela/vendors/jquery/dist/jquery.min.js') ?>

    <!-- Bootstrap -->
    <?php
    // if($currlang == 'ar'){
    //     echo $this->Html->css('bootstrap-rtl.min');
    // }else{
    //echo $this->Html->css('/gentela/vendors/bootstrap/dist/css/bootstrap.min.css');
    // }
    ?>
    <!-- Font Awesome -->
    <?php echo $this->Html->css('fa4/css/font-awesome.min') ?>
    <!-- NProgress -->
    <?php //echo $this->Html->css('/gentela/vendors/nprogress/nprogress.css') ?>
    <!-- Animate -->
    <?php //echo $this->Html->css('/gentela/vendors/animate.css/animate.min.css') ?>
    <!-- iCheck -->
    <?php //echo $this->Html->css('/gentela/vendors/iCheck/skins/flat/green.css')
    ?>
    <!-- bootstrap-progressbar -->
    <?php //echo $this->Html->css('/gentela/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')
    ?>
    <!-- PNotify -->
    <?php //echo $this->Html->css('/gentela/vendors/pnotify/dist/pnotify.css') ?>
    <?php //echo $this->Html->css('/gentela/vendors/pnotify/dist/pnotify.buttons.css') ?>
    <?php //echo $this->Html->css('/gentela/vendors/pnotify/dist/pnotify.nonblock.css') ?>
    <!-- JQVMap -->
    <?php //echo $this->Html->css('/gentela/vendors/jqvmap/dist/jqvmap.min.css')
    ?>
    <!-- bootstrap-daterangepicker -->
    <?php //echo $this->Html->css('/gentela/vendors/bootstrap-daterangepicker/daterangepicker.css') ?>
    <!-- NG Tags Input-->
    <?php echo $this->Html->css('ng-tags-input.min') ?>
    <!-- Bootstrap Multiple Select -->
    <?php echo $this->Html->css('bootstrap-select.min') ?>
    <!-- Range NoUi slider -->
    <?php echo $this->Html->css('nouislider.min') ?>
    <!-- Custom Theme Style -->
    <?php //echo $this->Html->css('/gentela/build/css/custom.min.css') ?> 
    <!-- MY Custom Theme Style -->
    <!-- <?php echo $this->Html->css('gentela_style') ?> -->
    <?php echo $this->Html->css('all') ?>

    <?php
    if($currlang == 'ar'){
        echo $this->Html->css('gentela_style-rtl');
    }
    ?>
</head>





<body class="nav-md" ng-app="app" ng-controller="ctrl as ctrl">

            



    <!-- CONTENT BODY -->
    <?php echo $this->fetch('content') ?> 


    <div id="imgHolder" class="imgHolder" onClick="this.setAttribute('style', 'opacity:0; visibility:hidden;')"></div>
    <div id="slideHolder" class="imgHolder slideHolder" ></div>


    <!--    JAVASCRIPT      -->

    
    <!-- Angular -->
    <?php echo $this->Html->script('angular') ?>
    <!-- NG Tags Input-->
    
    <?php echo $this->Html->script('ng-tags-input.min') ?>
    <!-- Angular Sanitize -->
    <?php echo $this->Html->script('angular-sanitize.min') ?>
    <!-- Angular Animate -->
    <?php echo $this->Html->script('angular-animate.min') ?>
    <!-- Bootstrap -->
    <?php //echo $this->Html->script('/gentela/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>
    <!-- FastClick -->
    <?php //echo $this->Html->script('/gentela/vendors/fastclick/lib/fastclick.js') 
    ?>
    <!-- NProgress -->
    <?php //echo $this->Html->script('/gentela/vendors/nprogress/nprogress.js') ?>
    <!-- Chart.js -->
    <?php //echo $this->Html->script('/gentela/vendors/Chart.js/dist/Chart.min.js') ?>
    <!-- gauge.js -->
    <?php //echo $this->Html->script('/gentela/vendors/gauge.js/dist/gauge.min.js') 
    ?>
    <!-- bootstrap-progressbar -->
    <?php //echo $this->Html->script('/gentela/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>

    <!-- PNotify -->
    <?php //echo $this->Html->script('/gentela/vendors/pnotify/dist/pnotify.js') ?>
    <?php //echo $this->Html->script('/gentela/vendors/pnotify/dist/pnotify.buttons.js') ?>
    <?php //echo $this->Html->script('/gentela/vendors/pnotify/dist/pnotify.nonblock.js') ?>

    <!-- iCheck -->
    <?php //echo $this->Html->script('/gentela/vendors/iCheck/icheck.min.js') 
    ?>
    <!-- Skycons -->
    <?php //echo $this->Html->script('/gentela/vendors/skycons/skycons.js') 
    ?>
    <!-- Flot -->
    <?php //echo $this->Html->script('/gentela/vendors/Flot/jquery.flot.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/Flot/jquery.flot.pie.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/Flot/jquery.flot.time.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/Flot/jquery.flot.stack.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/Flot/jquery.flot.resize.js') 
    ?>
    <!-- Flot plugins -->
    <?php //echo $this->Html->script('/gentela/vendors/flot.orderbars/js/jquery.flot.orderBars.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/flot-spline/js/jquery.flot.spline.min.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/flot.curvedlines/curvedLines.js') 
    ?>
    <!-- DateJS -->
    <?php //echo $this->Html->script('/gentela/vendors/DateJS/build/date.js') 
    ?>
    <!-- JQVMap -->
    <?php //echo $this->Html->script('/gentela/vendors/jqvmap/dist/jquery.vmap.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/jqvmap/dist/maps/jquery.vmap.world.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') 
    ?>
    <!-- bootstrap-daterangepicker -->
    <?php // echo $this->Html->script('/gentela/vendors/moment/min/moment.min.js') ?>
    <?php //echo $this->Html->script('/gentela/vendors/bootstrap-daterangepicker/daterangepicker.js') ?>
    <!-- CKEditor -->
    <?php //echo $this->Html->script('/gentela/vendors/ckeditor4.13.0/ckeditor') ?>
    <?php //echo $this->Html->script('/gentela/vendors/ckeditor4.13.0/angular-ckeditor') ?>
    <!-- Range NoUi slider -->
    
    <!-- Bootstrap Multiple Select -->
    <?php //echo $this->Html->script('bootstrap-select.min') ?>

    <?php //echo $this->Html->script('bootstrap.min') ?>
    <!-- Custom Theme Scripts -->
    <!-- JQuery Mask Money -->
    <?php echo $this->Html->script('jquery') ?>
    <!-- JQuery Mask Money -->
    <?php echo $this->Html->script('angularjs-currency-input-mask') ?>
    <?php echo $this->Html->script('owl.carousel') ?>

    <?php echo $this->Html->script('all.js') ?>



    <?php if ($isMap==1) { ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?= $gmapKey ?>&sensor=false&libraries=places&language=en"></script>
    <?php } ?>
    <!-- Google Maps Directive -->
    <?php //echo $this->Html->script('gm') ?>

    <?php echo $this->element('Modals/massenger') ?>
    <!-- ANGULARJS APP -->
    <script>
        (function() {
            var ptrn = [];
            ptrn['isEmail'] = /^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z.]{2,7}$/;
            ptrn['isNumber'] = /^[0-9]$/;
            ptrn['isInteger'] = /^[\s\d]$/;
            ptrn['isFloat'] = /^[0-9]?\d+(\.\d+)?$/;
            ptrn['isVersion'] = /^(?:(\d+)\.)?(?:(\d+)\.)?(\*|\d+)$/
            ptrn['isPassword'] = /^[A-Za-z0-9@#$%^&*()!_-]{4,32}$/;
            ptrn['isParagraph'] = /^[^()]{40,255}$/;
            ptrn['isEmpty'] = /^[^()]{3,255}$/; ///^((?!undefined).){3,255}$/;
            ptrn['isSelectEmpty'] = /^[^()]{1,255}$/;
            ptrn['isZipcode'] = /^\+[0-9]{1,4}$/;
            ptrn['isPhone'] = /^[\s\d]{9,15}$/;
            ptrn['setNumber'] = /^[^\d|\-+|\.+]$/;

            var errorMsg = [];
            errorMsg['isEmail'] = '<?= __('is-email-msg') ?>';
            errorMsg['isNumber'] = '<?= __('is-number-msg') ?>';
            errorMsg['isInteger'] = '<?= __('is-integer-msg') ?>';
            errorMsg['isFloat'] = '<?= __('is-flaot-msg') ?>';
            errorMsg['isVersion'] = '<?= __('is-version-msg') ?>';
            errorMsg['isPassword'] = '<?= __('is-password-msg') ?>'; //Only Alphabet, Numbers and symboles @ # $ % ^ & * ( ) ! _ - allowed;
            errorMsg['isParagraph'] = '<?= __('is-paragraph-msg') ?>'; //Paragraph should be between 40 and 255 character;
            errorMsg['isEmpty'] = '<?= __('is-empty-msg') ?>';
            errorMsg['isSelectEmpty'] = '<?= __('is-selected-empty-msg') ?>';
            errorMsg['isPhone'] = '<?= __('is-phone-msg') ?>';
            errorMsg['setNumber'] = '<?= __('is-number-msg') ?>';


            var _getExt = function(fileext) {
                var ext = fileext.split('/')[1];
                switch (ext) {
                    case 'jpg':
                    case 'jpeg':
                        return 'jpg';
                        break;
                    case 'plain':
                        return 'txt';
                        break;
                    default:
                        return ext;
                }
            }

            var _setError = function(elm, msg, clr) {

                !msg ? msg = "" : msg;
                !clr ? clr = false : clr;

                var tar = $(elm).parent();
                if (elm.type == "checkbox") {
                    tar = $(elm).parent().parent().parent()
                }
                if ($('.error-message', tar).html() == undefined) {
                    $(tar).append('<div class="error-message"></div>');
                }
                $('.error-message', tar).text(msg)
            }

            var _getErrors = function(obj, form_name) {
                (form_name[0] == '#' || form_name[0] == '.') ? form_name : form_name = '#'+form_name;
                $(".error-message").text('');
                for (var prop in obj) {
                    var value = obj[prop];
                    if (typeof obj[prop] !== 'object') {
                        continue;
                    }
                    var arr = $.map(value, function(val, index) {
                        return [val];
                    });
                    var elm = $(form_name + ' [name="' + prop + '"]');
                    if (Array.isArray(elm)) {
                        _setError($(form_name + ' [name="' + prop + '"]')[0], arr[0])
                    } else {
                        _setError($(form_name + ' [name="' + prop + '"]'), arr[0])
                    }
                }
                // console.log("obj, form_name",obj, form_name)
            }


            var showPNote = function(_title, _msg, _type, _isHide, _delay) {

                !_title ? _title = "Sticky Message" : _title;
                !_msg ? _msg = "Empty Message" : _msg;
                !_type ? _type = "error" : _type;
                !_isHide ? _isHide = true : _isHide;
                !_delay ? (_type=='error' ? _delay = 3800 : _delay = 800) : _delay;

                const stack = {
                    dir1: 'up',
                    dir2: '<?= $currlang == 'ar' ? 'right' : 'left' ?>',
                    firstpos1: 25,
                    firstpos2: 25,
                    push: 'top',
                    context: $(document.body)
                }
                return new PNotify({
                    title: _title,
                    text: _msg,
                    type: _type,
                    hide: _isHide,
                    styling: 'bootstrap3',
                    stack: stack,
                    delay: _delay,
                    closer: true,
                    sticker: true,
                    // addclass: 'dark'
                });
            }

            var _setDate = function(dt, p, flag) {
                !dt ? dt = new Date() : dt;
                !p ? p = [0, 0, 0, 0, 0, 0] : p;

                var now = dt;
                var year = now.getFullYear();
                var month = now.getMonth() + 1;
                var day = now.getDate();
                var hour = now.getHours();
                var minute = now.getMinutes();
                var second = now.getSeconds();

                year += (p[0] * 1);
                month += (p[1] * 1);
                day += (p[2] * 1);
                hour += (p[3] * 1);
                minute += (p[4] * 1);
                second += (p[5] * 1);

                if (month.toString().length == 1) {
                    month = '0' + month;
                }
                if (day.toString().length == 1) {
                    day = '0' + day;
                }
                if (hour.toString().length == 1) {
                    hour = '0' + hour;
                }
                if (minute.toString().length == 1) {
                    minute = '0' + minute;
                }
                if (second.toString().length == 1) {
                    second = '0' + second;
                }
                var res = year + '-' + month + '-' + day + ' ' + hour + ':' + minute + ':' + second;
                if (flag == 'onlydate') {
                    res = year + '-' + month + '-' + day;
                }
                if (flag == 'onlyMonthYear') {
                    res = year + '-' + month ;
                }
                if (flag == 'ms') {
                    res = new Date( dt ).getTime();
                }
                return res;
            }

            var _filter = function(val) {
                if (typeof(val) != "string") return val;
                return val
                    .replace(/[\"]/g, '\\"')
                    .replace(/[\\]/g, '\\\\')
                    .replace(/[\/]/g, '\\/')
                    .replace(/[\b]/g, '\\b')
                    .replace(/[\f]/g, '\\f')
                    .replace(/[\n]/g, '\\n')
                    .replace(/[\r]/g, '\\r')
                    .replace(/[\t]/g, '\\t');
            }
            
            var nFormat = function(v, _unit, _round) {
                !_unit ? _unit = '' : _unit;
                if (!v) { return 0 };
                var res = Math.floor(v).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") ;
                if(_round){
                    if(v > 9999){res = res.slice(0, -3)+'000';}
                }
                return res+ ' ' + _unit;
            };

            var _setCvrBtn = function(tar, param, icon) {
                if (tar == '#modal_cvr' || tar == '#main_preloader' || tar == '#properties_preloader') {
                    if($(tar).length>1){
                        for(var i in $(tar)){
                            $(tar)[i].css('display', param == 1 ? 'flex' : 'none');
                        }
                    }else{
                        $(tar).css('display', param == 1 ? 'flex' : 'none');
                    }
                }
                tar[0] == '#' || tar[0] == '.' ? tar : '#' + tar;
                var elm = $(tar + " span");
                if (param == 1) {
                    elm.html('<i class="fa fa-refresh fa-spin fa-fw"></i>');
                    $(tar.replace("_cvr", "")).css("pointer-events", "none");
                    $(tar).attr("disabled", true);
                } else {
                    if(icon){
                        elm.html('<i class="fa fa-'+icon+'"></i>');
                    }else{
                        elm.html('');
                    }
                    $(tar.replace("_cvr", "")).css("pointer-events", "all");
                    $(tar).attr("disabled", false);
                }
            }

            var doClickUpdt;
            var doClick = function(tar, delay) {
                tar[0] == '#' || tar[0] == '.' || tar[0] == '[' ? tar : '#' + tar;
                !delay ? delay = 1 : delay;
                clearTimeout(doClickUpdt)
                doClickUpdt = setTimeout(function() {
                    return $(tar).click()
                }, delay);
            }

            var playSound = function(url){
                var audio = new Audio('<?=$path?>/'+url);
                audio.play();
            }

            var DtSetter = function(tar, val) {
                var defines = {
                    'bool': { 0: '<?= __('disabled') ?>', 1: '<?= __('enabled') ?>' },
                    'bool2': { 
                        0: '<i class="fa fa-times-circle-o redText" title="<?= __('disabled') ?>"></i>', 
                        1: '<i class="fa fa-check-circle-o greenText" title="<?= __('enabled') ?>"></i>', 
                        2: '<i class="fa fa-bookmark orangeText" title="<?= __('sold') ?>"></i>' 
                    },
                    'bool3': { 0: '<?= __('no') ?>', 1: '<?= __('yes') ?>' },
                    'roles': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('roles'))) ?>'),
                    'language_id': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('langs'))) ?>'),
                    'adrs': {
                        adrs_country: '<?= __('adrs_country') ?>',
                        adrs_city: '<?= __('adrs_city') ?>',
                        adrs_region: '<?= __('adrs_region') ?>',
                        adrs_block: '<?= __('adrs_block') ?>',
                        adrs_no: '<?= __('adrs_no') ?>'
                    },
                    'actionsName': JSON.parse('<?= json_encode($this->Do->get('actionsName')) ?>'),
                    'searchable': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('searchable'))) ?>'),
                    'USP': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('USP_CATEGORIES'))) ?>'),
                    'PROP': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('PROP_CATEGORIES'))) ?>'),
                    'PROJ_CATEGORIES': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('PROJ_CATEGORIES'))) ?>'),
                    'PROP_FEATURES': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('PROP_FEATURES'))) ?>'),
                    'PROP_SPECS': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('PROP_SPECS'))) ?>'),
                    'PROJ_FEATURES': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('PROJ_FEATURES'))) ?>'),
                    'PROJ_SPECS': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('PROJ_SPECS'))) ?>'),
                    'ROOMS': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('PROP_SPECS.152'))) ?>'),
                    'SELLERS_TYPE': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('PROP_SPECS.163'))) ?>'),
                    'clms': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('clms'), false, false)) ?>'),
                    'currencies': JSON.parse('<?= json_encode( $this->Do->get('currencies')) ?>'),
                    'currencies_icons': JSON.parse('<?= json_encode( $this->Do->get('currencies_icons')) ?>'),
                    'ratios': JSON.parse('<?= json_encode( $currency_ratios ) ?>'),
                    'COUNTRIES': JSON.parse('<?= json_encode( $this->Do->get('COUNTRIES_CATEGORIES')) ?>'),
                }
                
                if (val=='list') { return defines[tar]; }
                if (!defines[tar]) { return val; }
                if (!defines[tar][val]) { return val; }

                return defines[tar][val];
            }

            //////////////////// MAP places search
            if('<?=$isMap?>' == 1 && typeof google !== 'undefined'){
                
                var coords = {lat:41.063327, lng:28.9827786}
                
                var mapOptions = {
                    center: new google.maps.LatLng(coords.lat, coords.lng),
                    zoom: 12,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var marker , marker_mdl, markers=[];
                if('<?=$this->request->getParam('controller')?>' == 'Properties'){
                    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                }
                var map_mdl = new google.maps.Map(document.getElementById('map-canvas_mdl'), mapOptions);
            }
            //////////////////// END MAP places search
            //////////////////// https://developers.google.com/maps/documentation/javascript/examples/geocoding-reverse#maps_geocoding_reverse-javascript
            //////////////////// geocode reverse
            
            var getBrowser = function(){
                var browsers = {}
                // Opera 8.0+
                browsers.opera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
                // Firefox 1.0+
                browsers.firefox = typeof InstallTrigger !== 'undefined';
                // Safari 3.0+ "[object HTMLElementConstructor]" 
                browsers.safari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && window['safari'].pushNotification));
                browsers.safari = navigator.userAgent.indexOf('Safari/') > -1 && navigator.userAgent.indexOf('Chrome/') < 0;
                // Internet Explorer 6-11
                browsers.ie = /*@cc_on!@*/false || !!document.documentMode;
                // Edge 20+
                browsers.edge = !browsers.ie && !!window.StyleMedia;
                // Chrome 1 - 79
                browsers.chrome = !!window.chrome && (!!window.chrome.webstore || !!window.chrome.runtime);
                // Edge (based on chromium) detection
                browsers.edgechromium = browsers.chrome && (navigator.userAgent.indexOf("Edg") != -1);
                // Blink engine detection
                browsers.blink = (browsers.chrome || browsers.opera) && !!window.CSS;
                for(var k in browsers){
                    if(browsers[k]){return k;}
                }
                return 'undefined';
            }
            
            var __ = this;

            var app = angular.module('app', [ 'ngAnimate', 'ngSanitize', 'ngTagsInput', 'cur.$mask']); //, 'gm', '' 
            app.controller('ctrl', function($scope, $http, $location, $timeout, $q, $compile, $filter, $interval) {
                
                $scope.filesInfo = { property_photos:[], project_photos:[], doc_file:[]};
                $scope.files = { "property": [] };
                $scope.app_folder = '<?= $app_folder ?>';
                $scope.currlang = '<?= $currlang ?>';
                $scope.path = '<?= $path ?>';
                $scope.currlangid = '<?= $currlangid ?>';
                $scope.notifications = {
                    'total': 0
                }
                $scope.selected = {}
                $scope.search = {
                    tar: '<?= $this->request->getQuery('tar') ?>',
                    from: '<?= $this->request->getQuery('from') ?>',
                    to: '<?= $this->request->getQuery('to') ?>',
                    key: '<?= $this->request->getQuery('key') ?>',
                };

                $scope.ckoptions = {
                    language: '<?= $currlang ?>',
                    startupOutlineBlocks: true,
                    forcePasteAsPlainText: true,
                    toolbar: [
                        // [ 'Source', 'ShowBlocks' ],
                        // [ 'BidiLtr', 'BidiRtl' ],
                        ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'],
                        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                        // [ 'Link','Unlink','Anchor' ],
                        // [ 'Format','Styles','Font' ],
                    ]
                }
                
                $scope.step2 = {
                    isCurrentLocPrompet: true,
                    isItInProjectPrompet: false,
                    isMapShow: false,
                    isProjectShow: false
                }

                $scope.vm = { model: {zipcode:'', state:'', city:'', address_1:''} }

                var actn = '<?= strtolower($this->request->getParam('action')) ?>';
                var ctrl = '<?= strtolower($this->request->getParam('controller')) ?>';
                $scope.param1 = '<?= empty($this->request->getParam('pass')[0]) ? '' : $this->request->getParam('pass')[0] ?>';
                $scope.currTab = 'in_msgs';
                $scope.curr_step = 1;
                $scope.curr_t = 'main';
                $scope.camera_stream_settings={};

                $scope.roles_badge = JSON.parse('<?= json_encode( $this->Do->get('roles_badge') ) ?>'),

                $scope.clrs = [
                    "#7bb3eb", "#eba556", "#7c81e5", "#87e089", "#7a6f8d", "#ce4472", "#4c7494", "#b085b6", "#6c4c8c", "#eba556", "#7c81e5", "#87e089", "#7bb3eb", "#7a6f8d", "#ce4472", "#4c7494", "#b085b6", "#6c4c8c",
                    "#7bb5eb", "#eba756", "#7c83e5", "#87e389", "#7a8f8d", "#ce4475", "#4c7496", "#b385b6", "#6c8c8c", "#eba856", "#7c85e5", "#87e069", "#5bb3eb", "#7a3f8d", "#ce4475", "#4c7498", "#b085b9", "#6c8c8c",
                    "#7bb7eb", "#eba956", "#7c85e5", "#87e689", "#7a4f8d", "#ce4477", "#4c7498", "#b585b6", "#6c4c5c", "#eba606", "#7c85e1", "#87e049", "#3bb3eb", "#7a0f8d", "#ce4479", "#4c7454", "#b085b3", "#6c6c8c",
                    "#7bb9eb", "#eba626", "#7c87e5", "#87e989", "#7a0f8d", "#ce4479", "#4c7594", "#b885b6", "#6c4c2c", "#eba706", "#7c83e2", "#87e029", "#1bb3eb", "#7a9f8d", "#ce4422", "#4c7594", "#b085b0", "#6c0c8c"
                ];

                $scope.lists = {
                    statistics: [],
                    properties: [],
                    projects: [],
                    addresses: [],
                    categories: [],
                    messages: [],
                    options: [],
                }
                const rec_origin = {
                    doc: {file:null, doc_allowed_roles:['admin.root', 'admin.admin', 'admin.portfolio', 'admin.supervisor', 'admin.callcenter']},
                    dashbaord: {stats: {}, notifications: {}},
                    parent: {},
                    category: { category_params: { icon: '', link: '', isProtected: ''} },
                    property: {property_usp:[], property_currency:'<?=$currCurrency?>'},
                    project: {param_units_size_range:[],adrs_country:'',adrs_city:'',adrs_region:'',adrs_district:'',adrs_street:'',project_loc:'',property_loc:''},
                    developer: { dev_configs: {adrs:'', phone:'', email:'', mobile:''} },
                    seller: { seller_configs: {mngr:{fullname:'', phone:'', email:'', mobile:''}, slr:{fullname:'', phone:'', email:'', mobile:''}} },
                    office: {},
                    search: {
                        property_price: [],
                        param_space: [],
                        param_delivertype: [],
                        param_deliverdate: [],
                        param_totalunits: [],
                        param_blocks: [],
                        param_bldfloors: [],
                        param_residential_units: [],
                        param_commercial_units: [],
                        param_unit_types: [],
                        param_units_size_range: [], 
                        param_netspace: [],
                        param_grossspace: [],
                        param_rooms: [],
                        param_bedrooms: [],
                        param_buildage: [],
                        param_floors: [],
                        param_floor: [],
                        param_heat: [],
                        param_bathrooms: [],
                        param_balconies: [],
                        param_isfurnitured: [],
                        param_isresale: [],
                        param_iscitizenship: [],
                        param_usestatus: [],
                        param_monthlytax: [],
                        param_payment: [],
                        param_ownership: [],
                        param_ownertype: [],
                        param_deposit: [], 
                        param_isresidence: [], 
                        param_iscommission_included: [], 
                        param_titledeed: [], 
                        property_currency: '<?=$currCurrency?>',
                        project_currency: '<?=$currCurrency?>'
                    },
                    address: {}
                }
                $scope.rec = {
                    doc: {file:null, doc_allowed_roles:['admin.root', 'admin.admin', 'admin.portfolio', 'admin.supervisor', 'admin.callcenter']},
                    dashbaord: rec_origin.dashbaord,
                    parent: rec_origin.parent,
                    category: rec_origin.category,
                    property: rec_origin.property,
                    project: rec_origin.project,
                    developer: rec_origin.developer,
                    seller: rec_origin.seller,
                    office: rec_origin.office,
                    search: rec_origin.search,
                    address: rec_origin.address
                }
                $scope.stepStatus = ['current', '', '', '', ''];
                $scope.actionsClr = {
                    getpassword: 'success',
                    save_new: 'info',
                    update: 'primary',
                    delete: 'danger',
                    login: 'success',
                    enable: 'warning',
                    disable: 'warning',
                    delimage: 'warning'
                }

                $scope.project_id_mdl = -1;
                $scope.mapCoords='';

                $scope.newEntity = function(tar, params) {
                    if(tar == 'doc'){ $('#doc-file').val('') }
                    var dt = Object.assign( rec_origin[tar] );
                    $scope.rec[tar] = dt;
                }










                function placeMarker(map_var, location) {
                    if(marker){ marker.setMap(null); }
                    marker = new google.maps.Marker({
                        position: location,
                        map: map_var
                    });
                }

                function geocodeLatLng(map_var, location, tar) {
                    
                    !tar ? ($('div#map_mdl.modal.fade.show').length == 1 ? tar='property' : tar='project') : tar;

                    if(map_var=='map_mdl'){  map_var = map_mdl }
                    if(!map_var){  map_var = map }
                    
                    var geocoder = new google.maps.Geocoder();
                    var latlng = location.toJSON();
                    
                    geocoder.geocode({
                            location: latlng
                        })
                        .then((response) => {
                            if (response.results[0]) {
                                
                                if (response.results[0]) {
                                    $scope.$apply(function() {
                                        $scope.rec[tar].adrs_country = '';
                                        $scope.rec[tar].adrs_city = '';
                                        $scope.rec[tar].adrs_region = '';
                                        $scope.rec[tar].adrs_district = '';
                                        $scope.rec[tar].adrs_street = '';
                                        $scope.rec[tar].project_loc = '';
                                        $scope.rec[tar].property_loc = '';
                                        for (var i = 0; i < response.results[0].address_components.length; i++) {
                                            if (response.results[0].address_components[i].types[0] == 'country') { // country
                                                $scope.rec[tar].adrs_country = response.results[0].address_components[i].long_name;
                                            }
                                            if (response.results[0].address_components[i].types[0] == 'administrative_area_level_1') { // city
                                                $scope.rec[tar].adrs_city = response.results[0].address_components[i].long_name;
                                            }
                                            if (response.results[0].address_components[i].types[0] == 'administrative_area_level_2') { // region
                                                $scope.rec[tar].adrs_region = response.results[0].address_components[i].long_name;
                                            }
                                            if (response.results[0].address_components[i].types[0] == 'locality') { // alternative region
                                                $scope.rec[tar].adrs_region = response.results[0].address_components[i].long_name;
                                            }
                                            if (response.results[0].address_components[i].types[0] == 'administrative_area_level_4') { // district
                                                $scope.rec[tar].adrs_district = response.results[0].address_components[i].long_name;
                                            }
                                            if (response.results[0].address_components[i].types[2] == 'sublocality_level_1') { // alternative district
                                                $scope.rec[tar].adrs_district = response.results[0].address_components[i].long_name;
                                            }
                                            if (response.results[0].address_components[i].types[0] == 'route') { // street
                                                $scope.rec[tar].adrs_street = response.results[0].address_components[i].long_name;
                                            }
                                        }
                                        $scope.rec[tar][tar+'_loc'] = location.toUrlValue();
                                    });
                                }
                            } else {
                                window.alert('<?=__("no_result_found")?>');
                            }
                        })
                        .catch((e) => {
                            console.log(e)
                            window.alert("Geocoder failed due to: " + e)
                        });
                };
                
                // Listen to map clicks and select address
                if('<?=$isMap?>' == '1' && typeof google !== 'undefined'){
                    if('<?=$this->request->getParam('controller')?>' == 'Properties'){
                        google.maps.event.addListener(map, 'click', function(event) {
                            placeMarker(map, event.latLng);
                            geocodeLatLng(map, event.latLng);
                        });
                    }
                    if('<?=$this->request->getParam('controller')?>' == 'Projects'){
                        google.maps.event.addListener(map_mdl, 'click', function(event) {
                            placeMarker(map_mdl, event.latLng);
                            geocodeLatLng(map_mdl, event.latLng);
                        });
                    }
                    // google.maps.event.addListener(map_mdl, 'click', function(event) {
                    //     placeMarker(map_mdl, event.latLng);
                    //     geocodeLatLng(map_mdl, event.latLng);
                    // });
                }

                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    _setCvrBtn('#getLoc_loader', 0);
                    alert(
                        browserHasGeolocation
                        ? '<?=__('geolocation_service_denied')?>'//"Error: The Geolocation service failed."
                        : '<?=__('your_browser_not_support_geolocation_service')?>'//"Error: Your browser doesn't support geolocation."
                    );
                }

                $scope.getLoc = function(map_var, tar) {
                    
                    !tar ? tar='property' : tar;
                    if(map_var=='map_mdl'){  map_var = map_mdl }
                    if(!map_var){  map_var = map }
                    
                    _setCvrBtn('#getLoc_loader', 1);
                    infoWindow = new google.maps.InfoWindow();
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            (position) => {
                                const pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude,
                                };
                                map_var.setCenter(pos);
                                placeMarker(map_var, new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
                                geocodeLatLng(map_var, new google.maps.LatLng(position.coords.latitude, position.coords.longitude), tar);
                                setTimeout(()=>{
                                    _setCvrBtn('#getLoc_loader', 0)
                                },3000)
                            },
                            () => {
                                handleLocationError(true, infoWindow, map_var.getCenter());
                            }
                        );
                    } else {
                        handleLocationError(false, infoWindow, map_var.getCenter());
                    }
                }
                
                $scope.initMap = function(map_var, tar, inputTar){
                    
                    if(map_var=='map_mdl'){ map_var = map_mdl }
                    if(!map_var){ map_var = map }
                    !tar ? tar = 'property' : tar;
                    !inputTar ? inputTar = 'mapPlacesSearch' : inputTar;
                    
                    $scope.rec.address = {
                        adrs_country: $scope.rec[ tar ].adrs_country,
                        adrs_city: $scope.rec[ tar ].adrs_city,
                        adrs_region: $scope.rec[ tar ].adrs_region,
                        adrs_region: $scope.rec[ tar ].adrs_region,
                        adrs_district: $scope.rec[ tar ].adrs_district,
                        adrs_street: $scope.rec[ tar ].adrs_street,
                        adrs_block: $scope.rec[ tar ].adrs_block,
                        adrs_no: $scope.rec[ tar ].adrs_no,
                        property_loc: $scope.rec[ tar ].property_loc,
                        project_loc: $scope.rec[ tar ].project_loc,
                    };
                    var marker = new google.maps.Marker({
                        map: map_var,
                        anchorPoint: new google.maps.Point(0, -29)
                    });
                    var input = document.getElementById(inputTar);
                    var autocomplete = new google.maps.places.Autocomplete(input);
                    
                    var latLng = $scope.rec.project.project_loc.split(',');
                    
                    if(latLng.length > 1){
                        map_var.setCenter(new google.maps.LatLng( latLng[0], latLng[1] ));
                        placeMarker(map_var, new google.maps.LatLng( latLng[0], latLng[1] ));
                    }

                    google.maps.event.addListener(autocomplete, 'place_changed', function() {
                        
                        var place = autocomplete.getPlace();
                        var lat = place.geometry.location.lat()
                        var lng = place.geometry.location.lng()

                        map_var.setCenter(new google.maps.LatLng( lat, lng ));

                        map_var.setZoom(15);
                        
                        placeMarker(map_var, new google.maps.LatLng(lat, lng));
                        geocodeLatLng(map_var, new google.maps.LatLng(lat, lng));

                    })
                }

                $scope.initMapDelay = function(map_var, tar, inputTar){
                    $timeout(function(){
                        return $scope.initMap(map_var, tar, inputTar)
                    }, 1500)
                }
                
                $scope.getLatLng = function(coords, map_var){

                    if(map_var=='map_mdl'){  map_var = map_mdl }
                    if(!map_var){  map_var = map }

                    if(coords.indexOf('http')>-1){
                        var spliter = null;
                        if(coords.indexOf('/@') > -1){ spliter='/@'; }
                        if(coords.indexOf('?ll=') > -1){ spliter='?ll='; }
                        if(!spliter){return alert('<?=__('wrong_map_link')?>');}

                        var parts = coords.split(spliter) 
                        parts = parts[1].split(",");
                        coords = parts[0]+','+parts[1]
                    }
                    const coords_arr = coords.split(",");
                    if(coords_arr.length != 2){return alert('<?=__('wrong_coords')?>')}
                    map_var.setCenter(new google.maps.LatLng(
                        coords_arr[0],coords_arr[1]
                    ));
                    placeMarker(map_var, new google.maps.LatLng(coords_arr[0], coords_arr[1]));
                    geocodeLatLng(map_var, new google.maps.LatLng(coords_arr[0], coords_arr[1]));
                }
                
                $scope.getProjectLoc = function(project_id){
                    _setCvrBtn('#main_preloader', 1)
                    _doRequest('/admin/projects/?id='+project_id, false, 'post').then( function(res){
                        _setCvrBtn('#main_preloader', 0)
                        if (res.data.status == "SUCCESS") {
                            if(!res.data.data.adrs_country){
                                $scope.step2.isProjectShow = false;
                                $scope.step2.isMapShow = true;
                                showPNote('<?= __('note-message') ?>', '<?= __('project_doesnt_have_address') ?>', 'error');
                            }
                            $scope.rec.property.adrs_country = res.data.data.adrs_country;
                            $scope.rec.property.adrs_city = res.data.data.adrs_city;
                            $scope.rec.property.adrs_region = res.data.data.adrs_region;
                            $scope.rec.property.adrs_district = res.data.data.adrs_district;
                            $scope.rec.property.adrs_street = res.data.data.adrs_street;
                            $scope.rec.property.property_loc = res.data.data.project_loc;
                            $scope.rec.property.project_id = res.data.data.id;
                        } else {
                            showPNote('<?= __('note-message') ?>', '<?= __('project_not_found') ?>', 'error');
                        }
                    })
                }











            
                $scope.showPNote = function(_title, _msg, _type, _isHide, _delay) {
                    return showPNote(_title, _msg, _type, _isHide, _delay)
                }

                $scope.setDate = function(dt, p, flag) {
                    return _setDate(dt, p, flag)
                }

                $scope.compareDate = function(dt1, dt2) {
                    !dt2 ? dt2 = new Date() : dt2;
                    return new Date(dt1).getTime() <= new Date(dt2).getTime()-10000;
                }

                $scope.nFormat = function(v, unit, round) {
                    return nFormat(v, unit, round)
                }

                $scope.search_val_clm = function(val, ctrl) {
                    if(val.indexOf('param_') > -1 ){
                        return ctrl == 1 ? 'PROP_SPECS' : 'PROJ_SPECS';
                    }
                    if('features_ids' == val ){
                        return ctrl == 1 ? 'PROP_FEATURES' : 'PROJ_FEATURES';
                    }
                    if('language_id' == val ){
                        return 'language_id';
                    }
                    if('property_usp' == val ){
                        return 'USP';
                    }
                    if('property_currency' == val ){
                        return 'currencies';
                    }
                    return '';
                }
                
                $scope.getLastId = function(obj, isKey) {
                    !isKey ? isKey = true : isKey;
                    var keysObj = Object.keys(obj);
                    var res = isKey ? keysObj[keysObj.length-1] : obj[ keysObj[keysObj.length-1] ];
                    return res+'';
                }


                $scope.copyToClipBoard = function(tar) {
                    navigator.clipboard.writeText(tar).then(function() {
                        showPNote('<?= __('note-message') ?>', '<?= __('link_copied') ?>', 'success');
                    }, function(err) {
                        console.error('Async: Could not copy text: ', err);
                        showPNote('<?= __('note-message') ?>', '<?= __('link_copy_failed') ?> '+err, 'error');
                    });
                }

                $scope.currencyConverter =  function(from, to, price) {
                    var ratios = DtSetter('ratios', 'list');
                    // console.log('ratios', from, to, price ,ratios);
                    if(from == to){return nFormat(price);}// no need convertion if the same currency
                    if(from == 'USD'){// reverse db ratio and multiply it by price
                        return nFormat( price * (1 / (ratios[to+'_USD']*1)) )
                    }
                    if(to == 'USD'){// this match our ratio values from X to USD
                        return nFormat( price * (ratios[from+'_'+to]*1) )
                    }
                    var toUsd = price * (ratios[from+'_USD']*1)// convert X to USD
                    return nFormat( toUsd * (1 / (ratios[to+'_USD']*1)));// multiplay with the price
                }

                $scope.empty = function(v) {
                    if (!v) { return true; }
                    if (typeof v === 'number') { return false; }
                    if (typeof v === 'array' || typeof v === 'string') {
                        if (v.length == 0) { return true; }
                    }
                    if (typeof v === 'object') {
                        v = Object.keys(v).filter(function(k) {
                            return v[k] !== false;
                        });
                        if (Object.keys(v).length == 0) {
                            return true;
                        }
                        // for (var prop in obj) {
                        //     var value = obj[prop];
                        //     if (typeof obj[prop] !== 'object') {
                        //         continue;
                        //     }
                        //     var arr = $.map(value, function(val, index) {
                        //         return [val];
                        //     });
                        // }
                    }
                    return false;
                }

                $scope.isArray = function(v) {
                    return (typeof v === 'object' || typeof v === 'array');
                }

                $scope.removeFilter = function(tar, key, ind) {
                    if (tar == 'adrs') {
                        $scope.rec.search[key] = ''
                    }
                    if ('keyword,language_id,stat_updated,stat_created,category_id'.indexOf(tar)>-1) {
                        $scope.rec.search[tar] = ''
                    }
                    if ('features_ids,property_usp'.indexOf(tar)>-1) {
                        $scope.rec.search[tar][key] = false
                    }
                    if (tar == 'slide') {
                        $scope.rec.search[key] = [];
                    }
                    if (tar == 'specs') {
                        $scope.rec.search[key].splice(ind, 1);
                    }
                    if (tar == 'specs_one_id') {
                        $scope.rec.search[key] = [];
                    }
                    $scope.doSearch();
                }
                
                $scope.getPercentage = function( arr, val ){
                    var max=0;
                    for(var i=0; i<arr.length; i++){
                        if(arr[i]*1 > max){max = arr[i]};
                    }
                    var avrg = max/100;
                    return Math.floor( (val*1) / avrg );
                }
                
                $scope.toImage = function(tar){
                    html2canvas(document.querySelector(tar)).then(canvas => {
                        $('#imgHolder').html('<img src="'+canvas.toDataURL("image/png")+'"><i class="fa fa-times" aria-hidden="true"></i>');
                        $('#imgHolder').attr("style","opacity: 1; z-index:1111;");
                    })
                }
                $scope.clrs = [
                    "#7bb3eb", "#eba556", "#7c81e5", "#87e089", "#7a6f8d", "#ce4472", "#4c7494", "#b085b6", "#6c4c8c", "#eba556", "#7c81e5", "#87e089", "#7bb3eb", "#7a6f8d", "#ce4472", "#4c7494", "#b085b6", "#6c4c8c", 
                    "#7bb5eb", "#eba756", "#7c83e5", "#87e389", "#7a8f8d", "#ce4475", "#4c7496", "#b385b6", "#6c8c8c", "#eba856", "#7c85e5", "#87e069", "#5bb3eb", "#7a3f8d", "#ce4475", "#4c7498", "#b085b9", "#6c8c8c",
                    "#7bb7eb", "#eba956", "#7c85e5", "#87e689", "#7a4f8d", "#ce4477", "#4c7498", "#b585b6", "#6c4c5c", "#eba606", "#7c85e1", "#87e049", "#3bb3eb", "#7a0f8d", "#ce4479", "#4c7454", "#b085b3", "#6c6c8c",
                    "#7bb9eb", "#eba626", "#7c87e5", "#87e989", "#7a0f8d", "#ce4479", "#4c7594", "#b885b6", "#6c4c2c", "#eba706", "#7c83e2", "#87e029", "#1bb3eb", "#7a9f8d", "#ce4422", "#4c7594", "#b085b0", "#6c0c8c"
                ]

                $scope.chkAdrs = function(obj) {
                    // console.log(obj)
                    const adrs = {
                        adrs_country: obj.adrs_country ? obj.adrs_country : '',
                        adrs_city: obj.adrs_city ? obj.adrs_city : '',
                        adrs_region: obj.adrs_region ? obj.adrs_region : '',
                        adrs_block: obj.adrs_block ? obj.adrs_block : '',
                        adrs_no: obj.adrs_no ? obj.adrs_no : '',
                        property_loc: obj.property_loc ? obj.property_loc : '',
                    }
                    var tar = ctrl == 'projects' ? 'project' : 'property';
                    for (var k in adrs) {
                        if (ctrl == 'projects' && 'adrs_block,adrs_no'.indexOf(k) > -1) {
                            continue;
                        }
                        if (adrs[k].length < 1) {
                            showPNote('<?= __('note-message') ?>', '<?= __('please-fill-this-field') ?>: ' + $scope.DtSetter('adrs', k), 'error');
                            var error = {}
                            error[k] = {"_empty":"<?=__('error_empty')?>"}
                            return _getErrors(error, '#address_form');
                        }
                    }
                    $scope.rec[tar].adrs_country = obj.adrs_country;
                    $scope.rec[tar].adrs_city = obj.adrs_city;
                    $scope.rec[tar].adrs_region = obj.adrs_region;
                    $scope.rec[tar].adrs_district = obj.adrs_district;
                    $scope.rec[tar].adrs_street = obj.adrs_street;
                    $scope.rec[tar].adrs_block = obj.adrs_block;
                    $scope.rec[tar].adrs_no = obj.adrs_no;

                    if (obj.id > 0) {
                        obj.img = $scope.filesInfo[tar + '_photos'];
                        $scope.doSave($scope.rec[tar], tar, ctrl, ($scope.param1 > 0) ? '#' + tar + '_btn' : false);
                    }
                    doClick('.close')
                }

                $scope.chkSteps = function(obj, step) {

                    $("#property-oldprice").blur(); $("#property-price").blur();
                    
                    const clms = {
                        1: ['adrs_country', 'adrs_city', 'adrs_region', 'adrs_block', 'adrs_no', 'property_loc', 'category_id'],//, 'adrs_district', 'adrs_street'
                        2: ['param_isresale', 'param_iscitizenship', 'param_rooms', 'param_floor', 'param_buildage', 'param_grossspace'],
                        3: {direction:[403,404,405,406], scenery:[425,426,427,428,429,430,431]},
                        4: [],
                        5: [],
                    }
                    var isWrong = true,
                        clm = false;

                    for (var k in clms[step]) {
                        if( '3'.indexOf(step)>-1 ) {
                            var filtered = Object.entries(obj.features_ids).filter(([key, value]) => value);
                            clm = k; 
                            for(var k2 in clms[step][k]){
                                if ( JSON.stringify(filtered).indexOf(clms[step][k][ k2 ]) > -1 ) { 
                                    isWrong = false; break;
                                }
                            }
                        }else{
                            if( obj[ clms[step][k] ] ){ 
                                if( obj[ clms[step][k] ].length > 0 ){ isWrong = false }
                            }
                        }
                        if ( isWrong ) {toElm
                            showPNote('<?= __('note-message') ?>', '<?= __('please-fill-this-field') ?>: ' + (clm || clms[step][k]), 'error');
                            var error = {}
                            error[ clm || clms[step][k] ] = {"_empty":"<?=__('error_empty')?>"}
                            return _getErrors(error, '#property_form');
                        }
                        isWrong = true;
                    }
                    
                    obj.img = $scope.filesInfo.property_photos;

                    var cat = DtSetter('PROP', obj.category_id);
                    var rooms = DtSetter('ROOMS', obj.param_rooms);
                    var usp = !obj.property_usp ? '' : obj.property_usp[0];

                    if($scope.empty( obj.property_title ) || obj.property_title.indexOf('[auto]')>-1 ){
                        obj.property_title = [obj.adrs_region+'/'+obj.adrs_city, cat, usp, rooms].join(", ")+'[auto]';
                    }
                    $scope.doSave($scope.rec.property, 'property', ctrl, $scope.isRedirect ? 'redirect' : '#property_btn', '#properties_preloader');
                    
                }

                $scope.DtSetter = function(tar, val) {
                    return DtSetter(tar, val)
                }

                const nToArray = function(num) {
                    var arr = [];
                    for (var i = 0; i < num; i++) {
                        arr[i] = i
                    }
                    return arr;
                }

                $scope.getLen = function(obj){
                    if(typeof obj !== 'object'){return 0;}
                    var obj_filtered = Object.keys(obj).filter(function(k) {
                            return obj[k] !== false;
                        });
                    return obj_filtered.length;
                }

                $scope.pager = function(total, curr) {
                    var arr = nToArray(total + 1).slice(curr, curr + 3)
                    if (curr > 1) {
                        arr.unshift(curr - 1)
                    }
                    if (curr > 2) {
                        arr.unshift(curr - 2)
                    }
                    return arr;
                }

                $scope.chkAll = function(tar, val) {
                    var all = $(tar + " input");
                    $scope.selected = {}
                    for (var i = 0; i < all.length; i++) {
                        $(all[i]).prop('checked', val)
                        if (!val) {
                            continue;
                        }
                        $scope.selected[$(all[i]).val()] = true
                    }
                }

                $scope.toElm = function(tar) {
                    var elmTarget = $(!tar ? "body" : "#" + tar).offset().top;
                    $("html").animate({
                        scrollTop: elmTarget
                    }, 1000);
                }

                $scope.formatter = function(val){
                    var suffix = "$" ;
                    var prefix = " USD" ;
                    var v = suffix+ val.replace('.','').toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") +prefix;
                    return v;
                }

                $scope.closeModal = function(tar){
                    $(tar).modal('hide');
                }

                $scope.openModal = function(tar){
                    let currentCtrl = ctrl == 'properties' ? 'property' : 'project';
                    $(tar).modal('show');
                    if(tar == '#addEditSeller_mdl'){ $scope.rec[currentCtrl].seller_id = ''; }
                    if(tar == '#addEditDeveloper_mdl'){ $scope.rec[currentCtrl].developer_id = ''; }
                    if(tar == '#addEditProject_mdl'){ 
                        $scope.rec[currentCtrl].project_id = '';  
                        $scope.initMap('map_mdl', 'project', 'mapPlacesSearch_mdl'); 
                    }
                    $timeout(() => {
                        $('.selectpicker').selectpicker('refresh');
                    }, 100);
                }

                $scope.getPhoto = function(fileToUpload, photo, folder, noimg) {
                    // console.log(fileToUpload, photo, folder, noimg)
                    !fileToUpload ? fileToUpload = false : fileToUpload;
                    !photo ? photo = '' : photo;
                    !folder ? folder = '' : folder;
                    !noimg ? noimg = 'noimg.svg' : noimg;
                    
                    if (fileToUpload == 'camera') {
                        return photo;
                    }
                    if (fileToUpload) {
                        return fileToUpload;
                    }
                    var path = '<?= $app_folder ?>/img/' + folder + '_photos/thumb'
                    if (photo.length > 3) {
                        return path + '/' + photo
                    }
                    return '<?= $app_folder ?>/img/' + noimg
                }
                $scope.openCamera = function(cameraTarget){
                    $('#camera_mdl').modal('show');

                    // var constrains = { width: { min: 400, ideal: 900, max: 1200 }, facingMode: { exact: "environment" } }
                    
                    navigator.mediaDevices.enumerateDevices()
                    .then(function(devices) {
                        if(devices.length>0){

                            let ww = $(window).width()*1;
                            let hh = $(window).height()*1;

                            var constraints = { audio: true, 
                                video: { 
                                    width: {min: ww, ideal: ww*1.5, max: ww*2}, //ww*1.5, 
                                    height: {min: hh, ideal: hh*1.5, max: hh*2}
                                }, 
                                facingMode: { exact: "environment" } 
                            }

                            !cameraTarget ? cameraTarget = constraints : cameraTarget;
                            
                            var vidObj = { video: cameraTarget , audio: false }
                            const stream = navigator.mediaDevices.getUserMedia(vidObj)
                                .then(function(stream) {
                                    
                                var orientation = screen.orientation.type.startsWith("portrait") ? "portrait" : "landscape";
                                    alert('<?=__('your_camera_orientation')?> ' + orientation);
                                    $scope.camera_stream_settings = stream.getVideoTracks()[0].getSettings();
                                    window.localStream = stream;
                                    document.querySelector('video').srcObject = stream;
                                })
                                .catch(function(e) {
                                    showPNote('<?= __('note-message') ?>', e.name, 'error');
                                });
                        }else{
                            showPNote('<?= __('note-message') ?>', '<?=__('Media device not found!')?>', 'error');
                        }
                    })
                    .catch(function(err) {
                        console.log(err.name + ": " + err.message);
                    });
                }

                $scope.stopCamera = function(){
                    if(typeof localStream === 'undefined'){return ;}
                    localStream.getTracks().forEach((track) => {
                        track.stop();
                    })
                }

                $scope.takePhoto = function(settings) {
                    
                    _setCvrBtn('#takePhoto_btn', 1, 'camera-retro');
                    playSound('img/shutter.mp3');
                    $timeout(function(){
                        var canvas = document.createElement("canvas");
                            canvas.width = settings.width ;
                            canvas.height = settings.height ;
                        canvas.getContext('2d').drawImage( document.querySelector('video'), 0, 0, canvas.width, canvas.height );//640, 480
                        
                        let img = {
                            tmp_name : canvas.toDataURL("image/png"),
                            type : 'image/png',
                            size : 3000000,
                        };
                        $scope.filesInfo.property_photos.push(img);
                        _setCvrBtn('#takePhoto_btn', 0, 'camera-retro');
                        doClick('.close');
                    },100)
                }

                $scope.takeVideo = function(settings) {
                    var canvas = document.createElement("canvas");
                    canvas.width = settings.width;
                    canvas.height = settings.height;

                    canvas.getContext('2d').drawImage( document.querySelector('video'), 0, 0, settings.width, settings.height );
                    let img = canvas.toDataURL("image/png");// .replace("image/png", "image/octet-stream");
                    $scope.rec.workSession.img.tmp_name = img;
                    preview.src = img;
                }

                $scope.getImg = function() {
                    let img = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
                    // console.log(img)
                    // window.location.href=img; 
                }

                $scope.doClick = function(tar, delay) {
                    return doClick(tar, delay)
                }

                $scope.doFilter = function() {
                    var url = [];
                    angular.forEach($scope.search, function(v, k) {
                        if (v) {
                            url.push(k + '=' + v)
                        }
                    })
                    $scope.goTo('/admin/' + ctrl + '/' + actn + '?' + url.join('&'))
                }

                $scope.goTo = function(path, ext = null) {
                    if (ext == 'param') {
                        return window.location.href = window.location.pathname + path
                    }
                    if (ext) {
                        return window.open($scope.dmn + $scope.app_folder + path)
                    }
                    return window.location.href = $scope.dmn + $scope.app_folder + path
                }

                $scope.showMenu = function(tar) {

                    !tar ? tar = $('.left_col').css('left') : tar;

                    if (tar == '0px' || tar == 'hide') {
                        $('.left_col').css('left', '-230px');
                        $('.bg-sidemenu').css('display', 'none');
                    } else {
                        $('.left_col').css('left', '0');
                        $('.bg-sidemenu').css('display', 'block');
                    }
                }

                /////////// Data Requests Handling Functions ///////////////

                var headers = {
                    'X-CSRF-Token': '<?= $this->request->getCookie('csrfToken') ?>',
                    '_Token': '<?= $this->request->getCookie('csrfToken') ?>',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
                var _doRequest = function(url, obj, method) {

                    !method ? method = 'get' : method;
                    !obj ? obj = null : obj;

                    if( url.indexOf('http') == -1){
                        url.indexOf($scope.app_folder) > -1 ? url : url = $scope.app_folder + url
                    }

                    var requestObj = {
                        dataType: 'xhr',
                        method: method,
                        url: url,
                        data: obj,
                        headers: headers
                    }
                    return $http(requestObj)
                }

                // $scope.multiHandle = function(url, tar) {
                //     !tar ? tar = $scope.selected : tar;
                //     if(Object.keys(tar).length < 1){
                //         return showPNote('<?= __('note-message') ?>', '<?= __('is-selected-empty-msg') ?>', 'error');
                //     }
                //     !url ? url = $scope.path + '/' + $scope.currlang : $scope.path + '/' + $scope.currlang + url;

                //     // console.log(tar)
                //     var msg = '<?= __('delete_selected_records') ?>';
                //     var method = "delete";

                //     if (url.indexOf('enable/1') > -1) {
                //         msg = '<?= __('enable_selected_records') ?>'
                //     }
                //     if (url.indexOf('enable/0') > -1) {
                //         msg = '<?= __('disable_selected_records') ?>'
                //     }
                //     if (url.indexOf('enable/2') > -1) {
                //         msg = '<?= __('sold_selected_records') ?>'
                //     }
                //     if (url.indexOf('assign/') > -1) {
                //         msg = '<?= __('assign_selected_records') ?>'
                //     }
                //     if (url.indexOf('assign/publish') > -1) {
                //         msg = '<?= __('publish_selected_records') ?>'
                //     }
                //     if (confirm(msg)) {

                //         var ids = Object.keys(tar).filter(function(k) {
                //             return tar[k] !== false;
                //         });
                //         // return console.log(ids.join())
                //         _doRequest(url + '/' + ids.join(), false, method).then(function(res) {
                //             if (res.data.redirect) {
                //                 window.location.href = res.data.redirect
                //             }
                //             if (res.data.status == "SUCCESS") {
                //                 $scope.selected = {}
                //                 showPNote('<?= __('note-message') ?>', res.data.msg || '<?= __('multi-handling-success') ?>', 'success');
                //                 setTimeout(function() {
                //                     $scope.doSearch('dont_log');
                //                     // $scope.doGet('/admin/' + ctrl.toLowerCase() + '/index?list=1&page='+$scope.paging.page, 'list', ctrl.toLowerCase());
                //                 }, 1000)
                //             } else {
                //                 showPNote('<?= __('note-message') ?>', res.data.msg || '<?= __('multi-handling-fail') ?>', 'error');
                //             }
                //         })
                //     }
                // }

                $scope.multiHandle = function (url, tar, _pid) {
                    !tar ? tar = $scope.selected : tar;
                    if (Object.keys(tar).length < 1) {
                        return showPNote('<?= __('note-message') ?>', '<?= __('is-selected-empty-msg') ?>', 'error');
                    } !url ? url = $scope.path + '/' + $scope.currlang : $scope.path + '/' + $scope.currlang + url;

                    // console.log(tar)
                    var msg = '<?= __('delete_selected_records') ?>';
                    var method = "delete";

                    if (url.indexOf('enable/1') > -1) {
                        msg = '<?= __('enable_selected_records') ?>'
                    }
                    if (url.indexOf('enable/0') > -1) {
                        msg = '<?= __('disable_selected_records') ?>'
                    }
                    if (url.indexOf('enable/2') > -1) {
                        msg = '<?= __('sold_selected_records') ?>'
                    }
                    if (url.indexOf('assign/') > -1) {
                        msg = '<?= __('assign_selected_records') ?>'
                    }
                    if (url.indexOf('assign/publish') > -1) {
                        msg = '<?= __('publish_selected_records') ?>'
                    }
                    if (confirm(msg)) {

                        var ids = Object.keys(tar).filter(function (k) {
                            return tar[k] !== false;
                        });
                        // return console.log(ids.join())
                        _doRequest(url + '/' + ids.join(), false, method).then(function (res) {
                            if (res.data.redirect) {
                                window.location.href = res.data.redirect
                            }
                            if (res.data.status == "SUCCESS") {
                                $scope.selected = {}
                                showPNote('<?= __('note-message') ?>', res.data.msg || '<?= __('multi-handling-success') ?>', 'greenBg');
                                if(ctrl == 'categories'){
                                    setTimeout(function () {
                                        $scope.doGet('/admin/' + ctrl.toLowerCase() + '/index/'+ _pid + '?list=1', 'list', ctrl.toLowerCase());
                                    }, 100)
                                }else{
                                    setTimeout(function () {
                                        $scope.doGet('/admin/' + ctrl.toLowerCase() + '/index?list=1', 'list', ctrl.toLowerCase());
                                    }, 100)
                                }
                                
                            } else {
                                showPNote('<?= __('note-message') ?>', res.data.msg || '<?= __('multi-handling-fail') ?>', 'redBg');
                            }
                        })
                    }
                }
                
                $scope.doGet = function(url, type, tar, preloader) {

                    !type ? type = 'list' : type;
                    !preloader ? preloader = '#main_preloader' : preloader;
                    if (preloader) { _setCvrBtn(preloader, 1) }
                    _doRequest(url, null, 'post').then(function(res) {

                        let c = ctrl == 'properties' ? 'property': 'project'
                        if(type == 'reload'){location.reload();}
                        if (res.data.redirect) {
                            window.location.href = res.data.redirect
                        }
                        if (res.data.projects_list) {
                            if(tar != 'sellers_list'){
                                $scope.lists.projects_list = res.data.projects_list;
                                $scope.rec[ c ].project_id = $scope.getLastId($scope.lists.projects_list)
                            }
                        }
                        if (res.data.developers_list) {
                            $scope.lists.developers_list = res.data.developers_list
                            $scope.rec[ c ].developer_id = $scope.getLastId($scope.lists.developers_list)
                        }
                        if (res.data.sellers_list) {
                            $scope.lists.sellers_list = res.data.sellers_list
                            $scope.rec[ c ].seller_id = $scope.getLastId($scope.lists.sellers_list)
                        }
                        if (preloader) {
                            _setCvrBtn(preloader, 0)
                        }
                        if (type == 'list') {
                            $scope.lists[tar] = angular.fromJson( res.data.data );
                            if (res.data.paging) {
                                $scope.paging = res.data.paging
                            }
                        } else {
                            $scope.rec[tar] = angular.fromJson( res.data.data );
                        }
                        
                        $timeout(() => {
                            $('.selectpicker').selectpicker('refresh');
                        }, 100);
                    })
                }
                var doGetTm;
                $scope.doGetDelay = function(url, type, tar, preloader, delay) {
                    !delay ? delay = 1500 : delay;
                    clearTimeout(doGetTm)
                    doGetTm = setTimeout(function() {
                        return $scope.doGet (url, type, tar, preloader)
                    }, delay);
                }

                $scope.doSave = function(orginialObj, tar, ctrl, btn, preloader, form) {

                    !tar ? tar = 'package' : tar;
                    !ctrl ? ctrl = '<?= strtolower($this->request->getParam("controller")) ?>' : tar;
                    !btn ? btn = false : btn;
                    !preloader ? preloader = false : preloader;
                    !form ? form = false : form;

                    var obj = {}
                    Object.assign(obj, orginialObj);

                    !obj.id ? obj.id = -1 : obj.id;

                    var defer = $q.defer();
                    var method = obj.id > -1 ? "PUT" : "POST";

                    // remove messages
                    _getErrors([], !form ? '#' + tar + '_form' : form);

                    if (preloader) {
                        _setCvrBtn(preloader, 1);
                    }
                    
                    defer.resolve(
                        _doRequest('/admin/' + ctrl + '/save/' + obj.id, obj, method, 'save_' + tar + '_btn', 'save', tar + '_form')
                    )
                    var done = defer.promise;
                    
                    done.then(function(res) {
                        if (preloader) {
                            _setCvrBtn(preloader, 0)
                        }
                        if (res.data.redirect) {
                            window.location.href = res.data.redirect
                        }
                        if (res.data.status == 'SUCCESS') {

                            showPNote('<?= __("sys-msg") ?>', res.data.msg || '<?= __("save-success") ?>', "success");

                            if (btn=='redirect') { 
                                return window.location.href = '<?=$app_folder?>/admin/properties/index'
                            }
                            if (btn) { 
                                doClick(btn); 
                            }
                            if (ctrl == 'projects') {
                                if(!$scope.rec.project.id){
                                    doClick('#step3_btn', 100);
                                }
                                $scope.rec.project = res.data.data ; 
                                return ;
                            }
                        } else {
                            showPNote('<?= __("sys-msg") ?>', res.data.msg || '<?= __("save-fail") ?>', "error");
                            _getErrors(res.data.data, !form ? '#' + tar + '_form' : form);
                        }
                    })
                }

                $scope.doDelete = function(url, doUpdate) {
                    if (confirm("<?= __('delete_confirm') ?>")) {
                        _doRequest(url, {
                            id: url
                        }, "DELETE").then(function(res) {
                            if (res.data.redirect) {
                                window.location.href = res.data.redirect
                            }
                            if (res.data.status == 'SUCCESS') {
                                if (doUpdate) {
                                    doClick(doUpdate)
                                }
                            } else {
                                console.log(res.data)
                            }
                        })
                    }
                }

                $scope.delImage = function(url, image, doUpdate) {
                    if (confirm('<?= __('do_you_want_to_delete_image') ?>')) {
                        _doRequest(url, image, "DELETE").then(function(res) {
                            if (res.data.redirect) {
                                window.location.href = res.data.redirect
                            }
                            if (res.data.status == "SUCCESS") {
                                if (doUpdate) {
                                    doClick(doUpdate)
                                }
                                showPNote('<?= __('note-message') ?>', '<?= __('delete-image-success') ?>', 'success');
                            } else {
                                showPNote('<?= __('note-message') ?>', '<?= __('delete-image-fail') ?>', 'error');
                            }
                        });
                    }
                }
                
                var doSearchUpdt;
                var lastSearch = '';
                $scope.doSearch = function(isPager) {

                    !isPager ? isPager='' : isPager;

                    if( lastSearch == JSON.stringify($scope.rec.search) && isPager == ''){
                        return false;
                    }

                    $timeout.cancel(doSearchUpdt);
                    _setCvrBtn('#main_preloader', 1);
                    doSearchUpdt = $timeout(function() {

                        _doRequest('<?= $app_folder ?>/admin/' + ctrl + '/search?' + isPager , $scope.rec.search, 'post').then(function(res) {

                            lastSearch = JSON.stringify( $scope.rec.search );
                            
                            _setCvrBtn('#main_preloader', 0);

                            if (res.data.status == "SUCCESS") {
                                $scope.lists[ctrl] = res.data.data
                                if (res.data.paging) {
                                    $scope.paging = res.data.paging
                                }
                                isPager ? '' : showPNote('<?= __('note-message') ?>', '<?= __('search-success') ?>', 'success');
                            } else {
                                showPNote('<?= __('note-message') ?>', '<?= __('search-fail') ?>', 'error');
                            }
                        })
                    }, 100);
                }

                $scope.doUsersSearch = function(tar, url, listTar) {

                    var models = {
                            users: 'user_fullname'
                        }

                        !tar ? tar = 'users' : tar;
                    !url ? url = 'admin/' + tar + '?list=1&method=like&col=' + models[tar] + '&k=' + $scope.search_keywork[tar] : url;
                    !listTar ? listTar = 'users' : listTar;

                    if ($scope.search_keywork[tar].length > 0) {
                        $scope.doGet($scope.app_folder + '/' + $scope.currlang + '/' + url, 'list', listTar, '#search_loader');
                    } else {
                        $scope.lists[tar] = [];
                    }
                }

                var findAddressTm;
                $scope.findAddress = function(col, isReturn) {
                    clearTimeout(findAddressTm);
                    findAddressTm = setTimeout(function(){
                        console.log('$scope.rec.search', $scope.rec.search.adrs_city)
                        var obj = {}
                        const adrs = 'adrs_country,adrs_city,adrs_region,adrs_district';
                        for (var k in $scope.rec.search) {
                            if (adrs.indexOf(k) > -1 && typeof $scope.rec.search[k] !== 'undefined') {
                                if ($scope.rec.search[k].length > 0) {
                                    obj[k] = $scope.rec.search[k]
                                }
                            }
                        }
                        _doRequest('/admin/' + ctrl.toLowerCase() + '/index?adrslist=' + col, obj, 'post').then(function(res) {
                            if (res.data.status == "SUCCESS") {
                                if(isReturn){ return res.data.data; }
                                $scope.lists.addresses[col] = res.data.data;
                            } else {
                                showPNote('<?= __('note-message') ?>', '<?= __('no-search-result-found') ?>', 'error');
                            }
                        })
                    },800)
                }

                if('<?=$this->request->getQuery('msg') ? 1 : 0?>' === '1'){//_title, _msg, _type, _isHide, _delay
                    showPNote('<?= __('note-message') ?>', '<?=$this->request->getQuery('msg')?>', 'warning', false, 10000);
                }
                
                if('<?=$this->request->getQuery('view_rec') ? 1 : 0?>' == 1){
                    var controller = '<?=$this->request->getParam('controller');?>';
                    controller = controller == 'Properties' ? 'Propertys' : controller;
                    $scope.doGet('<?=$app_folder?>/admin/'+ctrl+'?id=<?=$this->request->getQuery('view_rec')?>', 'rec', controller.substr(0,controller.length-1).toLowerCase());
                    $scope.openModal('#view'+controller.substr(0,controller.length-1)+'_mdl')
                }
                // PREVENT SESSION EXPIRE
                var refreshTime = 5 * 60 * 1000; // min * sec * millisec
                $interval( function() {
                    _doRequest('/admin/configs/refresher')
                }, refreshTime );
            });

            // DIRECTIVE //////////////////////////////////////////////////////
            app.directive('chk', function() {
                return {
                    scope: {
                        chk: '@'
                    },
                    link: function(scope, element, attrs, ctrl) {
                        element.bind('blur', onBlur);

                        function onBlur(ctrl) {
                            if (attrs.type == 'checkbox' || attrs.type == 'radio') {
                                var newid = attrs.id.substr(0, attrs.id.length - 1);
                                var elms = document.querySelectorAll('[id^=' + newid + ']');
                                for (var i in elms) {
                                    if (elms[i].checked == true) {
                                        return _setError(element[0], '', true);
                                    } else {
                                        _setError(element[0], errorMsg[scope.chk]);
                                    }
                                }
                            } else {
                                if (ptrn[scope.chk].test(element[0].value)) {
                                    _setError(element[0], '', true);
                                } else {
                                    _setError(element[0], errorMsg[scope.chk]);
                                }
                            }
                            scope.$apply();
                        }
                    }
                };
            });
            app.directive('doFormat', function($compile) {
                return {
                    restrict: 'AE',
                    require: 'ngModel',
                    link: function(scope, elm, attr, ctrl) {
                        $(elm).maskMoney({
                            prefix: attr.prefix || '',
                            suffix: attr.suffix || '',
                            decimal: ",", 
                            thousands: ".", 
                            allowZero: true, 
                            allowNegative: false, 
                            precision: 0 
                        });
                    }   
                }
            });

            app.directive('setIframe', function($compile) {
                return {
                    restrict: 'AE',
                    link: function($scope, elm, attr, ctrl) {
                        var iframe = $compile(`
                            <iframe width="100%" ng-src="https://www.youtube.com/embed/`+attr.setIframe+`" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        `)($scope);
                        $(elm).html(iframe)
                    }   
                }
            });

            app.filter('urlcrypt', function() {
                return window.decodeURIComponent;
            });

            app.directive('datePicker', function($timeout) {
                return {
                    restrict: "A",
                    scope: false,
                    require: '?ngModel',
                    link: function($scope, $element, $attr, ngModel) {
                        if('onlyMonthYear'.indexOf($attr.datePicker)<0){return ;}
                        
                        if($attr.datePicker == 'onlyMonthYear'){
                            $timeout(function() {
                                $('.calendar-table').addClass('onlyMonthYear');
                                $('.drp-buttons').css('display', 'block');
                            }, 100);
                        }
                        $($element).daterangepicker({
                            singleDatePicker: !$attr.isRange,
                            cancelText: 'Clear',
                            autoUpdateInput: $attr.datePicker == 'onlyMonthYear' ? false : true,
                            showDropdowns: true,
                            locale: {
                                format: "MM/DD/YYYY",
                            },
                            container: '#addEditProject_mdl modal-body'
                        }, function(start, end) {
                            $element.val(_setDate(start._d, false, $attr.datePicker == 'onlyMonthYear' ? 'onlyMonthYear' : 'onlydate'));
                            ngModel.$setViewValue($element.val());
                        });
                        // $($element).on('hide.daterangepicker', function(ev, picker) {
                        //     return $element.val(_setDate(picker.leftCalendar.month._d, false, $attr.datePicker == 'onlyMonthYear' ? 'onlyMonthYear' : 'onlydate'));
                        // });
                        $($element).on('apply.daterangepicker', function(ev, picker) {
                            var dt = _setDate( picker.leftCalendar.month._d, false, 'onlydate' );
                            $element.val(dt);
                            ngModel.$setViewValue(dt);
                        });
                    }
                }
            });

            app.directive("showImg", function() {
                return {
                    link: function(scope, elm, attrs, ngModel) {
                        elm.bind('click', function(e) {

                            if (attrs.src.indexOf(".svg") > 0) { return ""; }
                            if (attrs.src.indexOf("noimg") > 0) { return ""; }
                            
                            if(attrs.showImg != ''){
                                
                                $('#slideHolder').attr("style", "opacity: 1; z-index:1111;");
                                
                                var imgs_array = attrs.showImg.split(','), 
                                    imgs='';

                                var ctrl = !attrs.ctrl ? '<?=strtolower( $this->request->getParam('controller') )?>' : attrs.ctrl;

                                for( let img in  imgs_array){
                                    imgs += `
                                        <div class="carousel-item `+(attrs.curr == imgs_array[img] ? 'active' : '')+`">
                                            <img class="" src="<?=$app_folder?>/img/`+ctrl+`_photos/` + imgs_array[img] + `" />
                                        </div>
                                        `;
                                }
                                
                                $('#slideHolder').html(`
                                    <i class="fa fa-times" aria-hidden="true" onClick="document.getElementById('slideHolder').setAttribute('style', 'opacity:0; visibility:hidden;')"></i>
                                    <div id="imgs_slider" class="carousel slide carousel-fade imgs_slider" data-ride="carousel">
                                        <div class="carousel-inner">
                                            `+imgs+`
                                        </div>
                                        <a class="carousel-control-prev" href="#imgs_slider" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#imgs_slider" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                `);
                            }else{
                                $('#imgHolder').attr("style", "opacity: 1; z-index:1111;");
                                $('#imgHolder').html('<img src="' + attrs.src.replace("thumb/", "") + '"><i class="fa fa-times" aria-hidden="true"></i>');
                            }
                        })
                    }
                }
            });

            app.directive("removeTempHide", function() {
                return {
                    link: function(scope, elm, attrs) {
                        elm.removeClass('tempHide');
                    }
                }
            });

            app.directive("multiSelect", function($timeout) {
                return {
                    link: function(scope, elm, attrs) {

                        $timeout(function(){

                            elm.selectpicker({container: 'body'});
                            $(elm).selectpicker('refresh');
                            elm.on('hide.bs.select', function(e) {
                                $(elm).selectpicker('refresh');
                                if (attrs.actn) {
                                    return eval(attrs.actn)
                                }
                            });

                        }, 1000)
                        
                    }
                }
            })

            app.directive('clickOutside', function($document) {
                return {
                    restrict: 'A',
                    link: function(scope, elem, attr, ctrl) {
                        elem.bind('click', function(e) {
                            e.stopPropagation();
                        });
                        $document.bind('click', function() {
                            scope.$apply(attr.clickOutside);
                        })
                    }
                }
            });
            
            app.directive('textareaExpander', function() {
                return {
                        restrict: 'AE',
                        require: 'ngModel',
                        link: function(scope, elm, attrs, ctrl) {
                        $(elm)[0].rows = !$(elm)[0].rows ? 1 : $(elm)[0].rows
                        ctrl.$parsers.unshift(function(viewValue) { 
                            if($(elm)[0].scrollHeight > $(elm)[0].offsetHeight){
                                $(elm)[0].rows = $(elm)[0].rows+1
                            }
                            return viewValue;
                        })
                    }
                };
            });

            app.directive('onlyNumbers', function(){
                return {
                    restrict: 'AC',
                    link: function(scope, el, attr, ctrl) {
                        el.bind('keypress', function (e)  {
                            if (e.which != 8 && e.which != 13 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                _setError (el, '<?=__('only_numbers')?>') ;
                                return false;
                            }else{
                                _setError (el, '') ;
                            }
                        })
                        el.bind('blur', function (e)  {
                            let n_arr = attr.onlyNumbers.split('-'),
                                isError = false;
                                console.log(n_arr)
                            if(n_arr.length>2){
                                if( attr.onlyNumbers.indexOf( $(el).val() ) == -1 ){ isError = true; }
                            }
                            if(n_arr.length==2){
                                if( $(el).val() < n_arr[0]*1 || $(el).val() > n_arr[1]*1 ){ isError = true; }
                            }
                            if(isError){
                                _setError (el, '<?=__('number_should_between')?> '+attr.onlyNumbers) ;
                                return false;
                            }
                        })
                    }
                }
            });

            app.directive('fileModel', ['$parse', function($parse) {
                return {
                    restrict: 'A',
                    link: function($scope, element, attrs) {
                        var model = $parse(attrs.fileModel);
                        var modelSetter = model.assign;

                        element.bind('change', function(changeEvent) {

                            var total_upload_size = 0;
                            angular.forEach(changeEvent.target.files, function(itm, k) {

                                if (!$scope.filesInfo[attrs.name]) {
                                    $scope.filesInfo[attrs.name] = []
                                }

                                // prepare file info
                                var reader = new FileReader();

                                reader.onload = function(loadEvent) {
                                    
                                    // upload files docs
                                    if(attrs.name == 'doc_file'){
                                        $scope.filesInfo.file_doc={};
                                        $scope.$apply(function() {
                                            $scope.filesInfo[attrs.name][0] = {
                                                lastModified: itm.lastModified,
                                                lastModifiedDate: itm.lastModifiedDate,
                                                name: itm.name,
                                                size: itm.size,
                                                type: itm.type,
                                                tmp_name: loadEvent.target.result,
                                            };
                                        });
                                    // upload images
                                    }else{

                                        var image = new Image();
                                        image.src = loadEvent.target.result;

                                        image.onload = function() {
                                            let dim = this.height > this.width ? this.height : this.width; 
                                            total_upload_size +=( itm.size / 1024 / 1024 )
                                            if (total_upload_size > 10){
                                                showPNote('<?= __('note-message') ?>', '<?= __('exceeded_uploading_size') ?>', 'error', true, 15000);
                                                return ;
                                            }
                                            if (dim < 650) {// check if very small photo
                                                showPNote('<?= __('note-message') ?>', itm.name + ' <?= __('file-too-small') ?>', 'error');
                                            } else if (( itm.size / 1024 / 1024 ) > 5) {// check if photo bigger than 1.5 mb
                                                showPNote('<?= __('note-message') ?>', itm.name + ' <?= __('file-too-big') ?>', 'error');
                                            }else {
                                                $scope.$apply(function() {
                                                    $scope.filesInfo[attrs.name].push({
                                                        lastModified: itm.lastModified,
                                                        lastModifiedDate: itm.lastModifiedDate,
                                                        name: itm.name,
                                                        size: itm.size,
                                                        type: itm.type,
                                                        tmp_name: loadEvent.target.result,

                                                        alt:'',
                                                        desc:'',
                                                        anchor_title:'',
                                                        featured:'0',
                                                        order:'0'
                                                    })
                                                });
                                            }
                                        };
                                        console.log('$scope.filesInfo[attrs.name]', $scope.filesInfo[attrs.name])
                                    }

                                }
                                reader.readAsDataURL(itm);
                                // prepage file upload
                                $scope.$apply(function() {
                                    modelSetter($scope, [element[0].files[k]]);
                                });

                            })    
                            
                        })
                    }
                };
            }]);

            app.directive('setChart', function($timeout) {
                return {
                    restrict: 'A',
                    link: function(scope, elem, attr, ctrl) {

                        var addSeperator = function(n) {
                            return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                        }
                        var chart, ctx;
                        scope.$watch('rec.stats', function(old, newVal) {

                            var type = !attr.setChart ? 'pie' : attr.setChart;
                            var dt = scope.rec.dashboard.stats[attr.dt];
                            var unit = !attr.unit ? '<?= __('user') ?>' : attr.unit;

                            var clrs = scope.clrs;
                            var dtSet = [];
                            var allLabels = [];
                            var vals = [];

                            var height = document.body.clientHeight;
                            var width = document.body.clientWidth;

                            if (!dt) {
                                return false;
                            }

                            if ('bar,line'.indexOf(type) > -1) {
                                for (var i = 0; i < dt.items.length; i++) {
                                    for (var j = 0; j < dt.items[i].labels.length; j++) {
                                        if (allLabels.indexOf(dt.items[i].labels[j]) == -1) {
                                            allLabels.push(dt.items[i].labels[j]);
                                        }
                                    }
                                    dtSet.push({
                                        label: dt.items[i].label,
                                        data: dt.items[i].values,
                                        borderColor: clrs[i], //type == 'line' ? false : clrs,,
                                        backgroundColor: type == 'line' ? false : clrs[i]
                                    })
                                }
                            } else {
                                allLabels = dt.labels
                                dtSet = [{
                                    label: dt.label,
                                    data: dt.values,
                                    backgroundColor: clrs
                                }]
                            }
                            var options = {
                                type: type, //bar,pie,doughnut,polarArea,bubble,scatter,radar
                                data: {
                                    labels: allLabels,
                                    backgroundColor: '#fff',
                                    datasets: dtSet
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    },
                                    responsive: true,
                                    legend: {
                                        // display: width < 1200 ? false : true,
                                        position: 'bottom',
                                    },
                                    tooltips: {
                                        callbacks: {
                                            label: function(tooltipItems, data) {
                                                if ('bar,line'.indexOf(type) === -1) {
                                                    var content = [
                                                        data.labels[tooltipItems.index],
                                                        addSeperator(data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index]) + ' ' + unit,
                                                    ]
                                                    return content;
                                                } else {
                                                    var content = [
                                                        data.datasets[tooltipItems.datasetIndex].label,
                                                        addSeperator(data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index]) + ' ' + unit,
                                                    ]
                                                    return content;
                                                }
                                            }
                                        }
                                    },
                                }
                            }

                            if (chart) {
                                chart.destroy();
                            }
                            ctx = document.getElementById(elem[0].id).getContext('2d');
                            chart = new Chart(ctx, options);
                            if (JSON.stringify(old) !== JSON.stringify(newVal)) {
                                chart.update()
                            }

                        });
                    }
                }
            });

            app.directive('setSlider', function($timeout) {
                return {
                    restrict: 'A',
                    link: function($scope, elem, attr, ctrl) {
                        
                        return '';

                        const _end = !attr.end ? 9999999 : attr.end * 1;
                        const _fromto = !attr.fromto ? [0,_end/3] : JSON.parse( attr.fromto );
                        const _unit = !attr.unit ? '' : attr.unit;
                        const _tar = !attr.tar ? 'property_price' : attr.tar;
                        const _step = !attr.step ? 1000 : attr.step;
                        const _actn = !attr.actn ? false : attr.actn;
                        const _onehandler = !attr.onehandler ? false : attr.onehandler;
                        
                        const _format = function(v) {
                            return Math.floor(v).toFixed().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ' ' + _unit;
                        };

                        function setSteps(max, step) {
                            var steps = { min: 0, max: _end };
                            max > 10000000 ? max = 10000000 : max;
                            if(!max){ max=0 }
                            for (var i = 0; i < (max / step); i++) {
                                steps[((100 / (max / step)) * i) + '%'] = step * i
                            }
                            return steps
                        }

                        const steps = setSteps(_end, _step);
                        noUiSlider.create(elem[0], {
                            start: _fromto,
                            step: 1,
                            connect: _onehandler ? 'lower' : true,
                            tooltips: false,
                            range: _onehandler ? {'min':0, 'max':_end} : steps,
                            format: {
                                to: _format,
                                from(value) { return value; }
                            },
                            snap: _onehandler ? false : true,
                            behaviour: 'drag',
                        });

                        elem[0].noUiSlider.on('slide', (values, handle, ind) => { // Update Slide Drag Set Change Start End
                            $scope.$apply(function() {
                                var arr_tar = _tar.split('.');
                                if(arr_tar.length==1){arr_tar=['search', _tar]}
                                $scope.rec[ arr_tar[0] ][ arr_tar[1] ][0] = Math.floor(ind[0]);
                                $scope.rec[ arr_tar[0] ][ arr_tar[1] ][1] = Math.floor(ind[1]);
                            })
                        });

                        var updt;
                        elem[0].noUiSlider.on('change', (values, handle, ind) => { // Update Slide Drag Set Change Start End
                            if (_actn) {
                                $timeout.cancel(updt);
                                updt = $timeout(function() {
                                    doClick(_actn)
                                }, 500);
                            }
                        });
                    }
                }
            });

            app.directive('setRequired', function(){
                return {
                    link: function(scope, element, attrs, ngModel) {
                        if(attrs.setRequired == 'msg'){
                            return $(element).html(' <i class="fa redText fa-asterisk"></i> <?=__('red_star_required_fields')?>');
                        }
                        var val = $(element).html();
                        $(element).html(val + ' <i class="fa redText fa-asterisk"></i>')
                    }
                }
            });
            app.directive('setProgressWidth', function(){
                return {
                    link: function(scope, el, attrs, ngModel) {
                        var arr = attrs.setProgressWidth.split(',');
                        var val = arr[ attrs.ind ];
                        $(el).attr('style', 'width: '+scope.getPercentage( arr, val )+'%; background:'+ scope.clrs[attrs.ind] );
                    }
                }
            });
            
            if(getBrowser() == 'safari'){
                $('.has-feedback-left').addClass('safari_input_padding');
                // $('.form-control-feedback').css({opacity: 0});
            }

            $(document).bind('keyup', function(e) {
                if (e.keyCode==39) {
                    $('.carousel-control-next-icon').trigger('click');
                }else if(e.keyCode==37){
                    $('.carousel-control-prev-icon').trigger('click');
                }
            });
            
        })()
    </script>
    
</body>

</html>