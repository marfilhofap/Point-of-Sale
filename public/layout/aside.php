<?php $jestaun_sira = $auth->controlo_jestaun_sira($_SESSION['id_pozisaun']); ?>

<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading"></li>
                <?php
                foreach ($jestaun_sira as $loop) {
                    if ($loop['id_jestaun'] == '66d83180-d34a-49d3-8126-23d5a5ad364e') { ?>

                        <li>
                            <a href="index.php" class="<?= !isset($_GET['c']) ? 'mm-active' : '' ?>">
                                <i class="metismenu-icon pe-7s-display1"></i>
                                Home
                            </a>
                        </li>

                <?php }
                } ?>

                <?php
                foreach ($jestaun_sira as $loop) {
                    if ($loop['id_jestaun'] == '650a2e7d-80f0-4f03-bef7-abd0731da275') { ?>

                        <!-- <li class="app-sidebar__heading">Order</li> -->
                        <li>
                            <a href="?c=meza_sira" class="<?= $_GET['c'] == 'order' || $_GET['c'] == 'meza_sira' || $_GET['c'] == 'pendente' ? 'mm-active' : '' ?>">
                                <i class="metismenu-icon pe-7s-cart"></i>
                                Order
                            </a>
                        </li>

                <?php }
                } ?>

                <?php
                foreach ($jestaun_sira as $loop) {
                    if ($loop['id_jestaun'] == 'd0d9ef35-005b-4905-8de0-aa8a9e4e321c') { ?>
                        <li>
                            <a href="?c=produtu" class="<?= $_GET['c'] == 'produtu' || $_GET['c'] == 'produtu_sira' ? 'mm-active' : '' ?>">
                                <i class="metismenu-icon pe-7s-coffee"></i>
                                Produtu
                            </a>
                        </li>
                <?php }
                } ?>

                <?php
                foreach ($jestaun_sira as $loop) {
                    if ($loop['id_jestaun'] == 'e607497b-e6c7-4d2b-9478-48558f043a0e') { ?>
                        <li class="<?= $_GET['c'] == 'meza_mamuk' || $_GET['c'] == 'transasaun_sira' ? 'mm-active' : '' ?>">
                            <a href="#">
                                <i class="metismenu-icon pe-7s-shopbag"></i>
                                Transasaun
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="?c=transasaun_sira" class="<?= $_GET['c'] == 'transasaun_sira' ? 'mm-active' : '' ?>">
                                        <i class="metismenu-icon"></i>
                                        Transasaun sira
                                    </a>
                                </li>
                                <li>
                                    <a href="?c=meza_mamuk" class="<?= $_GET['c'] == 'meza_mamuk' ? 'mm-active' : '' ?>">
                                        <i class="metismenu-icon"></i>
                                        Meza Mamuk
                                    </a>
                                </li>
                            </ul>
                        </li>
                <?php }
                } ?>

                <?php
                foreach ($jestaun_sira as $loop) {
                    if ($loop['id_jestaun'] == '2011508b-bd6d-4bbb-81f0-e9e09e90d613') { ?>
                        <li class="<?= $_GET['c'] == 'membru' || $_GET['c'] == 'utilijador' || $_GET['c'] == 'pozisaun' ? 'mm-active' : '' ?>">
                            <a href="#">
                                <i class="metismenu-icon pe-7s-user"></i>
                                Utilijador
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="?c=membru" class="<?= $_GET['c'] == 'membru' ? 'mm-active' : '' ?>">
                                        <i class="metismenu-icon">
                                        </i>Membru
                                    </a>
                                </li>
                                <li>
                                    <a href="?c=pozisaun" class="<?= $_GET['c'] == 'pozisaun' ? 'mm-active' : '' ?>">
                                        <i class="metismenu-icon">
                                        </i>Pozisaun
                                    </a>
                                </li>
                            </ul>
                        </li>
                <?php }
                } ?>

                <?php
                foreach ($jestaun_sira as $loop) {
                    if ($loop['id_jestaun'] == 'ad77e562-1004-4287-9f21-160829e7c621') { ?>
                        <li class="<?= $_GET['c'] == 'resibu' || $_GET['c'] == 'relatorio_jeral' || $_GET['c'] == 'detallu' ? 'mm-active' : '' ?>">
                            <a href="#">
                                <i class="metismenu-icon pe-7s-print"></i>
                                Relatorio
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <!-- detallu -->
                                    <a href="?c=resibu" class="<?= $_GET['c'] == 'resibu' || $_GET['c'] == 'detallu' ? 'mm-active' : '' ?>">
                                        <i class="metismenu-icon">
                                        </i>Resibu
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="?c=resibu" class="<?//= $_GET['c'] == 'gastu_kada_loron' || $_GET['c'] == 'detallu' ? 'mm-active' : '' ?>">
                                        <i class="metismenu-icon">
                                        </i>Gastus
                                    </a>
                                </li> -->
                                <li>
                                    <a href="?c=relatorio_jeral" class="<?= $_GET['c'] == 'relatorio_jeral' ? 'mm-active' : '' ?>">
                                        <i class="metismenu-icon">
                                        </i>Relatorio Jeral
                                    </a>
                                </li>
                            </ul>
                        </li>
                <?php }
                } ?>

            </ul>
        </div>
    </div>
</div>