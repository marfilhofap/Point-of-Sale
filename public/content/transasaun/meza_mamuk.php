<?php
$meza_mamuk = $get_table->get_table("view_meza_mamuk");
?>

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-coffee icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Meza ne'ebe Mamuk hela
                <div class="page-title-subheading">
                    <?= 'Total Meza ' . count($meza_mamuk) . ' nebe Mamuk hela' ?>
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
    <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Numeru Meza</th>
                                <th class="text-center">Asaun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($meza_mamuk as $loop) {
                                echo '<tr>
                                        <td class="text-center">' . $loop['nu_meza'] . '</td>
                                        <td>
                                            <div class="d-flex justify-content-center flex-shrink-0">
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary" target="_blank">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-toggle="modal" data-target="#hamos_materia" data-nu_meza="' . $loop['nu_meza'] . '">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>