<?php
foreach ($jestaun_sira as $loop) {
    if ($loop['id_jestaun'] == 'ad77e562-1004-4287-9f21-160829e7c621') {

        $mes = 0;
        $ano = 0;
        $relatorio_diario = '';

        if (isset($_GET['mes']) && isset($_GET['ano'])) {
            $mes = $_GET['mes'];
            $ano = $_GET['ano'];
            $relatorio_diario = $get_table->get_table("view_relatorio_diario where EXTRACT(month FROM data) = $mes AND EXTRACT(year FROM data) = $ano order by data DESC");
        } else {
            $relatorio_diario = $get_table->get_table("view_relatorio_diario where EXTRACT(month FROM data) = EXTRACT(month FROM CURRENT_DATE) AND EXTRACT(year FROM data) = EXTRACT(year FROM CURRENT_DATE) order by data DESC");
        }

        include('relatorio_header.php');
?>


        <div class="main-card mb-3 card">
            <div class="card-header"><i class="header-icon lnr-gift icon-gradient bg-grow-early"> </i>
                <a href="?c=relatorio_jeral">
                    Relatorio Jeral
                </a>
                &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
                <a href="?c=relatorio_mensal_por_ano&ano=<?= $ano ?>">
                    <?= $ano ?>
                </a>
                &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
                <?= $get_table->Mes($mes); ?>
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
                                                    <th class="text-center">Data</th>
                                                    <th class="text-center">Osan Tama</th>
                                                    <th class="text-center">Osan Sai</th>
                                                    <th class="text-center">Lukru</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $osan_tama = 0;
                                                $osan_sai = 0;
                                                $diferensia = 0;
                                                foreach ($relatorio_diario as $loop) {
                                                    echo '
                                                        <tr>
                                                            <td class="text-center">' . $no++ . '</td>     
                                                            <td class="text-center">' . $loop['data'] . '</td>
                                                            <td class="text-center">$ ' . $loop['osan_tama'] . '</td>
                                                            <td class="text-center">
                                                                <a href="#" class="text-decoration-none" data-toggle="modal" data-target="#aumenta_gastu_kada_loron_2" data-data_js="' . $loop['data'] . '" data-osan_sai_js="' . $loop['osan_sai'] . '">
                                                                    $ ' . $loop['osan_sai'] . '
                                                                </a>
                                                            </td>
                                                            <td class="text-center">$ ' . $loop['diferensia'] . '</td>
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
                                                            <h6>Lukru : $ <?= $diferensia ?></h6>
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

                                <?php include('grafiku/g_relatorio_diaria_por_mensal.php'); ?>

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

<script>
    $(document).ready(function() {
        $('#aumenta_gastu_kada_loron_2').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)

            var data_js = button.data('data_js')
            var osan_sai_js = button.data('osan_sai_js')
            var modal = $(this)

            modal.find('#data_js').val(data_js)
            modal.find('#osan_sai_js').val(osan_sai_js)

        })
    })
</script>