<?php 
require_once ('templates/header.php'); 

$totals = $project->getQtyData($conn);
$cantProyectos = $totals['cantProyectos'];
$cantMetas = $totals['cantMetas'];
$cantMetasCompletas = $totals['cantMetasCompletas'];
$cantTareas = $totals['cantTareas'];
$cantTareasCompletas = $totals['cantTareasCompletas'];

?>
    <main>
        <?php require_once ('templates/navbar.php'); ?>
        <article>
            <section class="sec-left">
                <div class="dashboard">
                    <div class="dashboard-top">
                        <p class="dashboard-top__date"></p>
                        <div id="clock" class="clock" onload="showTime()"></div> 
                    </div>
                    <div class="dashboard-body">
                        <input type="hidden" id="cantValues" value="<?=$value->thereAreValues($conn)?>">
                        <div class="dashboard-numbers">
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber"><?=$cantProyectos?></p>
                                <p class="normal-text">Proyectos totales</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber"><?=$cantMetas?></p>
                                <p class="normal-text">Metas totales</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber"><?=$cantMetasCompletas?></p>
                                <p class="normal-text">Metas completadas</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber"><?=$cantTareas?></p>
                                <p class="normal-text">Tareas totales</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber"><?=$cantTareasCompletas?></p>
                                <p class="normal-text">Tareas completadas</p>
                            </div>
                        </div>
                        <div class="title-divider">
                            <p>Prioridades</p>
                            <div class="options">
                                <a href="<?=URLSERVER."/projects";?>" class="a-link">Ver todos</a>
                                <button class="btn-add createProject">
                                    <span class="fa fa-plus"></span> 
                                    <span class="small-text">Nuevo proyecto</span>
                                </buttonclass=>
                            </div>
                        </div>
                        <div class="home-grid">
                            <div class="home-grid-box home-values">
                                <div class="add-values">
                                    <form id="saveValue" class="add-values-form">
                                        <input type="text" placeholder="Lo que m??s valoras" name="value-name" autocomplete="off">
                                        <input type="color" id="value-color" name="value-color" value="#47527a">
                                        <select id="value-color" style="font-family: fontAwesome" name="value-icon">
                                            <option value='fa-address-book'>&#xf2b9;</option>
                                            <option value='fa-address-book-o'>&#xf2ba;</option>
                                            <option value='fa-address-card'>&#xf2bb;</option>
                                            <option value='fa-address-card-o'>&#xf2bc;</option>
                                            <option value='fa-adjust'>&#xf042;</option>
                                            <option value='fa-adn'>&#xf170;</option>
                                            <option value='fa-align-center'>&#xf037;</option>
                                            <option value='fa-align-justify'>&#xf039;</option>
                                            <option value='fa-align-left'>&#xf036;</option>
                                            <option value='fa-align-right'>&#xf038;</option>
                                            <option value='fa-amazon'>&#xf270;</option>
                                            <option value='fa-ambulance'>&#xf0f9;</option>
                                            <option value='fa-american-sign-language-interpreting'>&#xf2a3;</option>
                                            <option value='fa-anchor'>&#xf13d;</option>
                                            <option value='fa-android'>&#xf17b;</option>
                                            <option value='fa-angellist'>&#xf209;</option>
                                            <option value='fa-angle-double-down'>&#xf103;</option>
                                            <option value='fa-angle-double-left'>&#xf100;</option>
                                            <option value='fa-angle-double-right'>&#xf101;</option>
                                            <option value='fa-angle-double-up'>&#xf102;</option>
                                            <option value='fa-angle-down'>&#xf107;</option>
                                            <option value='fa-angle-left'>&#xf104;</option>
                                            <option value='fa-angle-right'>&#xf105;</option>
                                            <option value='fa-angle-up'>&#xf106;</option>
                                            <option value='fa-apple'>&#xf179;</option>
                                            <option value='fa-archive'>&#xf187;</option>
                                            <option value='fa-area-chart'>&#xf1fe;</option>
                                            <option value='fa-arrow-circle-down'>&#xf0ab;</option>
                                            <option value='fa-arrow-circle-left'>&#xf0a8;</option>
                                            <option value='fa-arrow-circle-o-down'>&#xf01a;</option>
                                            <option value='fa-arrow-circle-o-left'>&#xf190;</option>
                                            <option value='fa-arrow-circle-o-right'>&#xf18e;</option>
                                            <option value='fa-arrow-circle-o-up'>&#xf01b;</option>
                                            <option value='fa-arrow-circle-right'>&#xf0a9;</option>
                                            <option value='fa-arrow-circle-up'>&#xf0aa;</option>
                                            <option value='fa-arrow-down'>&#xf063;</option>
                                            <option value='fa-arrow-left'>&#xf060;</option>
                                            <option value='fa-arrow-right'>&#xf061;</option>
                                            <option value='fa-arrow-up'>&#xf062;</option>
                                            <option value='fa-arrows'>&#xf047;</option>
                                            <option value='fa-arrows-alt'>&#xf0b2;</option>
                                            <option value='fa-arrows-h'>&#xf07e;</option>
                                            <option value='fa-arrows-v'>&#xf07d;</option>
                                            <option value='fa-asl-interpreting'>&#xf2a3;</option>
                                            <option value='fa-assistive-listening-systems'>&#xf2a2;</option>
                                            <option value='fa-asterisk'>&#xf069;</option>
                                            <option value='fa-at'>&#xf1fa;</option>
                                            <option value='fa-audio-description'>&#xf29e;</option>
                                            <option value='fa-automobile'>&#xf1b9;</option>
                                            <option value='fa-backward'>&#xf04a;</option>
                                            <option value='fa-balance-scale'>&#xf24e;</option>
                                            <option value='fa-ban'>&#xf05e;</option>
                                            <option value='fa-bandcamp'>&#xf2d5;</option>
                                            <option value='fa-bank'>&#xf19c;</option>
                                            <option value='fa-bar-chart'>&#xf080;</option>
                                            <option value='fa-bar-chart-o'>&#xf080;</option>
                                            <option value='fa-barcode'>&#xf02a;</option>
                                            <option value='fa-bars'>&#xf0c9;</option>
                                            <option value='fa-bath'>&#xf2cd;</option>
                                            <option value='fa-bathtub'>&#xf2cd;</option>
                                            <option value='fa-battery'>&#xf240;</option>
                                            <option value='fa-battery-0'>&#xf244;</option>
                                            <option value='fa-battery-1'>&#xf243;</option>
                                            <option value='fa-battery-2'>&#xf242;</option>
                                            <option value='fa-battery-3'>&#xf241;</option>
                                            <option value='fa-battery-4'>&#xf240;</option>
                                            <option value='fa-battery-empty'>&#xf244;</option>
                                            <option value='fa-battery-full'>&#xf240;</option>
                                            <option value='fa-battery-half'>&#xf242;</option>
                                            <option value='fa-battery-quarter'>&#xf243;</option>
                                            <option value='fa-battery-three-quarters'>&#xf241;</option>
                                            <option value='fa-bed'>&#xf236;</option>
                                            <option value='fa-beer'>&#xf0fc;</option>
                                            <option value='fa-behance'>&#xf1b4;</option>
                                            <option value='fa-behance-square'>&#xf1b5;</option>
                                            <option value='fa-bell'>&#xf0f3;</option>
                                            <option value='fa-bell-o'>&#xf0a2;</option>
                                            <option value='fa-bell-slash'>&#xf1f6;</option>
                                            <option value='fa-bell-slash-o'>&#xf1f7;</option>
                                            <option value='fa-bicycle'>&#xf206;</option>
                                            <option value='fa-binoculars'>&#xf1e5;</option>
                                            <option value='fa-birthday-cake'>&#xf1fd;</option>
                                            <option value='fa-bitbucket'>&#xf171;</option>
                                            <option value='fa-bitbucket-square'>&#xf172;</option>
                                            <option value='fa-bitcoin'>&#xf15a;</option>
                                            <option value='fa-black-tie'>&#xf27e;</option>
                                            <option value='fa-blind'>&#xf29d;</option>
                                            <option value='fa-bluetooth'>&#xf293;</option>
                                            <option value='fa-bluetooth-b'>&#xf294;</option>
                                            <option value='fa-bold'>&#xf032;</option>
                                            <option value='fa-bolt'>&#xf0e7;</option>
                                            <option value='fa-bomb'>&#xf1e2;</option>
                                            <option value='fa-book'>&#xf02d;</option>
                                            <option value='fa-bookmark'>&#xf02e;</option>
                                            <option value='fa-bookmark-o'>&#xf097;</option>
                                            <option value='fa-braille'>&#xf2a1;</option>
                                            <option value='fa-briefcase'>&#xf0b1;</option>
                                            <option value='fa-btc'>&#xf15a;</option>
                                            <option value='fa-bug'>&#xf188;</option>
                                            <option value='fa-building'>&#xf1ad;</option>
                                            <option value='fa-building-o'>&#xf0f7;</option>
                                            <option value='fa-bullhorn'>&#xf0a1;</option>
                                            <option value='fa-bullseye'>&#xf140;</option>
                                            <option value='fa-bus'>&#xf207;</option>
                                            <option value='fa-buysellads'>&#xf20d;</option>
                                            <option value='fa-cab'>&#xf1ba;</option>
                                            <option value='fa-calculator'>&#xf1ec;</option>
                                            <option value='fa-calendar'>&#xf073;</option>
                                            <option value='fa-calendar-check-o'>&#xf274;</option>
                                            <option value='fa-calendar-minus-o'>&#xf272;</option>
                                            <option value='fa-calendar-o'>&#xf133;</option>
                                            <option value='fa-calendar-plus-o'>&#xf271;</option>
                                            <option value='fa-calendar-times-o'>&#xf273;</option>
                                            <option value='fa-camera'>&#xf030;</option>
                                            <option value='fa-camera-retro'>&#xf083;</option>
                                            <option value='fa-car'>&#xf1b9;</option>
                                            <option value='fa-caret-down'>&#xf0d7;</option>
                                            <option value='fa-caret-left'>&#xf0d9;</option>
                                            <option value='fa-caret-right'>&#xf0da;</option>
                                            <option value='fa-caret-square-o-down'>&#xf150;</option>
                                            <option value='fa-caret-square-o-left'>&#xf191;</option>
                                            <option value='fa-caret-square-o-right'>&#xf152;</option>
                                            <option value='fa-caret-square-o-up'>&#xf151;</option>
                                            <option value='fa-caret-up'>&#xf0d8;</option>
                                            <option value='fa-cart-arrow-down'>&#xf218;</option>
                                            <option value='fa-cart-plus'>&#xf217;</option>
                                            <option value='fa-cc'>&#xf20a;</option>
                                            <option value='fa-cc-amex'>&#xf1f3;</option>
                                            <option value='fa-cc-diners-club'>&#xf24c;</option>
                                            <option value='fa-cc-discover'>&#xf1f2;</option>
                                            <option value='fa-cc-jcb'>&#xf24b;</option>
                                            <option value='fa-cc-mastercard'>&#xf1f1;</option>
                                            <option value='fa-cc-paypal'>&#xf1f4;</option>
                                            <option value='fa-cc-stripe'>&#xf1f5;</option>
                                            <option value='fa-cc-visa'>&#xf1f0;</option>
                                            <option value='fa-certificate'>&#xf0a3;</option>
                                            <option value='fa-chain'>&#xf0c1;</option>
                                            <option value='fa-chain-broken'>&#xf127;</option>
                                            <option value='fa-check'>&#xf00c;</option>
                                            <option value='fa-check-circle'>&#xf058;</option>
                                            <option value='fa-check-circle-o'>&#xf05d;</option>
                                            <option value='fa-check-square'>&#xf14a;</option>
                                            <option value='fa-check-square-o'>&#xf046;</option>
                                            <option value='fa-chevron-circle-down'>&#xf13a;</option>
                                            <option value='fa-chevron-circle-left'>&#xf137;</option>
                                            <option value='fa-chevron-circle-right'>&#xf138;</option>
                                            <option value='fa-chevron-circle-up'>&#xf139;</option>
                                            <option value='fa-chevron-down'>&#xf078;</option>
                                            <option value='fa-chevron-left'>&#xf053;</option>
                                            <option value='fa-chevron-right'>&#xf054;</option>
                                            <option value='fa-chevron-up'>&#xf077;</option>
                                            <option value='fa-child'>&#xf1ae;</option>
                                            <option value='fa-chrome'>&#xf268;</option>
                                            <option value='fa-circle'>&#xf111;</option>
                                            <option value='fa-circle-o'>&#xf10c;</option>
                                            <option value='fa-circle-o-notch'>&#xf1ce;</option>
                                            <option value='fa-circle-thin'>&#xf1db;</option>
                                            <option value='fa-clipboard'>&#xf0ea;</option>
                                            <option value='fa-clock-o'>&#xf017;</option>
                                            <option value='fa-clone'>&#xf24d;</option>
                                            <option value='fa-close'>&#xf00d;</option>
                                            <option value='fa-cloud'>&#xf0c2;</option>
                                            <option value='fa-cloud-download'>&#xf0ed;</option>
                                            <option value='fa-cloud-upload'>&#xf0ee;</option>
                                            <option value='fa-cny'>&#xf157;</option>
                                            <option value='fa-code'>&#xf121;</option>
                                            <option value='fa-code-fork'>&#xf126;</option>
                                            <option value='fa-codepen'>&#xf1cb;</option>
                                            <option value='fa-codiepie'>&#xf284;</option>
                                            <option value='fa-coffee'>&#xf0f4;</option>
                                            <option value='fa-cog'>&#xf013;</option>
                                            <option value='fa-cogs'>&#xf085;</option>
                                            <option value='fa-columns'>&#xf0db;</option>
                                            <option value='fa-comment'>&#xf075;</option>
                                            <option value='fa-comment-o'>&#xf0e5;</option>
                                            <option value='fa-commenting'>&#xf27a;</option>
                                            <option value='fa-commenting-o'>&#xf27b;</option>
                                            <option value='fa-comments'>&#xf086;</option>
                                            <option value='fa-comments-o'>&#xf0e6;</option>
                                            <option value='fa-compass'>&#xf14e;</option>
                                            <option value='fa-compress'>&#xf066;</option>
                                            <option value='fa-connectdevelop'>&#xf20e;</option>
                                            <option value='fa-contao'>&#xf26d;</option>
                                            <option value='fa-copy'>&#xf0c5;</option>
                                            <option value='fa-copyright'>&#xf1f9;</option>
                                            <option value='fa-creative-commons'>&#xf25e;</option>
                                            <option value='fa-credit-card'>&#xf09d;</option>
                                            <option value='fa-credit-card-alt'>&#xf283;</option>
                                            <option value='fa-crop'>&#xf125;</option>
                                            <option value='fa-crosshairs'>&#xf05b;</option>
                                            <option value='fa-css3'>&#xf13c;</option>
                                            <option value='fa-cube'>&#xf1b2;</option>
                                            <option value='fa-cubes'>&#xf1b3;</option>
                                            <option value='fa-cut'>&#xf0c4;</option>
                                            <option value='fa-cutlery'>&#xf0f5;</option>
                                            <option value='fa-dashboard'>&#xf0e4;</option>
                                            <option value='fa-dashcube'>&#xf210;</option>
                                            <option value='fa-database'>&#xf1c0;</option>
                                            <option value='fa-deaf'>&#xf2a4;</option>
                                            <option value='fa-deafness'>&#xf2a4;</option>
                                            <option value='fa-dedent'>&#xf03b;</option>
                                            <option value='fa-delicious'>&#xf1a5;</option>
                                            <option value='fa-desktop'>&#xf108;</option>
                                            <option value='fa-deviantart'>&#xf1bd;</option>
                                            <option value='fa-diamond'>&#xf219;</option>
                                            <option value='fa-digg'>&#xf1a6;</option>
                                            <option value='fa-dollar'>&#xf155;</option>
                                            <option value='fa-dot-circle-o'>&#xf192;</option>
                                            <option value='fa-download'>&#xf019;</option>
                                            <option value='fa-info'>&#xf129;</option>
                                            <option value='fa-info-circle'>&#xf05a;</option>
                                            <option value='fa-dribbble'>&#xf17d;</option>
                                            <option value='fa-drivers-license'>&#xf2c2;</option>
                                            <option value='fa-drivers-license-o'>&#xf2c3;</option>
                                            <option value='fa-dropbox'>&#xf16b;</option>
                                            <option value='fa-drupal'>&#xf1a9;</option>
                                            <option value='fa-edge'>&#xf282;</option>
                                            <option value='fa-edit'>&#xf044;</option>
                                            <option value='fa-eercast'>&#xf2da;</option>
                                            <option value='fa-eject'>&#xf052;</option>
                                            <option value='fa-ellipsis-h'>&#xf141;</option>
                                            <option value='fa-ellipsis-v'>&#xf142;</option>
                                            <option value='fa-empire'>&#xf1d1;</option>
                                            <option value='fa-envelope'>&#xf0e0;</option>
                                            <option value='fa-envelope-o'>&#xf003;</option>
                                            <option value='fa-envelope-open'>&#xf2b6;</option>
                                            <option value='fa-envelope-open-o'>&#xf2b7;</option>
                                            <option value='fa-envelope-square'>&#xf199;</option>
                                            <option value='fa-envira'>&#xf299;</option>
                                            <option value='fa-eraser'>&#xf12d;</option>
                                            <option value='fa-etsy'>&#xf2d7;</option>
                                            <option value='fa-eur'>&#xf153;</option>
                                            <option value='fa-euro'>&#xf153;</option>
                                            <option value='fa-exchange'>&#xf0ec;</option>
                                            <option value='fa-exclamation'>&#xf12a;</option>
                                            <option value='fa-exclamation-circle'>&#xf06a;</option>
                                            <option value='fa-exclamation-triangle'>&#xf071;</option>
                                            <option value='fa-expand'>&#xf065;</option>
                                            <option value='fa-expeditedssl'>&#xf23e;</option>
                                            <option value='fa-external-link'>&#xf08e;</option>
                                            <option value='fa-external-link-square'>&#xf14c;</option>
                                            <option value='fa-eye'>&#xf06e;</option>
                                            <option value='fa-eye-slash'>&#xf070;</option>
                                            <option value='fa-eyedropper'>&#xf1fb;</option>
                                            <option value='fa-fa'>&#xf2b4;</option>
                                            <option value='fa-facebook'>&#xf09a;</option>
                                            <option value='fa-facebook-f'>&#xf09a;</option>
                                            <option value='fa-facebook-official'>&#xf230;</option>
                                            <option value='fa-facebook-square'>&#xf082;</option>
                                            <option value='fa-fast-backward'>&#xf049;</option>
                                            <option value='fa-fast-forward'>&#xf050;</option>
                                            <option value='fa-fax'>&#xf1ac;</option>
                                            <option value='fa-feed'>&#xf09e;</option>
                                            <option value='fa-female'>&#xf182;</option>
                                            <option value='fa-fighter-jet'>&#xf0fb;</option>
                                            <option value='fa-file'>&#xf15b;</option>
                                            <option value='fa-file-archive-o'>&#xf1c6;</option>
                                            <option value='fa-file-audio-o'>&#xf1c7;</option>
                                            <option value='fa-file-code-o'>&#xf1c9;</option>
                                            <option value='fa-file-excel-o'>&#xf1c3;</option>
                                            <option value='fa-file-image-o'>&#xf1c5;</option>
                                            <option value='fa-file-movie-o'>&#xf1c8;</option>
                                            <option value='fa-file-o'>&#xf016;</option>
                                            <option value='fa-file-pdf-o'>&#xf1c1;</option>
                                            <option value='fa-file-photo-o'>&#xf1c5;</option>
                                            <option value='fa-file-picture-o'>&#xf1c5;</option>
                                            <option value='fa-file-powerpoint-o'>&#xf1c4;</option>
                                            <option value='fa-file-sound-o'>&#xf1c7;</option>
                                            <option value='fa-file-text'>&#xf15c;</option>
                                            <option value='fa-file-text-o'>&#xf0f6;</option>
                                            <option value='fa-file-video-o'>&#xf1c8;</option>
                                            <option value='fa-file-word-o'>&#xf1c2;</option>
                                            <option value='fa-file-zip-o'>&#xf1c6;</option>
                                            <option value='fa-files-o'>&#xf0c5;</option>
                                            <option value='fa-film'>&#xf008;</option>
                                            <option value='fa-filter'>&#xf0b0;</option>
                                            <option value='fa-fire'>&#xf06d;</option>
                                            <option value='fa-fire-extinguisher'>&#xf134;</option>
                                            <option value='fa-firefox'>&#xf269;</option>
                                            <option value='fa-first-order'>&#xf2b0;</option>
                                            <option value='fa-flag'>&#xf024;</option>
                                            <option value='fa-flag-checkered'>&#xf11e;</option>
                                            <option value='fa-flag-o'>&#xf11d;</option>
                                            <option value='fa-flash'>&#xf0e7;</option>
                                            <option value='fa-flask'>&#xf0c3;</option>
                                            <option value='fa-flickr'>&#xf16e;</option>
                                            <option value='fa-floppy-o'>&#xf0c7;</option>
                                            <option value='fa-folder'>&#xf07b;</option>
                                            <option value='fa-folder-o'>&#xf114;</option>
                                            <option value='fa-folder-open'>&#xf07c;</option>
                                            <option value='fa-folder-open-o'>&#xf115;</option>
                                            <option value='fa-font'>&#xf031;</option>
                                            <option value='fa-font-awesome'>&#xf2b4;</option>
                                            <option value='fa-fonticons'>&#xf280;</option>
                                            <option value='fa-fort-awesome'>&#xf286;</option>
                                            <option value='fa-forumbee'>&#xf211;</option>
                                            <option value='fa-forward'>&#xf04e;</option>
                                            <option value='fa-foursquare'>&#xf180;</option>
                                            <option value='fa-free-code-camp'>&#xf2c5;</option>
                                            <option value='fa-frown-o'>&#xf119;</option>
                                            <option value='fa-futbol-o'>&#xf1e3;</option>
                                            <option value='fa-gamepad'>&#xf11b;</option>
                                            <option value='fa-gavel'>&#xf0e3;</option>
                                            <option value='fa-gbp'>&#xf154;</option>
                                            <option value='fa-ge'>&#xf1d1;</option>
                                            <option value='fa-gear'>&#xf013;</option>
                                            <option value='fa-gears'>&#xf085;</option>
                                            <option value='fa-genderless'>&#xf22d;</option>
                                            <option value='fa-get-pocket'>&#xf265;</option>
                                            <option value='fa-gg'>&#xf260;</option>
                                            <option value='fa-gg-circle'>&#xf261;</option>
                                            <option value='fa-gift'>&#xf06b;</option>
                                            <option value='fa-git'>&#xf1d3;</option>
                                            <option value='fa-git-square'>&#xf1d2;</option>
                                            <option value='fa-github'>&#xf09b;</option>
                                            <option value='fa-github-alt'>&#xf113;</option>
                                            <option value='fa-github-square'>&#xf092;</option>
                                            <option value='fa-gitlab'>&#xf296;</option>
                                            <option value='fa-gittip'>&#xf184;</option>
                                            <option value='fa-glass'>&#xf000;</option>
                                            <option value='fa-glide'>&#xf2a5;</option>
                                            <option value='fa-glide-g'>&#xf2a6;</option>
                                            <option value='fa-globe'>&#xf0ac;</option>
                                            <option value='fa-google'>&#xf1a0;</option>
                                            <option value='fa-google-plus'>&#xf0d5;</option>
                                            <option value='fa-google-plus-circle'>&#xf2b3;</option>
                                            <option value='fa-google-plus-official'>&#xf2b3;</option>
                                            <option value='fa-google-plus-square'>&#xf0d4;</option>
                                            <option value='fa-google-wallet'>&#xf1ee;</option>
                                            <option value='fa-graduation-cap'>&#xf19d;</option>
                                            <option value='fa-gratipay'>&#xf184;</option>
                                            <option value='fa-grav'>&#xf2d6;</option>
                                            <option value='fa-group'>&#xf0c0;</option>
                                            <option value='fa-h-square'>&#xf0fd;</option>
                                            <option value='fa-hacker-news'>&#xf1d4;</option>
                                            <option value='fa-hand-grab-o'>&#xf255;</option>
                                            <option value='fa-hand-lizard-o'>&#xf258;</option>
                                            <option value='fa-hand-o-down'>&#xf0a7;</option>
                                            <option value='fa-hand-o-left'>&#xf0a5;</option>
                                            <option value='fa-hand-o-right'>&#xf0a4;</option>
                                            <option value='fa-hand-o-up'>&#xf0a6;</option>
                                            <option value='fa-hand-paper-o'>&#xf256;</option>
                                            <option value='fa-hand-peace-o'>&#xf25b;</option>
                                            <option value='fa-hand-pointer-o'>&#xf25a;</option>
                                            <option value='fa-hand-rock-o'>&#xf255;</option>
                                            <option value='fa-hand-scissors-o'>&#xf257;</option>
                                            <option value='fa-hand-spock-o'>&#xf259;</option>
                                            <option value='fa-hand-stop-o'>&#xf256;</option>
                                            <option value='fa-handshake-o'>&#xf2b5;</option>
                                            <option value='fa-hard-of-hearing'>&#xf2a4;</option>
                                            <option value='fa-hashtag'>&#xf292;</option>
                                            <option value='fa-hdd-o'>&#xf0a0;</option>
                                            <option value='fa-header'>&#xf1dc;</option>
                                            <option value='fa-headphones'>&#xf025;</option>
                                            <option value='fa-heart'>&#xf004;</option>
                                            <option value='fa-heart-o'>&#xf08a;</option>
                                            <option value='fa-heartbeat'>&#xf21e;</option>
                                            <option value='fa-history'>&#xf1da;</option>
                                            <option value='fa-home'>&#xf015;</option>
                                            <option value='fa-hospital-o'>&#xf0f8;</option>
                                            <option value='fa-hotel'>&#xf236;</option>
                                            <option value='fa-hourglass'>&#xf254;</option>
                                            <option value='fa-hourglass-1'>&#xf251;</option>
                                            <option value='fa-hourglass-2'>&#xf252;</option>
                                            <option value='fa-hourglass-3'>&#xf253;</option>
                                            <option value='fa-hourglass-end'>&#xf253;</option>
                                            <option value='fa-hourglass-half'>&#xf252;</option>
                                            <option value='fa-hourglass-o'>&#xf250;</option>
                                            <option value='fa-hourglass-start'>&#xf251;</option>
                                            <option value='fa-houzz'>&#xf27c;</option>
                                            <option value='fa-html5'>&#xf13b;</option>
                                            <option value='fa-i-cursor'>&#xf246;</option>
                                            <option value='fa-id-badge'>&#xf2c1;</option>
                                            <option value='fa-id-card'>&#xf2c2;</option>
                                            <option value='fa-id-card-o'>&#xf2c3;</option>
                                            <option value='fa-ils'>&#xf20b;</option>
                                            <option value='fa-image'>&#xf03e;</option>
                                            <option value='fa-imdb'>&#xf2d8;</option>
                                            <option value='fa-inbox'>&#xf01c;</option>
                                            <option value='fa-indent'>&#xf03c;</option>
                                            <option value='fa-industry'>&#xf275;</option>
                                            <option value='fa-inr'>&#xf156;</option>
                                            <option value='fa-instagram'>&#xf16d;</option>
                                            <option value='fa-institution'>&#xf19c;</option>
                                            <option value='fa-internet-explorer'>&#xf26b;</option>
                                            <option value='fa-intersex'>&#xf224;</option>
                                            <option value='fa-ioxhost'>&#xf208;</option>
                                            <option value='fa-italic'>&#xf033;</option>
                                            <option value='fa-joomla'>&#xf1aa;</option>
                                            <option value='fa-jpy'>&#xf157;</option>
                                            <option value='fa-jsfiddle'>&#xf1cc;</option>
                                            <option value='fa-key'>&#xf084;</option>
                                            <option value='fa-keyboard-o'>&#xf11c;</option>
                                            <option value='fa-krw'>&#xf159;</option>
                                            <option value='fa-language'>&#xf1ab;</option>
                                            <option value='fa-laptop'>&#xf109;</option>
                                            <option value='fa-lastfm'>&#xf202;</option>
                                            <option value='fa-lastfm-square'>&#xf203;</option>
                                            <option value='fa-leaf'>&#xf06c;</option>
                                            <option value='fa-leanpub'>&#xf212;</option>
                                            <option value='fa-legal'>&#xf0e3;</option>
                                            <option value='fa-lemon-o'>&#xf094;</option>
                                            <option value='fa-level-down'>&#xf149;</option>
                                            <option value='fa-level-up'>&#xf148;</option>
                                            <option value='fa-life-bouy'>&#xf1cd;</option>
                                            <option value='fa-life-buoy'>&#xf1cd;</option>
                                            <option value='fa-life-ring'>&#xf1cd;</option>
                                            <option value='fa-life-saver'>&#xf1cd;</option>
                                            <option value='fa-lightbulb-o'>&#xf0eb;</option>
                                            <option value='fa-line-chart'>&#xf201;</option>
                                            <option value='fa-link'>&#xf0c1;</option>
                                            <option value='fa-linkedin'>&#xf0e1;</option>
                                            <option value='fa-linkedin-square'>&#xf08c;</option>
                                            <option value='fa-linode'>&#xf2b8;</option>
                                            <option value='fa-linux'>&#xf17c;</option>
                                            <option value='fa-list'>&#xf03a;</option>
                                            <option value='fa-list-alt'>&#xf022;</option>
                                            <option value='fa-list-ol'>&#xf0cb;</option>
                                            <option value='fa-list-ul'>&#xf0ca;</option>
                                            <option value='fa-location-arrow'>&#xf124;</option>
                                            <option value='fa-lock'>&#xf023;</option>
                                            <option value='fa-long-arrow-down'>&#xf175;</option>
                                            <option value='fa-long-arrow-left'>&#xf177;</option>
                                            <option value='fa-long-arrow-right'>&#xf178;</option>
                                            <option value='fa-long-arrow-up'>&#xf176;</option>
                                            <option value='fa-low-vision'>&#xf2a8;</option>
                                            <option value='fa-magic'>&#xf0d0;</option>
                                            <option value='fa-magnet'>&#xf076;</option>
                                            <option value='fa-mail-forward'>&#xf064;</option>
                                            <option value='fa-mail-reply'>&#xf112;</option>
                                            <option value='fa-mail-reply-all'>&#xf122;</option>
                                            <option value='fa-male'>&#xf183;</option>
                                            <option value='fa-map'>&#xf279;</option>
                                            <option value='fa-map-marker'>&#xf041;</option>
                                            <option value='fa-map-o'>&#xf278;</option>
                                            <option value='fa-map-pin'>&#xf276;</option>
                                            <option value='fa-map-signs'>&#xf277;</option>
                                            <option value='fa-mars'>&#xf222;</option>
                                            <option value='fa-mars-double'>&#xf227;</option>
                                            <option value='fa-mars-stroke'>&#xf229;</option>
                                            <option value='fa-mars-stroke-h'>&#xf22b;</option>
                                            <option value='fa-mars-stroke-v'>&#xf22a;</option>
                                            <option value='fa-maxcdn'>&#xf136;</option>
                                            <option value='fa-meanpath'>&#xf20c;</option>
                                            <option value='fa-medium'>&#xf23a;</option>
                                            <option value='fa-medkit'>&#xf0fa;</option>
                                            <option value='fa-meetup'>&#xf2e0;</option>
                                            <option value='fa-meh-o'>&#xf11a;</option>
                                            <option value='fa-mercury'>&#xf223;</option>
                                            <option value='fa-microchip'>&#xf2db;</option>
                                            <option value='fa-microphone'>&#xf130;</option>
                                            <option value='fa-microphone-slash'>&#xf131;</option>
                                            <option value='fa-minus'>&#xf068;</option>
                                            <option value='fa-minus-circle'>&#xf056;</option>
                                            <option value='fa-minus-square'>&#xf146;</option>
                                            <option value='fa-minus-square-o'>&#xf147;</option>
                                            <option value='fa-mixcloud'>&#xf289;</option>
                                            <option value='fa-mobile'>&#xf10b;</option>
                                            <option value='fa-mobile-phone'>&#xf10b;</option>
                                            <option value='fa-modx'>&#xf285;</option>
                                            <option value='fa-money'>&#xf0d6;</option>
                                            <option value='fa-moon-o'>&#xf186;</option>
                                            <option value='fa-mortar-board'>&#xf19d;</option>
                                            <option value='fa-motorcycle'>&#xf21c;</option>
                                            <option value='fa-mouse-pointer'>&#xf245;</option>
                                            <option value='fa-music'>&#xf001;</option>
                                            <option value='fa-navicon'>&#xf0c9;</option>
                                            <option value='fa-neuter'>&#xf22c;</option>
                                            <option value='fa-newspaper-o'>&#xf1ea;</option>
                                            <option value='fa-object-group'>&#xf247;</option>
                                            <option value='fa-object-ungroup'>&#xf248;</option>
                                            <option value='fa-odnoklassniki'>&#xf263;</option>
                                            <option value='fa-odnoklassniki-square'>&#xf264;</option>
                                            <option value='fa-opencart'>&#xf23d;</option>
                                            <option value='fa-openid'>&#xf19b;</option>
                                            <option value='fa-opera'>&#xf26a;</option>
                                            <option value='fa-optin-monster'>&#xf23c;</option>
                                            <option value='fa-outdent'>&#xf03b;</option>
                                            <option value='fa-pagelines'>&#xf18c;</option>
                                            <option value='fa-paint-brush'>&#xf1fc;</option>
                                            <option value='fa-paper-plane'>&#xf1d8;</option>
                                            <option value='fa-paper-plane-o'>&#xf1d9;</option>
                                            <option value='fa-paperclip'>&#xf0c6;</option>
                                            <option value='fa-paragraph'>&#xf1dd;</option>
                                            <option value='fa-paste'>&#xf0ea;</option>
                                            <option value='fa-pause'>&#xf04c;</option>
                                            <option value='fa-pause-circle'>&#xf28b;</option>
                                            <option value='fa-pause-circle-o'>&#xf28c;</option>
                                            <option value='fa-paw'>&#xf1b0;</option>
                                            <option value='fa-paypal'>&#xf1ed;</option>
                                            <option value='fa-pencil'>&#xf040;</option>
                                            <option value='fa-pencil-square'>&#xf14b;</option>
                                            <option value='fa-pencil-square-o'>&#xf044;</option>
                                            <option value='fa-percent'>&#xf295;</option>
                                            <option value='fa-phone'>&#xf095;</option>
                                            <option value='fa-phone-square'>&#xf098;</option>
                                            <option value='fa-photo'>&#xf03e;</option>
                                            <option value='fa-picture-o'>&#xf03e;</option>
                                            <option value='fa-pie-chart'>&#xf200;</option>
                                            <option value='fa-pied-piper'>&#xf2ae;</option>
                                            <option value='fa-pied-piper-alt'>&#xf1a8;</option>
                                            <option value='fa-pied-piper-pp'>&#xf1a7;</option>
                                            <option value='fa-pinterest'>&#xf0d2;</option>
                                            <option value='fa-pinterest-p'>&#xf231;</option>
                                            <option value='fa-pinterest-square'>&#xf0d3;</option>
                                            <option value='fa-plane'>&#xf072;</option>
                                            <option value='fa-play'>&#xf04b;</option>
                                            <option value='fa-play-circle'>&#xf144;</option>
                                            <option value='fa-play-circle-o'>&#xf01d;</option>
                                            <option value='fa-plug'>&#xf1e6;</option>
                                            <option value='fa-plus'>&#xf067;</option>
                                            <option value='fa-plus-circle'>&#xf055;</option>
                                            <option value='fa-plus-square'>&#xf0fe;</option>
                                            <option value='fa-plus-square-o'>&#xf196;</option>
                                            <option value='fa-podcast'>&#xf2ce;</option>
                                            <option value='fa-power-off'>&#xf011;</option>
                                            <option value='fa-print'>&#xf02f;</option>
                                            <option value='fa-product-hunt'>&#xf288;</option>
                                            <option value='fa-puzzle-piece'>&#xf12e;</option>
                                            <option value='fa-qq'>&#xf1d6;</option>
                                            <option value='fa-qrcode'>&#xf029;</option>
                                            <option value='fa-question'>&#xf128;</option>
                                            <option value='fa-question-circle'>&#xf059;</option>
                                            <option value='fa-question-circle-o'>&#xf29c;</option>
                                            <option value='fa-quora'>&#xf2c4;</option>
                                            <option value='fa-quote-left'>&#xf10d;</option>
                                            <option value='fa-quote-right'>&#xf10e;</option>
                                            <option value='fa-ra'>&#xf1d0;</option>
                                            <option value='fa-random'>&#xf074;</option>
                                            <option value='fa-ravelry'>&#xf2d9;</option>
                                            <option value='fa-rebel'>&#xf1d0;</option>
                                            <option value='fa-recycle'>&#xf1b8;</option>
                                            <option value='fa-reddit'>&#xf1a1;</option>
                                            <option value='fa-reddit-alien'>&#xf281;</option>
                                            <option value='fa-reddit-square'>&#xf1a2;</option>
                                            <option value='fa-refresh'>&#xf021;</option>
                                            <option value='fa-registered'>&#xf25d;</option>
                                            <option value='fa-remove'>&#xf00d;</option>
                                            <option value='fa-renren'>&#xf18b;</option>
                                            <option value='fa-reorder'>&#xf0c9;</option>
                                            <option value='fa-repeat'>&#xf01e;</option>
                                            <option value='fa-reply'>&#xf112;</option>
                                            <option value='fa-reply-all'>&#xf122;</option>
                                            <option value='fa-resistance'>&#xf1d0;</option>
                                            <option value='fa-retweet'>&#xf079;</option>
                                            <option value='fa-rmb'>&#xf157;</option>
                                            <option value='fa-road'>&#xf018;</option>
                                            <option value='fa-rocket'>&#xf135;</option>
                                            <option value='fa-rotate-left'>&#xf0e2;</option>
                                            <option value='fa-rotate-right'>&#xf01e;</option>
                                            <option value='fa-rouble'>&#xf158;</option>
                                            <option value='fa-rss'>&#xf09e;</option>
                                            <option value='fa-rss-square'>&#xf143;</option>
                                            <option value='fa-rub'>&#xf158;</option>
                                            <option value='fa-ruble'>&#xf158;</option>
                                            <option value='fa-rupee'>&#xf156;</option>
                                            <option value='fa-s15'>&#xf2cd;</option>
                                            <option value='fa-safari'>&#xf267;</option>
                                            <option value='fa-save'>&#xf0c7;</option>
                                            <option value='fa-scissors'>&#xf0c4;</option>
                                            <option value='fa-scribd'>&#xf28a;</option>
                                            <option value='fa-search'>&#xf002;</option>
                                            <option value='fa-search-minus'>&#xf010;</option>
                                            <option value='fa-search-plus'>&#xf00e;</option>
                                            <option value='fa-sellsy'>&#xf213;</option>
                                            <option value='fa-send'>&#xf1d8;</option>
                                            <option value='fa-send-o'>&#xf1d9;</option>
                                            <option value='fa-server'>&#xf233;</option>
                                            <option value='fa-share'>&#xf064;</option>
                                            <option value='fa-share-alt'>&#xf1e0;</option>
                                            <option value='fa-share-alt-square'>&#xf1e1;</option>
                                            <option value='fa-share-square'>&#xf14d;</option>
                                            <option value='fa-share-square-o'>&#xf045;</option>
                                            <option value='fa-shekel'>&#xf20b;</option>
                                            <option value='fa-sheqel'>&#xf20b;</option>
                                            <option value='fa-shield'>&#xf132;</option>
                                            <option value='fa-ship'>&#xf21a;</option>
                                            <option value='fa-shirtsinbulk'>&#xf214;</option>
                                            <option value='fa-shopping-bag'>&#xf290;</option>
                                            <option value='fa-shopping-basket'>&#xf291;</option>
                                            <option value='fa-shopping-cart'>&#xf07a;</option>
                                            <option value='fa-shower'>&#xf2cc;</option>
                                            <option value='fa-sign-in'>&#xf090;</option>
                                            <option value='fa-sign-language'>&#xf2a7;</option>
                                            <option value='fa-sign-out'>&#xf08b;</option>
                                            <option value='fa-signal'>&#xf012;</option>
                                            <option value='fa-signing'>&#xf2a7;</option>
                                            <option value='fa-simplybuilt'>&#xf215;</option>
                                            <option value='fa-sitemap'>&#xf0e8;</option>
                                            <option value='fa-skyatlas'>&#xf216;</option>
                                            <option value='fa-skype'>&#xf17e;</option>
                                            <option value='fa-slack'>&#xf198;</option>
                                            <option value='fa-sliders'>&#xf1de;</option>
                                            <option value='fa-slideshare'>&#xf1e7;</option>
                                            <option value='fa-smile-o'>&#xf118;</option>
                                            <option value='fa-snapchat'>&#xf2ab;</option>
                                            <option value='fa-snapchat-ghost'>&#xf2ac;</option>
                                            <option value='fa-snapchat-square'>&#xf2ad;</option>
                                            <option value='fa-snowflake-o'>&#xf2dc;</option>
                                            <option value='fa-soccer-ball-o'>&#xf1e3;</option>
                                            <option value='fa-sort'>&#xf0dc;</option>
                                            <option value='fa-sort-alpha-asc'>&#xf15d;</option>
                                            <option value='fa-sort-alpha-desc'>&#xf15e;</option>
                                            <option value='fa-sort-amount-asc'>&#xf160;</option>
                                            <option value='fa-sort-amount-desc'>&#xf161;</option>
                                            <option value='fa-sort-asc'>&#xf0de;</option>
                                            <option value='fa-sort-desc'>&#xf0dd;</option>
                                            <option value='fa-sort-down'>&#xf0dd;</option>
                                            <option value='fa-sort-numeric-asc'>&#xf162;</option>
                                            <option value='fa-sort-numeric-desc'>&#xf163;</option>
                                            <option value='fa-sort-up'>&#xf0de;</option>
                                            <option value='fa-soundcloud'>&#xf1be;</option>
                                            <option value='fa-space-shuttle'>&#xf197;</option>
                                            <option value='fa-spinner'>&#xf110;</option>
                                            <option value='fa-spoon'>&#xf1b1;</option>
                                            <option value='fa-spotify'>&#xf1bc;</option>
                                            <option value='fa-square'>&#xf0c8;</option>
                                            <option value='fa-square-o'>&#xf096;</option>
                                            <option value='fa-stack-exchange'>&#xf18d;</option>
                                            <option value='fa-stack-overflow'>&#xf16c;</option>
                                            <option value='fa-star'>&#xf005;</option>
                                            <option value='fa-star-half'>&#xf089;</option>
                                            <option value='fa-star-half-empty'>&#xf123;</option>
                                            <option value='fa-star-half-full'>&#xf123;</option>
                                            <option value='fa-star-half-o'>&#xf123;</option>
                                            <option value='fa-star-o'>&#xf006;</option>
                                            <option value='fa-steam'>&#xf1b6;</option>
                                            <option value='fa-steam-square'>&#xf1b7;</option>
                                            <option value='fa-step-backward'>&#xf048;</option>
                                            <option value='fa-step-forward'>&#xf051;</option>
                                            <option value='fa-stethoscope'>&#xf0f1;</option>
                                            <option value='fa-sticky-note'>&#xf249;</option>
                                            <option value='fa-sticky-note-o'>&#xf24a;</option>
                                            <option value='fa-stop'>&#xf04d;</option>
                                            <option value='fa-stop-circle'>&#xf28d;</option>
                                            <option value='fa-stop-circle-o'>&#xf28e;</option>
                                            <option value='fa-street-view'>&#xf21d;</option>
                                            <option value='fa-strikethrough'>&#xf0cc;</option>
                                            <option value='fa-stumbleupon'>&#xf1a4;</option>
                                            <option value='fa-stumbleupon-circle'>&#xf1a3;</option>
                                            <option value='fa-subscript'>&#xf12c;</option>
                                            <option value='fa-subway'>&#xf239;</option>
                                            <option value='fa-suitcase'>&#xf0f2;</option>
                                            <option value='fa-sun-o'>&#xf185;</option>
                                            <option value='fa-superpowers'>&#xf2dd;</option>
                                            <option value='fa-superscript'>&#xf12b;</option>
                                            <option value='fa-support'>&#xf1cd;</option>
                                            <option value='fa-table'>&#xf0ce;</option>
                                            <option value='fa-tablet'>&#xf10a;</option>
                                            <option value='fa-tachometer'>&#xf0e4;</option>
                                            <option value='fa-tag'>&#xf02b;</option>
                                            <option value='fa-tags'>&#xf02c;</option>
                                            <option value='fa-tasks'>&#xf0ae;</option>
                                            <option value='fa-taxi'>&#xf1ba;</option>
                                            <option value='fa-telegram'>&#xf2c6;</option>
                                            <option value='fa-television'>&#xf26c;</option>
                                            <option value='fa-tencent-weibo'>&#xf1d5;</option>
                                            <option value='fa-terminal'>&#xf120;</option>
                                            <option value='fa-text-height'>&#xf034;</option>
                                            <option value='fa-text-width'>&#xf035;</option>
                                            <option value='fa-th'>&#xf00a;</option>
                                            <option value='fa-th-large'>&#xf009;</option>
                                            <option value='fa-th-list'>&#xf00b;</option>
                                            <option value='fa-themeisle'>&#xf2b2;</option>
                                            <option value='fa-thermometer'>&#xf2c7;</option>
                                            <option value='fa-thermometer-0'>&#xf2cb;</option>
                                            <option value='fa-thermometer-1'>&#xf2ca;</option>
                                            <option value='fa-thermometer-2'>&#xf2c9;</option>
                                            <option value='fa-thermometer-3'>&#xf2c8;</option>
                                            <option value='fa-thermometer-4'>&#xf2c7;</option>
                                            <option value='fa-thermometer-empty'>&#xf2cb;</option>
                                            <option value='fa-thermometer-full'>&#xf2c7;</option>
                                            <option value='fa-thermometer-half'>&#xf2c9;</option>
                                            <option value='fa-thermometer-quarter'>&#xf2ca;</option>
                                            <option value='fa-thermometer-three-quarters'>&#xf2c8;</option>
                                            <option value='fa-thumb-tack'>&#xf08d;</option>
                                            <option value='fa-thumbs-down'>&#xf165;</option>
                                            <option value='fa-thumbs-o-down'>&#xf088;</option>
                                            <option value='fa-thumbs-o-up'>&#xf087;</option>
                                            <option value='fa-thumbs-up'>&#xf164;</option>
                                            <option value='fa-ticket'>&#xf145;</option>
                                            <option value='fa-times'>&#xf00d;</option>
                                            <option value='fa-times-circle'>&#xf057;</option>
                                            <option value='fa-times-circle-o'>&#xf05c;</option>
                                            <option value='fa-times-rectangle'>&#xf2d3;</option>
                                            <option value='fa-times-rectangle-o'>&#xf2d4;</option>
                                            <option value='fa-tint'>&#xf043;</option>
                                            <option value='fa-toggle-down'>&#xf150;</option>
                                            <option value='fa-toggle-left'>&#xf191;</option>
                                            <option value='fa-toggle-off'>&#xf204;</option>
                                            <option value='fa-toggle-on'>&#xf205;</option>
                                            <option value='fa-toggle-right'>&#xf152;</option>
                                            <option value='fa-toggle-up'>&#xf151;</option>
                                            <option value='fa-trademark'>&#xf25c;</option>
                                            <option value='fa-train'>&#xf238;</option>
                                            <option value='fa-transgender'>&#xf224;</option>
                                            <option value='fa-transgender-alt'>&#xf225;</option>
                                            <option value='fa-trash'>&#xf1f8;</option>
                                            <option value='fa-trash-o'>&#xf014;</option>
                                            <option value='fa-tree'>&#xf1bb;</option>
                                            <option value='fa-trello'>&#xf181;</option>
                                            <option value='fa-tripadvisor'>&#xf262;</option>
                                            <option value='fa-trophy'>&#xf091;</option>
                                            <option value='fa-truck'>&#xf0d1;</option>
                                            <option value='fa-try'>&#xf195;</option>
                                            <option value='fa-tty'>&#xf1e4;</option>
                                            <option value='fa-tumblr'>&#xf173;</option>
                                            <option value='fa-tumblr-square'>&#xf174;</option>
                                            <option value='fa-turkish-lira'>&#xf195;</option>
                                            <option value='fa-tv'>&#xf26c;</option>
                                            <option value='fa-twitch'>&#xf1e8;</option>
                                            <option value='fa-twitter'>&#xf099;</option>
                                            <option value='fa-twitter-square'>&#xf081;</option>
                                            <option value='fa-umbrella'>&#xf0e9;</option>
                                            <option value='fa-underline'>&#xf0cd;</option>
                                            <option value='fa-undo'>&#xf0e2;</option>
                                            <option value='fa-universal-access'>&#xf29a;</option>
                                            <option value='fa-university'>&#xf19c;</option>
                                            <option value='fa-unlink'>&#xf127;</option>
                                            <option value='fa-unlock'>&#xf09c;</option>
                                            <option value='fa-unlock-alt'>&#xf13e;</option>
                                            <option value='fa-unsorted'>&#xf0dc;</option>
                                            <option value='fa-upload'>&#xf093;</option>
                                            <option value='fa-usb'>&#xf287;</option>
                                            <option value='fa-usd'>&#xf155;</option>
                                            <option value='fa-user'>&#xf007;</option>
                                            <option value='fa-user-circle'>&#xf2bd;</option>
                                            <option value='fa-user-circle-o'>&#xf2be;</option>
                                            <option value='fa-user-md'>&#xf0f0;</option>
                                            <option value='fa-user-o'>&#xf2c0;</option>
                                            <option value='fa-user-plus'>&#xf234;</option>
                                            <option value='fa-user-secret'>&#xf21b;</option>
                                            <option value='fa-user-times'>&#xf235;</option>
                                            <option value='fa-users'>&#xf0c0;</option>
                                            <option value='fa-vcard'>&#xf2bb;</option>
                                            <option value='fa-vcard-o'>&#xf2bc;</option>
                                            <option value='fa-venus'>&#xf221;</option>
                                            <option value='fa-venus-double'>&#xf226;</option>
                                            <option value='fa-venus-mars'>&#xf228;</option>
                                            <option value='fa-viacoin'>&#xf237;</option>
                                            <option value='fa-viadeo'>&#xf2a9;</option>
                                            <option value='fa-viadeo-square'>&#xf2aa;</option>
                                            <option value='fa-video-camera'>&#xf03d;</option>
                                            <option value='fa-vimeo'>&#xf27d;</option>
                                            <option value='fa-vimeo-square'>&#xf194;</option>
                                            <option value='fa-vine'>&#xf1ca;</option>
                                            <option value='fa-vk'>&#xf189;</option>
                                            <option value='fa-volume-control-phone'>&#xf2a0;</option>
                                            <option value='fa-volume-down'>&#xf027;</option>
                                            <option value='fa-volume-off'>&#xf026;</option>
                                            <option value='fa-volume-up'>&#xf028;</option>
                                            <option value='fa-warning'>&#xf071;</option>
                                            <option value='fa-wechat'>&#xf1d7;</option>
                                            <option value='fa-weibo'>&#xf18a;</option>
                                            <option value='fa-weixin'>&#xf1d7;</option>
                                            <option value='fa-whatsapp'>&#xf232;</option>
                                            <option value='fa-wheelchair'>&#xf193;</option>
                                            <option value='fa-wheelchair-alt'>&#xf29b;</option>
                                            <option value='fa-wifi'>&#xf1eb;</option>
                                            <option value='fa-wikipedia-w'>&#xf266;</option>
                                            <option value='fa-window-close'>&#xf2d3;</option>
                                            <option value='fa-window-close-o'>&#xf2d4;</option>
                                            <option value='fa-window-maximize'>&#xf2d0;</option>
                                            <option value='fa-window-minimize'>&#xf2d1;</option>
                                            <option value='fa-window-restore'>&#xf2d2;</option>
                                            <option value='fa-windows'>&#xf17a;</option>
                                            <option value='fa-won'>&#xf159;</option>
                                            <option value='fa-wordpress'>&#xf19a;</option>
                                            <option value='fa-wpbeginner'>&#xf297;</option>
                                            <option value='fa-wpexplorer'>&#xf2de;</option>
                                            <option value='fa-wpforms'>&#xf298;</option>
                                            <option value='fa-wrench'>&#xf0ad;</option>
                                            <option value='fa-xing'>&#xf168;</option>
                                            <option value='fa-xing-square'>&#xf169;</option>
                                            <option value='fa-y-combinator'>&#xf23b;</option>
                                            <option value='fa-y-combinator-square'>&#xf1d4;</option>
                                            <option value='fa-yahoo'>&#xf19e;</option>
                                            <option value='fa-yc'>&#xf23b;</option>
                                            <option value='fa-yc-square'>&#xf1d4;</option>
                                            <option value='fa-yelp'>&#xf1e9;</option>
                                            <option value='fa-yen'>&#xf157;</option>
                                            <option value='fa-yoast'>&#xf2b1;</option>
                                            <option value='fa-youtube'>&#xf167;</option>
                                            <option value='fa-youtube-play'>&#xf16a;</option>
                                            <option value='fa-youtube-square'>&#xf166;</option>
                                        </select>
                                        <button class="btn btn-icon" type="submit"><span class="fa fa-plus"></span></button>
                                    </form>
                                </div>  
                                <div class="show-values" id="showValues">

                                    <?php 
                                    $valores = $value->getValues($conn);
                                    $valoresLista = $valores->fetchAll();
                                    if ($valores->rowCount() > 0) {
                                        foreach($valoresLista as $valor) {
                                            echo '
                                                <div class="value-item"> 
                                                    <div class="value-color-bar" style="background: '.$valor['valorColor'].'"></div>
                                                    <i class="fa '.$valor['valorIcono'].'"></i>
                                                    <p class="badge">'.$valor['valorNombre'].'</p>
                                                </div>
                                            ';
                                        }
                                    } else {
                                        echo '
                                            <div class="home-card-temp home-card-value">
                                                <p class="textaleft">Los valores o prioridades son los principios que rigen todas tus acciones.
                                                    Las cosas que m??s importancia tienen en tu vida.
                                                </p>
                                            </div>
                                            <div class="home-card-temp home-card-value">
                                                <p class="textaleft">Algunos ejemplos de prioridades son: Salud, Felicidad, Amor, Arte, etc. A</p>
                                            </div>
                                        ';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="home-grid-box">
                                <div class="home-card-temp home-card-info home-card-phrases">
                                    <p class="home-phrases">
                                        <i class="fa fa-star"></i>
                                        <span>Que gusto saber que est??s avanzado con tus objetivos.</span>
                                    </p>
                                </div>
                                <div class="home-card-temp home-card-info">
                                    <p class="home-card-imgtext">??Hagamos que <br> las cosas <br> pasen!</p>
                                    <img src="../assets/images/info.svg">
                                </div>
                            </div>
                            <div class="home-grid-box">

                            <?php 
                                $proyectos = $project->getProjects($conn);
                                $result = $proyectos->fetchAll();
                                if ($proyectos->rowCount() > 0) {
                                    foreach($result as $element) {
                                        echo '
                                            <div class="home-grid-boxes__item">
                                                <div class="box-body">
                                                    <div class="box-head">
                                                        <span class="box-icon fa '.$element['icon'].'" style="color:'.$element['color'].'"></span>
                                                        <a href="'.URLSERVER.'/projects/'.$element['proyectoLink'].'"><h4 class="box-name">'.$element['proyectoNombre'].'</h4></a>
                                                    </div>
                                                </div>
                                            </div>
                                        ';
                                    }
                                } else {
                                    echo '
                                        <div class="home-card-temp">
                                            <img src="../assets/images/addpro.svg">
                                            <p class="home-card-temp-text" >Comencemos a unir los puntos.</p>
                                        </div>  
                                    ';
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="sec-right">
                <div class="widget">

                    <div class="container">
                        <div class="calendar-assets">
                            <h1 id="currentDate"></h1>
                            <div class="field search-by-date">
                                <label for="date">Buscar por fecha</label>
                                <form class="form-input" id="date-search" onsubmit="return setDate(this)">
                                    <input type="date" class="text-field" name="date" id="date" required>
                                    <button type="submit" class="btn-calendar btn-small" title="Pesquisar"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                            <div class="day-assets">
                                <button class="btn-calendar" onclick="prevDay()" title="Dia anterior"><i class="fas fa-chevron-left"></i> </button>
                                <button class="btn-calendar" onclick="resetDate()" title="Dia actual">Hoy</button>
                                <button class="btn-calendar" onclick="nextDay()" title="Pr??ximo dia"><i class="fas fa-chevron-right"></i> </button>
                            </div>
                        </div>
                        <div class="calendar" id="table">
                            <div class="header">
                                <!-- Aqui ?? onde ficar?? o h1 com o m??s e o ano -->
                                <div class="month" id="month-header">

                                </div>
                                <div class="buttons">
                                    <button class="icon" onclick="prevMonth()" title="M??s anterior"><i class="fas fa-chevron-left"></i></button>
                                    <button class="icon" onclick="nextMonth()" title="Pr??ximo m??s"><i class="fas fa-chevron-right "></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <p class="widget-title"><i class="fa-solid fa-calendar-check"></i> <?=$date;?></p> -->

                    <div class="todo-list">
                        <p class="todo-divider">Tareas por hacer</p>
                        <ul>

                        <?php 
                            $todayId = $project->getCalendar($conn);
                            
                            $tasksPending = $project->getTaskByDate($conn, date('Y-m-d'), 'Pendiente');
                            $resultPending = $tasksPending->fetchAll();
                            if ($tasksPending->rowCount() > 0) {
                                foreach($resultPending as $t) {
                                    $date = ($t['tareaFechaInicio'] == $t['tareaFechaFin']) ? $t['tareaFechaFin'] : $t['tareaFechaInicio'] . ' - ' . $t['tareaFechaFin'];
                                    $checked = ($t['tareaEstado'] === 'Completado') ? 'checked' : '';

                                    if ($t['tareaTipo'] === "Una vez") {
                                        echo '
                                            <li>
                                                <label class="todo-list__text">
                                                    <input '.$checked.' type="checkbox" class="inputTask" tasktype="'.$t['tareaTipo'].'" taskid="'.$t['tareaId'].'" habitoId="'.$t['habitoId'].'"> 
                                                    <p>
                                                        <span class="normal-text">'.$t['tareaDescripcion'].'</span> 
                                                        <span class="small-text">'.$date.' ??? '.$t['tareaTipo'].'</span>
                                                    </p>
                                                </label>
                                            </li>
                                        ';
                                    }
                                    // validate just habits filtered days
                                    setlocale(LC_TIME, 'es_ES','es_ES.UTF-8');
                                    $hoy = utf8_encode(strftime('%A'));
                                    
                                    $arr_days = explode(',', $t['habitoDias']);
                                    if ($t['tareaTipo'] === "Habito" && trim($t['habitoId']) != "" && in_array($hoy, $arr_days)) {
                                        
                                        if ($todayId !== $t['calendarId'] || $t['bitacoraEstado'] === 'No completado') {
                                            // echo $todayId ." - ";
                                            // echo $t['calendarId'] . ' - ';
                                            // echo $t['bitacoraEstado'];
                                            echo '
                                                <li>
                                                    <label class="todo-list__text">
                                                        <input '.$checked.' type="checkbox" class="inputTask" tasktype="'.$t['tareaTipo'].'" taskid="'.$t['tareaId'].'" habitoId="'.$t['habitoId'].'"> 
                                                        <p>
                                                            <span class="normal-text">'.$t['tareaDescripcion'].'</span> 
                                                            <span class="small-text">'.$date.' ??? '.$t['tareaTipo'].'
                                                             
                                                            </span>
                                                        </p>
                                                    </label>
                                                </li>
                                            ';
                                        }
                                    }  
                                }
                            }
                        ?>

                        <p class="todo-divider">Completado</p>
                        <ul>

                        <?php 
                            $tasksCompleted = $project->getTaskByDate($conn, date('Y-m-d'), 'Completado');
                            $resultCompleted = $tasksCompleted->fetchAll();
                            if ($tasksCompleted->rowCount() > 0) {
                                foreach($resultCompleted as $t) {
                                    $date = ($t['tareaFechaInicio'] == $t['tareaFechaFin']) ? $t['tareaFechaFin'] : $t['tareaFechaInicio'] . ' - ' . $t['tareaFechaFin'];
                                    $checked = ($t['tareaEstado'] === 'Completado') ? 'checked' : '';

                                    if ($todayId === $t['calendarId'] && $t['bitacoraEstado'] === 'Completado') {
                                        echo '
                                            <li>
                                                <div class="todo-list__text">
                                                    <input checked type="checkbox" class="inputTask" tasktype="'.$t['tareaTipo'].'" taskid="'.$t['tareaId'].'" habitoId="'.$t['habitoId'].'"> 
                                                    <p>
                                                        <span class="normal-text">'.$t['tareaDescripcion'].'</span> 
                                                        <span class="small-text">'.$date.' ??? '.$t['tareaTipo'].'
                                                        
                                                        </span>
                                                    </p>
                                                </div>
                                            </li>
                                        ';
                                    }
                                }
                            } 
                        ?>

                        </ul>
                    </div>
                </div>
            </section>
        </article>
    </main>

<?php require_once ('templates/footer.php'); ?>

<link rel="stylesheet" href="<?=URLSERVER.'/assets/daterangepicker/daterangepicker.css';?>">
<script type="text/javascript" src="<?=URLSERVER.'/assets/daterangepicker/daterangepicker.js';?>"></script>

<script>

// load data into a modal to create a new project
let createProject = document.querySelector(".createProject");
createProject.addEventListener("click", () => {
    openModal(` <div class="modal-header">
                    <p class="modal-title">Crear nuevo proyecto</p>
                </div>
                <div class="modal-content">
                    <form id="formCreateProject" class="modal-form">
                        <div class="form-left">
                            <div class="form-group">
                                <input class="input-project" id="project-name" name="project-name" type="text" placeholder="Proyecto" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <textarea name="project-description" id="project-description" cols="10" rows="2" placeholder="Descripci??n del proyecto"></textarea>
                            </div>
                            <div class="form-group form-group-block">
                                <label for="inputGoal">Fecha</label>
                                <input type="text" name="daterange">
                            </div>
                        </div>
                        <div class="form-right">
                            <div class="form-right-title">
                                <p>Atributos</p>
                                <span class="lj lj-bookmark"></span>
                            </div>
                            <div class="form-group">
                                <select name="project-value" id="project-value">
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="project-status" id="project-status">
                                    <option disabled="disabled" value="0">Estado</option>
                                    <option value="Pendiente" selected>Pendiente</option>
                                    <option value="En progreso">En progreso</option>
                                    <option value="Completado">Completado</option>
                                </select>
                            </div>
                            <!--div class="form-group">
                                <label class="attributes" for="project-start-date">Inicio</label>
                                <input type="date" name="project-start-date" id="project-start-date" value="${moment().format('Y-MM-DD')}">
                            </div>
                            <div-- class="form-group">
                                <label class="attributes" for="project-end-date">Fin</label>
                                <input type="date" name="project-end-date" id="project-end-date" >
                            </div-->
                        </div>
                    </form>
                    <!--p id="modalMessage" class="modal-message"></p-->
                    <input class="form-btn" onclick="saveProject('formCreateProject')" type="submit" value="Guardar">
                </div>`
            );

    for (let i = 1; i < $(".value-item").length; i++) {
        $("#project-value").append(`<option value="${$(".value-item:nth-child("+i+") p").text()}">${$(".value-item:nth-child("+i+") p").text()}</option>`);
    }   
    
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            "locale":{
                "format": "DD-MM-YYYY",
                "separator": " - ",
                "applyLabel": "Aplicar",
                "cancelLabel": "Cancelar",
                "daysOfWeek": ["Dom","Lun","Mar", "Mie","Jue","Vie","Sab"],
                "monthNames": ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                "firstDay": 0
            },
            function(start, end, label) {
                console.log(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
            }
        });
    });
});

// first step
let cantValues = document.getElementById("cantValues").value;
let dashboardNumbers = document.querySelector(".dashboard-numbers");
let scheduleRigth = document.querySelector('.habits-list');
let getName = document.getElementById("username").innerHTML;

if (cantValues == 0) {
    dashboardNumbers.innerHTML = `
        <div class="welcome">
            <div class="welcome-part">
                <h4 class="welcome-title">Bienvenido ${getName.split(' ')[0]}</h4>
                <p class="welcome-text">
                    Comencemos por definir tus valores y prioridades.<br>
                    Luego continuaremos con los proyectos y metas, lo cual constituir?? la escencia de tu plan.
                </p>
            </div>
            <div class="welcome-part">
                <img class="welcome-img" src="../assets/images/welcome.svg">
            </div>
        </div>
    `;

    // scheduleRigth.innerHTML = `<div class="task-today">Aqu?? podr??s ver y completar las tareas del d??a.</div>`;
}

/* ------------------------------- SAVE VALUE ------------------------------- */

let saveValue = document.getElementById('saveValue');

saveValue.addEventListener('submit', (e) => {
    e.preventDefault();
    let formData = new FormData(saveValue);
    formData.append("ajax", "add-value");
    if (document.getElementsByName('value-name').length === 0) {
        sendAjax('/src/ajax.php', formData);
    } else {
        loast.show("Ingresar el valor", "warning");
    }
});

/* -------------------------------- CALENDAR -------------------------------- */

const months = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Setiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
];

const weekdays = ["Domingo", "Lunes", "Martes", "Mi??rcoles", "Jueves", "Viernes", "S??bado"];

// Variable principal
let date = new Date();

// Fun????o que retorna a data atual do calend??rio 
function getCurrentDate(element, asString) {
    if (element) {
        if (asString) {
            return element.textContent = weekdays[date.getDay()] + ', ' + date.getDate() + " de " + months[date.getMonth()] + " de " + date.getFullYear();
        }
        return element.value = date.toISOString().substr(0, 10);
    }
    return date;
}

// Fun????o principal que gera o calend??rio
function generateCalendar() {

    // Pega um calend??rio e se j?? existir o remove
    const calendar = document.getElementById('calendar');
    if (calendar) {
        calendar.remove();
    }

    // Cria a tabela que ser?? armazenada as datas
    const table = document.createElement("table");
    table.id = "calendar";

    // Cria os headers referentes aos dias da semana
    const trHeader = document.createElement('tr');
    trHeader.className = 'weekends';
    weekdays.map(week => {
        const th = document.createElement('th');
        const w = document.createTextNode(week.substring(0, 3));
        th.appendChild(w);
        trHeader.appendChild(th);
    });

    // Adiciona os headers na tabela
    table.appendChild(trHeader);

    //Pega o dia da semana do primeiro dia do m??s
    const weekDay = new Date(
        date.getFullYear(),
        date.getMonth(),
        1
    ).getDay();

    //Pega o ultimo dia do m??s
    const lastDay = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDate();

    let tr = document.createElement("tr");
    let td = '';
    let empty = '';
    let btn = document.createElement('button');
    let week = 0;

    // Se o dia da semana do primeiro dia do m??s for maior que 0(primeiro dia da semana);
    while (week < weekDay) {
        td = document.createElement("td");
        empty = document.createTextNode(' ');
        td.appendChild(empty);
        tr.appendChild(td);
        week++;
    }

    // Vai percorrer do 1?? at?? o ultimo dia do m??s
    for (let i = 1; i <= lastDay;) {
        // Enquanto o dia da semana for < 7, ele vai adicionar colunas na linha da semana
        while (week < 7) {
            td = document.createElement('td');
            let text = document.createTextNode(i);
            btn = document.createElement('button');
            btn.className = "btn-day";
            btn.addEventListener('click', function () { changeDate(this) });
            week++;

            // Controle para ele parar exatamente no ultimo dia
            if (i <= lastDay) {
                i++;
                btn.appendChild(text);
                td.appendChild(btn)
            } else {
                text = document.createTextNode(' ');
                td.appendChild(text);
            }
            tr.appendChild(td);
        }
        // Adiciona a linha na tabela
        table.appendChild(tr);

        // Cria uma nova linha para ser usada
        tr = document.createElement("tr");

        // Reseta o contador de dias da semana
        week = 0;
    }
    // Adiciona a tabela a div que ela deve pertencer
    const content = document.getElementById('table');
    content.appendChild(table);
    changeActive();
    changeHeader(date);
    document.getElementById('date').textContent = date;
    getCurrentDate(document.getElementById("currentDate"), true);
    getCurrentDate(document.getElementById("date"), false);
}

// Altera a data atr??ves do formul??rio
function setDate(form) {
    let newDate = new Date(form.date.value);
    date = new Date(newDate.getFullYear(), newDate.getMonth(), newDate.getDate() + 1);
    generateCalendar();
    return false;
}

// M??todo Muda o m??s e o ano do topo do calend??rio
function changeHeader(dateHeader) {
    const month = document.getElementById("month-header");
    if (month.childNodes[0]) {
        month.removeChild(month.childNodes[0]);
    }
    const headerMonth = document.createElement("h1");
    const textMonth = document.createTextNode(months[dateHeader.getMonth()].substring(0, 9) + " " + dateHeader.getFullYear());
    headerMonth.appendChild(textMonth);
    month.appendChild(headerMonth);
}

// Fun????o para mudar a cor do bot??o do dia que est?? ativo
function changeActive() {
    let btnList = document.querySelectorAll('button.active');
    btnList.forEach(btn => {
        btn.classList.remove('active');
    });
    btnList = document.getElementsByClassName('btn-day');
    for (let i = 0; i < btnList.length; i++) {
        const btn = btnList[i];
        if (btn.textContent === (date.getDate()).toString()) {
            btn.classList.add('active');
        }
    }
}

// Fun????o que pega a data atual
function resetDate() {
    date = new Date();
    generateCalendar();
}

// Muda a data pelo numero do bot??o clicado
function changeDate(button) {
    let newDay = parseInt(button.textContent);
    date = new Date(date.getFullYear(), date.getMonth(), newDay);
    generateCalendar();
}

// Fun????es de avan??ar e retroceder m??s e dia
function nextMonth() {
    date = new Date(date.getFullYear(), date.getMonth() + 1, 1);
    generateCalendar(date);
}

function prevMonth() {
    date = new Date(date.getFullYear(), date.getMonth() - 1, 1);
    generateCalendar(date);
}


function prevDay() {
    date = new Date(date.getFullYear(), date.getMonth(), date.getDate() - 1);
    generateCalendar();
}

function nextDay() {
    date = new Date(date.getFullYear(), date.getMonth(), date.getDate() + 1);
    generateCalendar();
}

document.onload = generateCalendar(date);

// check task for today

$('.inputTask').click(function() {
    let taskid = $(this).attr('taskid');
    let tasktype = $(this).attr('tasktype');
    let habitoid = $(this).attr('habitoid');

    checkTask($(this), taskid, tasktype, habitoid);
});


</script>