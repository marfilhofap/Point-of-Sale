<?php
$id = $_GET['id'];
$produtu = $get_table->get_table_uuid("", "produtu", "id_kategoria", $id, "");
$kategoria = $get_table->get_table_uuid("", "kategoria", "id_kategoria", $id, "");
?>

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-coffee icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>
                Kategoria <?= $kategoria[0]['kategoria'] ?>
                <div class="page-title-subheading">
                    <?= 'Eziste Produtu ' . count($produtu) . ' husi Kategoria ida ne'; ?>
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <button type="button" class="btn-shadow mr-3 btn btn-primary" data-toggle="modal" data-target="#aumenta_kategoria">
                Aumenta <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produtu</th>
                                    <th>Folin</th>
                                    <th>Estadu</th>
                                    <th class="text-center">Asaun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($produtu as $loop) {
                                    echo '<tr>
                                        <td>' . $no++ . '</td>     
                                        <td>' . $loop['naran_produtu'] . '</td>
                                        <td>' . $loop['folin'] . '</td>
                                        <td>' . $loop['estadu'] . '</td>
                                        <td>
                                            <div class="d-flex justify-content-center flex-shrink-0">
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-toggle="modal" data-target="#hamos_materia" data-id_produtu="' . $loop['id_produtu'] . '" data-id_kategoria="' . $loop['id_kategoria'] . '">
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
</div>