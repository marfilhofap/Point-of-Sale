<?php
$meza_ujadu = $get_table->get_table("view_meza_ujadu order by data ASC");
?>

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-coffee icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Meza ne'ebe Uja hela
                <div class="page-title-subheading">
                    <?= 'Total Meza ' . count($meza_ujadu) . ' nebe uja hela' ?>
                </div>
            </div>
        </div>
        <!-- <div class="page-title-actions">
            <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-primary">
                Aumenta <i class="fa fa-plus"></i>
            </button>
        </div> -->
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <?php
                    if (count($meza_ujadu) > 0) {
                        foreach ($meza_ujadu as $loop) {
                            $hahan = $get_table->get_table_uuid("", "view_transaksaun", "id_meza", $loop['id_meza'], "");
                            echo '<div class="col-xl-3 col-lg-7">
                        <a href="#" class="text-decoration-none">
                        <div class="card card-houver shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-';
                            if ($loop['tipu_transaksaun'] == 'Konsumu') {
                                echo 'primary';
                            } elseif ($loop['tipu_transaksaun'] == 'Prosesa') {
                                echo 'warning';
                            } 
                            // elseif ($loop['tipu_transaksaun'] == 'Hameno') {
                            //     echo 'danger';
                            // }
                            echo '">Meza ' . $loop['nu_meza'] . ' - ' . $loop['tipu_transaksaun'] . '</h6>
                        </div>
                        <div class="card-body">';
                            $no = 1;
                            foreach ($hahan as $loop) {
                                echo $no++ . '. ' . $loop['naran_produtu'] . ' : ' . $loop['unidade'] . '<br>';
                            }

                            echo '</div>
                        </div>
                        </a>
                    </div>';
                        }
                    } else {
                        echo '<div class="col-xl-12">
                        <p>Seidauk iha Orderan ruma</p>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>