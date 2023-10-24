<?php
foreach ($jestaun_sira as $loop) {
    if ($loop['id_jestaun'] == 'ad77e562-1004-4287-9f21-160829e7c621') {

        $ano = 0;
        $relatorio_mensal = '';

        if (isset($_GET['ano'])) {
            $ano = $_GET['ano'];
            $relatorio_mensal = $get_table->get_table("view_relatorio_mensal WHERE tinan = $ano order by fulan DESC");
        } else {
            $relatorio_mensal = $get_table->get_table("view_relatorio_mensal WHERE tinan = EXTRACT(year FROM CURRENT_DATE) order by fulan DESC");
        }

        include('relatorio_header.php');
?>

        <div class="main-card mb-3 card">
            <div class="card-header"><i class="header-icon lnr-gift icon-gradient bg-grow-early"> </i>
                <a href="?c=relatorio_jeral">
                    Relatorio Jeral
                </a>
                &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
                <?= $ano ?>

            </div>
            <div class="card-body">
                <div class="tab-content">


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
                                                    <th class="text-center">Lukru</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $osan_tama_2 = 0;
                                                $osan_sai_2 = 0;
                                                $diferensia_2 = 0;
                                                foreach ($relatorio_mensal as $loop) {
                                                    $ano = $loop['tinan'];
                                                    $mes = $loop['fulan'];
                                                    echo '<tr>
                                                    <td class="text-center">' . $no++ . '</td>     
                                                    <td class="text-center">';
                                                    echo '<a href="?c=relatorio_diaria_por_mensal&mes=' . $mes . '&ano=' . $ano . '" class="text-decoration-none">';
                                                    echo $get_table->Mes($loop['fulan']);
                                                    echo '</a>';
                                                    echo '</td>
                                                    <td class="text-center">$ ' . $loop['osan_tama'] . '</td>
                                                    <td class="text-center">$ ' . $loop['osan_sai'] . '</td>
                                                    <td class="text-center">$ ' . $loop['diferensia'] . '</td>
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
                                                            <h6>Lukru : $ <?= $diferensia_2 ?></h6>
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

                    <div class="row">
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-body">

                                <?php include('grafiku/g_relatorio_mensal_por_ano.php'); ?>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

<?php }
}
?>