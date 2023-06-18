<?php
$identificacao = $get_table->get_table("view_identidade_pessoal order by id_membru ASC");
$relatorio_diario = $get_table->get_table("view_relatorio_diario order by data DESC ");
$relatorio_mensal = $get_table->get_table("view_relatorio_mensal order by fulan DESC ");
$relatorio_anual = $get_table->get_table_uuid("tinan, sum(osan_tama) as t_osan_tama, sum(osan_sai) as t_osan_sai, sum(diferensia) as t_diferensia", "view_relatorio_anual", "", "", "group by tinan order by tinan DESC");
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-bookmarks icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Relatorio Jeral
                <div class="page-title-subheading">
                    Relatorio bele hare tuir Diario, Mensal no Anual
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-card mb-3 card">
    <div class="card-header"><i class="header-icon lnr-gift icon-gradient bg-grow-early"> </i>
        Relatorio Jeral
        <div class="btn-actions-pane-right">
            <div class="nav">
                <a data-toggle="tab" href="#tab-eg4-0" class="border-0 btn-pill btn-wide btn-transition active btn btn-outline-primary">Diario</a>
                <a data-toggle="tab" href="#tab-eg4-1" class="mr-1 ml-1 btn-pill btn-wide border-0 btn-transition  btn btn-outline-primary">Mensal</a>
                <a data-toggle="tab" href="#tab-eg4-2" class="border-0 btn-pill btn-wide btn-transition  btn btn-outline-primary">Anual</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="tab-eg4-0" role="tabpanel">

                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Data</th>
                                                <th class="text-center">Osan Tama</th>
                                                <th class="text-center">Osan Sai</th>
                                                <th class="text-center">Diferensia</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $osan_tama = 0;
                                            $osan_sai = 0;
                                            $diferensia = 0;
                                            foreach ($relatorio_diario as $loop) {
                                                echo '<tr>
                                                    <td class="text-center">' . $no++ . '</td>     
                                                    <td class="text-center">' . $loop['data'] . '</td>
                                                    <td class="text-center">' . $loop['osan_tama'] . '</td>
                                                    <td class="text-center">' . $loop['osan_sai'] . '</td>
                                                    <td class="text-center">' . $loop['diferensia'] . '</td>
                                                </tr>';
                                                $osan_tama += $loop['osan_tama'];
                                                $osan_sai += $loop['osan_sai'];
                                                $diferensia += $loop['diferensia'];
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-7">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h6>Relatorio Diario fulan ne'e:</h6>
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 mt-4 widget-content">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-dark">
                                                        <h6>Osan Tama : $ <?= $osan_tama ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-dark">
                                                        <h6>Osan Sai : $ <?= $osan_sai ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content bg-primary">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-white">
                                                        <h6>Diferensia : $ <?= $diferensia ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="tab-pane" id="tab-eg4-1" role="tabpanel">

                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Fulan</th>
                                                <th class="text-center">Osan Tama</th>
                                                <th class="text-center">Osan Sai</th>
                                                <th class="text-center">Diferensia</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $osan_tama_2 = 0;
                                            $osan_sai_2 = 0;
                                            $diferensia_2 = 0;
                                            foreach ($relatorio_mensal as $loop) {
                                                echo '<tr>
                                                    <td class="text-center">' . $no++ . '</td>     
                                                    <td class="text-center">' . $get_table->Mes($loop['fulan']) . '</td>
                                                    <td class="text-center">' . $loop['osan_tama'] . '</td>
                                                    <td class="text-center">' . $loop['osan_sai'] . '</td>
                                                    <td class="text-center">' . $loop['diferensia'] . '</td>
                                                </tr>';
                                                $osan_tama_2 += $loop['osan_tama'];
                                                $osan_sai_2 += $loop['osan_sai'];
                                                $diferensia_2 += $loop['diferensia'];
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-7">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                            <h6>Relatorio Mensal tinan ne'e:</h6>
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 mt-4 widget-content">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-dark">
                                                        <h6>Osan Tama : $ <?= $osan_tama_2 ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-dark">
                                                        <h6>Osan Sai : $ <?= $osan_sai_2 ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content bg-primary">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-white">
                                                        <h6>Diferensia : $ <?= $diferensia_2 ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="tab-pane" id="tab-eg4-2" role="tabpanel">

                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Tinan</th>
                                                <th class="text-center">Osan Tama</th>
                                                <th class="text-center">Osan Sai</th>
                                                <th class="text-center">Diferensia</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $osan_tama_3 = 0;
                                            $osan_sai_3 = 0;
                                            $diferensia_3 = 0;
                                            foreach ($relatorio_anual as $loop) {
                                                echo '<tr>
                                                    <td class="text-center">' . $no++ . '</td>     
                                                    <td class="text-center">' . $loop['tinan'] . '</td>
                                                    <td class="text-center">' . $loop['t_osan_tama'] . '</td>
                                                    <td class="text-center">' . $loop['t_osan_sai'] . '</td>
                                                    <td class="text-center">' . $loop['t_diferensia'] . '</td>
                                                </tr>';
                                                $osan_tama_3 += $loop['t_osan_tama'];
                                                $osan_sai_3 += $loop['t_osan_sai'];
                                                $diferensia_3 += $loop['t_diferensia'];
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-7">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                            <h6>Relatorio Anual:</h6>
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 mt-4 widget-content">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-dark">
                                                        <h6>Osan Tama : $ <?= $osan_tama_3 ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-dark">
                                                        <h6>Osan Sai : $ <?= $osan_sai_3 ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content bg-primary">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-white">
                                                        <h6>Diferensia : $ <?= $diferensia_3 ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="d-block text-right card-footer">
        <a href="javascript:void(0);" class="btn-wide btn btn-success">Save</a>
    </div>
</div>