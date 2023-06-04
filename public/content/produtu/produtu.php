<?php
$kategoria = $get_table->get_table("kategoria order by kategoria ASC");
$prod = $get_table->get_table("produtu");
?>

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-coffee icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Produtu sira tuir kada Kategoria
                <div class="page-title-subheading">
                    <?= 'Eziste Produtu ' . count($prod) . ' husi total Kategoria ' . count($kategoria) ?>
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
                    foreach ($kategoria as $loop) {
                        $produtu = $get_table->get_table_uuid("", "produtu", "id_kategoria", $loop['id_kategoria'], "");
                        echo '<div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow py-2">
                                        <div class="card-body">
                                            <a href="?c=produtu_sira&id=' . $loop['id_kategoria'] . '" class="text-decoration-none">
                                                <div class="row no-gutters align-items-center">
                                                
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            ' . $loop['kategoria'] . '</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">' . count($produtu) . '</div>
                                                    </div>
                                                    <div class="col-auto">';
                                                    $jestaun_sira = $auth->image_cache($loop['id_kategoria']);
                                                    echo '</div>
                                                
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