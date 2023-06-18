<?php
$kategoria = $get_table->get_table("kategoria order by kategoria ASC");
$prod = $get_table->get_table("produtu");
$meza = $get_table->get_table("meza");
?>

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-keypad icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Meza sira
                <div class="page-title-subheading">
                    <?= 'Total meza ' . count($meza)?>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <?php
                    $no = 1;
                    foreach ($meza as $loop) {
                        echo '<div class="col-xl-2 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow py-2">
                                        <div class="card-body">
                                            <a href="?c=order&m=' . $loop['id_meza'] . '" class="text-decoration-none">
                                                <div class="row no-gutters align-items-center">
                                                
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Meza</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">' . $loop['nu_meza'] . '</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <img src="assets/images/meza.jpg" style="width: 50px;" alt="logo">
                                                    </div>
                                                
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>';
                    }
                    ?>
                </div>

            </div>

        </div>
    </div>
</div>