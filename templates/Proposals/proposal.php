<?php
$tbl = $this->request->getParam('pass')[1];
$rooms = $this->Do->get('PROJ_SPECS')[618];
$groups = $this->Do->get('PROP_FEATURES')['main'] + $this->Do->get('PROJ_FEATURES')['main'];
$features = $this->Do->get('PROP_FEATURES') + $this->Do->get('PROJ_FEATURES');

$icons = [
    500 => "fas fa-school",
    501 => "fas fa-hospital",
    502 => "fas fa-user-group",
    503 => "fas fa-building",
    504 => "fas fa-car",
    400 => "fas fa-sun",
    401 => "fas fa-house",
    402 => "fas fa-mountain",
];

if ($tbl == 1) {
    $prop_specs = [
        'param_iscitizenship' => $this->Do->DtSetter($rec['property']['param_iscitizenship'], 'bool2'),
        'param_isresidence' => $this->Do->DtSetter($rec['property']['param_isresidence'], 'bool2'),
        'param_ownership' => $this->Do->DtSetter($rec['property']['param_ownership'], 'param_ownership', 'PROP'),
        'param_isresale' => $this->Do->DtSetter($rec['property']['param_isresale'], 'bool2'),
        'param_rooms' => $this->Do->DtSetter($rec['property']['param_rooms'], 'param_rooms', 'PROP'),
        'param_bathrooms' => $this->Do->DtSetter($rec['property']['param_bathrooms'], 'param_bathrooms', 'PROP'),
        'param_buildage' => $this->Do->DtSetter($rec['property']['param_buildage'], 'param_buildage', 'PROP'),
        'param_floors' => $this->Do->DtSetter($rec['property']['param_floors'], 'param_floors', 'PROP'),
        'param_floor' => $this->Do->DtSetter($rec['property']['param_floor'], 'param_floor', 'PROP'),
        'param_netspace' => $rec['property']['param_netspace'] . __('m2'),
        'param_grossspace' => $rec['property']['param_grossspace'] . __('m2'),
        'param_usestatus' => $this->Do->DtSetter($rec['property']['param_usestatus'], 'param_usestatus', 'PROP'),
        'param_heat' => $this->Do->DtSetter($rec['property']['param_heat'], 'param_heat', 'PROP'),
        'param_titledeed' => $this->Do->num($rec['property']['param_titledeed']) . ' ' . __('tl'),
        'param_deposit' => $this->Do->num($rec['property']['param_deposit']) . ' ' . __('tl'),
        'param_monthlytax' => $this->Do->num($rec['property']['param_monthlytax']) . ' ' . __('tl'),
    ];
}
if ($tbl == 2) {
    foreach((array)$rec['project']['param_unit_types'] as &$type){
        $type = $this->Do->DtSetter($type, 'param_unit_types', 'PROJ');
    }
    $proj_specs = [
        'param_space'=> $rec['project']['param_space'].__('m2'),
        'param_delivertype'=> $this->Do->DtSetter($rec['project']['param_delivertype'], 'param_delivertype', 'PROJ'),
        'param_deliverdate'=> $rec['project']['param_deliverdate'],
        'param_totalunits'=> $rec['project']['param_totalunits'].' /'.__('unit'),
        'param_blocks'=> $rec['project']['param_blocks'].' /'.__('block'),
        'param_bldfloors'=> $rec['project']['param_bldfloors'].' /'.__('floor'),
        'param_iscitizenship'=> $this->Do->DtSetter($rec['project']['param_iscitizenship'], 'bool2'),
        'param_isresidence'=> $this->Do->DtSetter($rec['project']['param_isresidence'], 'bool2'),
        'param_residential_units'=> $rec['project']['param_residential_units'].' /'.__('unit'),
        'param_commercial_units'=> $rec['project']['param_commercial_units'].' /'.__('unit'),
        'param_unit_types'=> implode(',', (array)$rec['project']['param_unit_types'] ),
        'param_units_size_range'=> implode('-', $rec['project']['param_units_size_range'] ).' '.__('m2'),
        'param_downpayment'=> $rec['project']['param_downpayment'].'%',
        'param_installment'=> $rec['project']['param_installment'].'%',
        'param_installment_months'=> $rec['project']['param_installment_months'].' /'.__('month'), 
    ];
}

?>

<?php if ($tbl == 1) { // Property Offer 
?>
    <div class="container-fluid offer-container">

        <?php // Header 
        ?>
        <section class="row">
            <div class="col-12 title_left">
                <h1 class=" mt-3">
                    <?= str_replace(', ,', '', str_replace('[auto]', '', $rec['property']['property_title'])) ?>
                </h1>
                <div class="mb-3"><?= __('property_ref') ?>:<?= $rec['property']['property_ref'] ?></div>
                <!-- <p><?= $rec['proposal_desc'] ?></p> -->
            </div>
        </section>

        <?php // photos carousel & price 
        ?>
        <section class="row ">
            <?php // carousel
            ?>
            <div class="col-md-8 col-12 section-padding-bottom">

                <?php if (!empty($rec['property']['property_photos'])) { ?>

                    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">

                        <div class="carousel-inner">
                            <?php foreach ($rec['property']['property_photos'] as $k => $img) { ?>
                                <div class="carousel-item <?= $k == 0 ? 'active' : '' ?> ">
                                    <?= $this->Html->image('/img/properties_photos/' . $img['name'], ['alt' => '']) ?>
                                </div>
                            <?php } ?>

                            <a class="carousel-control-prev" data-target="#carousel" href="javascript:void(0);" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>

                            <a class="carousel-control-next" data-target="#carousel" href="javascript:void(0);" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <div class="thumbContainer">
                            <div class="slideThumb carousel-indicators" id="slideThumb">
                                <?php foreach ($rec['property']['property_photos']  as $k => $img) { ?>
                                    <span data-target="#carousel" data-slide-to="<?= $k ?>" class=" <?= $k == 0 ? 'active' : '' ?> " id="thumb_<?= $k ?>">
                                        <?= $this->Html->image('/img/properties_photos/thumb/' . $img['name'], ['alt' => '']) ?>
                                    </span>
                                <?php } ?>
                            </div>

                            <a class="carousel-control-prev" onclick="slide_h('r')" href="javascript:void(0);">
                                <span class="carousel-control-prev-icon"></span>
                                <span class="sr-only">Previous</span>
                            </a>

                            <a class="carousel-control-next" onclick="slide_h('l')" href="javascript:void(0);">
                                <span class="carousel-control-next-icon"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                <?php } ?>
            </div>

            <?php // price
            ?>
            <div class="col-md-4 col-12 offer_price section-padding-bottom">
                <h2>
                    <?= $this->Do->get('currencies_icons')[$rec['property']['property_currency']] . '' . $this->Do->num($rec['property']['property_price']) ?>
                </h2>
                <div class="mb-3">
                    <small><?= implode(',', array_filter(
                                [$rec['property']['adrs_city'], $rec['property']['adrs_region'],  $rec['property']['adrs_district'],]
                            )) ?></small>
                </div>
                <div>
                    <?= $this->Do->DtSetter($rec['property']['param_iscitizenship'], 'bool2') . ' ' . __('param_iscitizenship') ?>
                </div>
                <div>
                    <?= $this->Do->DtSetter($rec['property']['param_isresidence'], 'bool2') . ' ' . __('param_isresidence') ?>
                </div>
            </div>
        </section>

        <?php // specs & videos 
        ?>
        <section class="row">
            <?php // specifications 
            ?>
            <div class="col-lg-6 col-12 rside_border section-padding-bottom rside-padding">
                <h3><?= __('specifications') ?></h3>
                <div class="row">
                    <?php foreach ($prop_specs as $k => $spec) { ?>
                        <div class="col-6 spec_offer_item">
                            <div class="row ">
                                <div class="col-sm-6 ">
                                    <b class=""><?= __($k) ?></b>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <div class=""><?= $spec ?></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <?php // videos 
            ?>
            <div class="col-lg-6 col-12 section-padding-bottom lside-padding">
                <?php if (!empty($rec['property']['property_videos'])) { ?>
                    <h3><?= __('property_videos') ?></h3>
                    <div id="carouselVideo" data-interval="false" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($rec['property']['property_videos'] as $k => $vid) { ?>
                                <div class="carousel-item <?= $k == 0 ? 'active' : '' ?> ">
                                    <div class="offer_video" set-iframe="<?= $vid ?>"></div>
                                </div>
                            <?php } ?>
                            <?php if (count($rec['property']['property_videos']) > 1) { ?>
                                <a class="carousel-control-prev" data-target="#carouselVideo" href="javascript:void(0);" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>

                                <a class="carousel-control-next" data-target="#carouselVideo" href="javascript:void(0);" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>

        <?php // map and payment 
        ?>
        <section class="row ">
            <div class="col-lg-6 rside_border section-padding-bottom rside-padding">
                <?php if (!empty($rec['property']['property_loc'])) { ?>
                    <h3><?= __('property_loc') ?></h3>
                    <div class="mb-3"><?= implode(',', array_filter(
                                            [$rec['property']['adrs_city'], $rec['property']['adrs_region'],  $rec['property']['adrs_district'],]
                                        )) ?></div>
                    <div class='gmapImg'>
                        <img show-img="" ng-src='https://maps.googleapis.com/maps/api/staticmap?center=<?= $rec['property']['property_loc'] ?>&zoom=9&size=600x300&maptype=roadmap&markers=color:green%7Clabel:S%7C<?= $rec['property']['property_loc'] ?>&key=<?= $gmapKey ?>' />
                    </div>
                <?php } ?>
            </div>
            <div class="col-lg-6 section-padding-bottom lside-padding">

                <h3><?= __('param_payment') ?></h3>
                <div class="payment_div">
                    <div><?= __('payment_plan') ?>&nbsp;</div>
                    <div class="price2"><small><?= __('total_price') ?></small>
                        <?= $this->Do->get('currencies_icons')[$rec['property']['property_currency']] .
                            $this->Do->num($rec['property']['property_price']) ?>&nbsp;
                    </div>
                    <div><?= $this->Do->DtSetter($rec['property']['param_ownertype'], 'param_ownertype', 'PROP') ?>&nbsp;</div>
                    <div><?= $this->Do->DtSetter($rec['property']['param_ownership'], 'param_ownership', 'PROP') ?>&nbsp;</div>
                </div>
            </div>
        </section>

        <?php // Mixitup tabs
        ?>
        <?php if (!empty($rec['property']['features_ids'])) { ?>
            <section class=" propert_filter ">
                <h3><?= __('property_facilities') ?></h3>
                <div class="col-12 btns-bar">
                    <a href="javascript:void(0);" class="btn btn-gray" data-filter="all">
                        <i class="fas fa-location-dot"></i> <?= __('all') ?>
                    </a>
                    <?php foreach ($groups as $k => $feature) { ?>
                        <a href="javascript:void(0);" class="btn btn-gray" data-filter=".<?= $feature ?>">
                            <i class=" <?= $icons[$k] ?>"></i> <?= __($feature) ?>
                        </a>
                    <?php } ?>
                </div>
                <div class="col-12 section-padding-bottom">
                    <div class="row">
                        <?php foreach ($groups as $k => $group) { ?>
                            <div class="col-lg-3 col-sm-6 mix <?= $group ?>">
                                <div class="">
                                    <h3 class=""><?= __($group) ?></h3>

                                    <?php foreach ($features[$k] as $k => $itm) {
                                        if ((strpos(implode('', $rec['property']['features_ids']), '' . $k . '')) !== false) { ?>

                                            <p class=""></i> - <?= __($itm) ?></p>

                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php } ?>


        <?php // Mixitup tabs
        ?>
        <?php if (!empty($rec['property']['property_desc'])) { ?>
            <section class="row">
                <div class="col-12 section-padding-bottom">
                    <h3><?= __('property_desc') ?></h3>
                    <?= $rec['property']['property_desc'] ?>
                </div>
            </section>
        <?php } ?>
    </div>

<?php } ?>






<?php if ($tbl == 2) {  // Project Offer  
    ?>
    <div class="container-fluid offer-container">

        <?php // Header 
        ?>
        <section class="row">
            <div class="col-12 title_left">
                <h1 class=" mt-3">
                    <?= $rec['project']['project_title'] ?>
                </h1>
                <div class="mb-3"><?= __('project_ref') ?>:<?= $rec['project']['project_ref'] ?></div>
            </div>
        </section>

        <?php // photos carousel & price 
        ?>
        <section class="row ">
            <?php // carousel
            ?>
            <div class="col-md-8 col-12 section-padding-bottom">

                <?php if (!empty($rec['project']['project_photos'])) { ?>

                    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">

                        <div class="carousel-inner">
                            <?php foreach ($rec['project']['project_photos'] as $k => $img) { ?>
                                <div class="carousel-item <?= $k == 0 ? 'active' : '' ?> ">
                                    <?= $this->Html->image('/img/projects_photos/' . $img, ['alt' => '']) ?>
                                </div>
                            <?php } ?>

                            <a class="carousel-control-prev" data-target="#carousel" href="javascript:void(0);" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>

                            <a class="carousel-control-next" data-target="#carousel" href="javascript:void(0);" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <div class="thumbContainer">
                            <div class="slideThumb carousel-indicators" id="slideThumb">
                                <?php foreach ($rec['project']['project_photos']  as $k => $img) { ?>
                                    <span data-target="#carousel" data-slide-to="<?= $k ?>" class=" <?= $k == 0 ? 'active' : '' ?> " >
                                        <?= $this->Html->image('/img/projects_photos/thumb/' . $img, ['alt' => '']) ?>
                                    </span>
                                <?php } ?>
                            </div>

                            <a class="carousel-control-prev" onclick="slide_h('r')" href="javascript:void(0);">
                                <span class="carousel-control-prev-icon"></span>
                                <span class="sr-only">Previous</span>
                            </a>

                            <a class="carousel-control-next" onclick="slide_h('l')" href="javascript:void(0);">
                                <span class="carousel-control-next-icon"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                <?php } ?>
            </div>

            <?php // price
            ?>
            <div class="col-md-4 col-12 offer_price section-padding-bottom">
                <h2>
                    <?= $this->Do->get('currencies_icons')[$rec['project']['project_currency']] . '' . $this->Do->num($rec['project']['floorplans'][0]['floorplan_minprice']) ?>
                </h2>
                <div class="mb-3">
                    <small><?= implode(',', array_filter(
                                [$rec['project']['adrs_city'], $rec['project']['adrs_region'],  $rec['project']['adrs_district'],]
                            )) ?></small>
                </div>
                <div>
                    <b><?=$this->Do->DtSetter($rec['project']['param_delivertype'], 'param_delivertype')?></b>
                </div>
                <div class="mb-3">
                    <b><?=__('param_deliverdate').': '.$rec['project']['param_deliverdate']?></b>
                </div>
                <div>
                    <?= $this->Do->DtSetter($rec['project']['param_iscitizenship'], 'bool2') . ' ' . __('param_iscitizenship') ?>
                </div>
                <div>
                    <?= $this->Do->DtSetter($rec['project']['param_isresidence'], 'bool2') . ' ' . __('param_isresidence') ?>
                </div>
            </div>
        </section>

        <?php // specs & videos 
        ?>
        <section class="row">
            <?php // specifications 
            ?>
            <div class="col-lg-6 col-12 rside_border section-padding-bottom rside-padding">
                <h3><?= __('specifications') ?></h3>
                <div class="row">
                    <?php foreach ($proj_specs as $k => $spec) { ?>
                        <div class="col-6 spec_offer_item">
                            <div class="row ">
                                <div class="col-sm-6 ">
                                    <b class=""><?= __($k) ?></b>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <div class=""><?= $spec ?></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <?php // floorplan 
            ?>
            <div class="col-lg-6 col-12 section-padding-bottom lside-padding">
                <?php if (!empty($rec['project']['floorplans'][0]['floorplan_photo'])) { ?>
                    <h3><?= __('floorplan') ?></h3>
                    <div id="carouselFloorplan" data-interval="false" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($rec['project']['floorplans'] as $k => $floorplan) { ?>
                                <div class="carousel-item <?= $k == 0 ? 'active' : '' ?> ">
                                    <?=$this->Html->image('/img/floorplans_photos/'.$floorplan['floorplan_photo'], ['show-img'=>''])?>
                                </div>
                            <?php } ?>

                            <?php if (count($rec['project']['floorplans']) > 1) { ?>
                                <a class="carousel-control-prev" data-target="#carouselFloorplan" href="javascript:void(0);" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>

                                <a class="carousel-control-next" data-target="#carouselFloorplan" href="javascript:void(0);" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>

        <?php // map and payment 
        ?>
        <section class="row ">
            <div class="col-lg-6 rside_border section-padding-bottom rside-padding">
                <?php if (!empty($rec['project']['project_loc'])) { ?>
                    <h3><?= __('project_loc') ?></h3>
                    <div class="mb-3"><?= implode(',', array_filter(
                                            [$rec['project']['adrs_city'], $rec['project']['adrs_region'],  $rec['project']['adrs_district'],]
                                        )) ?></div>
                    <div class='gmapImg'>
                        <img show-img="" ng-src='https://maps.googleapis.com/maps/api/staticmap?center=<?= $rec['project']['project_loc'] ?>&zoom=9&size=600x300&maptype=roadmap&markers=color:green%7Clabel:S%7C<?= $rec['project']['project_loc'] ?>&key=<?= $gmapKey ?>' />
                    </div>
                <?php } ?>
            </div>
            <div class="col-lg-6 section-padding-bottom lside-padding">

                <h3><?= __('param_payment') ?></h3>
                <div class="payment_div">
                    <div><?= __('payment_plan') ?>&nbsp;</div>
                    <div class="price2"><small><?= __('total_price') ?></small>
                        <?= $this->Do->get('currencies_icons')[$rec['project']['project_currency']] .
                            $this->Do->num($rec['project']['floorplans'][0]['floorplan_minprice']) ?>&nbsp;
                    </div>
                    <div><?=$rec['project']['param_downpayment']?>% <?=__('param_downpayment') ?>&nbsp;</div>
                    <div><?=$rec['project']['param_installment']?>% <?=__('param_installment')?>&nbsp;</div>
                    <div><?= $rec['project']['param_installment_months']?> <?=__('month') ?>&nbsp;</div>
                </div>
            </div>
        </section>

        <?php // Mixitup tabs
        ?>
        <?php if (!empty($rec['project']['features_ids'])) { ?>
            <section class=" project_filter ">
                <h3><?= __('project_features') ?></h3>
                <div class="col-12 btns-bar">
                    <a href="javascript:void(0);" class="btn btn-gray" data-filter="all">
                        <i class="fas fa-location-dot"></i> <?= __('all') ?>
                    </a>
                    <?php foreach ($this->Do->get('PROJ_FEATURES')['main'] as $k => $feature) { ?>
                        <a href="javascript:void(0);" class="btn btn-gray" data-filter=".<?= $feature ?>">
                            <i class=" <?= $icons[$k] ?>"></i> <?= __($feature) ?>
                        </a>
                    <?php } ?>
                </div>
                <div class="col-12 section-padding-bottom">
                    <div class="row">
                        <?php foreach ($this->Do->get('PROJ_FEATURES')['main'] as $k => $group) { ?>
                            <div class="col-lg-3 col-sm-6 mix <?= $group ?>">
                                <div class="">
                                    <h3 class=""><?= __($group) ?></h3>

                                    <?php foreach ($this->Do->get('PROJ_FEATURES')[$k] as $k => $itm) {
                                        if ((strpos(implode('', $rec['project']['features_ids']), '' . $k . '')) !== false) { ?>

                                            <p class=""></i> - <?= __($itm) ?></p>

                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php } ?>

        <section>
            <?php // videos 
            ?>
            <div class="col-12 section-padding-bottom">
                <?php if (!empty($rec['project']['project_videos'])) { ?>
                    <h3><?= __('project_videos') ?></h3>
                    <div id="carouselVideo" data-interval="false" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($rec['project']['project_videos'] as $k => $vid) { ?>
                                <div class="carousel-item <?= $k == 0 ? 'active' : '' ?> ">
                                    <div class="offer_video2" set-iframe="<?= $vid ?>"></div>
                                </div>
                            <?php } ?>
                            <?php if (count($rec['project']['project_videos']) > 1) { ?>
                                <a class="carousel-control-prev" data-target="#carouselVideo" href="javascript:void(0);" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>

                                <a class="carousel-control-next" data-target="#carouselVideo" href="javascript:void(0);" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>


    </div>
<?php } ?>













<script>
    var inc = 0;

    function slide_h(dir) {
        var thumbnailsBar = document.getElementById('slideThumb');
        inc = dir == 'r' ? inc + thumbnailsBar.clientWidth : inc - thumbnailsBar.clientWidth;
        if (inc < -1) { inc = 0 }
        if (inc > thumbnailsBar.scrollWidth) { inc = thumbnailsBar.scrollWidth - 200 }
        thumbnailsBar.scrollTo({
            left: inc,
            behavior: 'smooth'
        });
    }
    var mixer = mixitup($('<?= $tbl == 1 ? 1 : 0 ?>' === '1' ? '.propert_filter' : '.project_filter'));
</script>