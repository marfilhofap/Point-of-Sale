<?php
$utilizador = $get_table->get_table("view_utilijador where estadu='Ativu' order by id_membru ASC");
?>

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-user icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Utilizador Ativo
                <div class="page-title-subheading">
                    <?= 'Eziste Produtu ' . count($utilizador) . ' husi total Kategoria' ?>
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-primary">
                Aumenta <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Naran Kompletu</th>
                                <th>Pozisaun</th>
                                <th>Jestaun</th>
                                <th>Asaun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($utilizador as $loop) {
                                $nivel_asesu = $get_table->get_table_uuid("", "view_nivel_asesu_utilijador", "id_utilijador", $loop['id_utilijador'], " order by jestaun ASC");
                                echo '<tr>
                                        <td>' . $no++ . '</td>     
                                        <td>' . $loop['naran_kompletu'] . '</td>
                                        <td>' . $loop['pozisaun'] . '</td>
                                        <td>';
                                foreach ($nivel_asesu as $loops) {
                                    echo '- ' . $loops['jestaun'] . '<br>';
                                }
                                echo '</td>
                                        <td>
                                            <div class="d-flex justify-content-center flex-shrink-0">
                                                <a href="?c=utilijador_detallu&id=' . $loop['id_utilijador'] . '" class="btn btn-sm btn-light btn-active-primary">
                                                    <i class="fas fa-info"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary" target="_blank">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-toggle="modal" data-target="#hamos_identidade" data-id_utilijador="' . $loop['id_utilijador'] . '" data-naran_kompletu="' . $loop['naran_kompletu'] . '">
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