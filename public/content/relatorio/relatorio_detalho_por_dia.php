<?php
foreach ($jestaun_sira as $loop) {
    if ($loop['id_jestaun'] == 'ad77e562-1004-4287-9f21-160829e7c621') {

        $mes = 0;
        $ano = 0;
        $relatorio_detalho = '';

        if (isset($_GET['mes']) && isset($_GET['ano'])) {
            $mes = $_GET['mes'];
            $ano = $_GET['ano'];
            $relatorio_detalho = $get_table->get_table("resibu where data='2023-06-18' order by oras_selu ASC");
        } else {
            $relatorio_detalho = $get_table->get_table("resibu where data=now()::date");
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
                <a href="?c=relatorio_mensal_por_ano&mes=ano<?= $mes ?>=<?= $ano ?>">
                    <?= $get_table->Mes($mes); ?>
                </a>
                &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
                <?= 'dia' ?>
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
                                                    <th class="text-center">Oras</th>
                                                    <th class="text-center">Nu Meza</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $osan_tama = 0;
                                                $osan_sai = 0;
                                                $diferensia = 0;
                                                foreach ($relatorio_detalho as $loop) {
                                                    $h = $loop['oras_selu'];
                                                    $horas = substr($h, 0, 5);
                                                    echo '
                                                        <tr>  
                                                            <td class="text-center">' . $horas . '</td>
                                                            <td class="text-center">' . $loop['nu_meza'] . '</td>
                                                            <td class="text-center">$ ' . $loop['total_hotu'] . '</td>
                                                        </tr>';
                                                    // $osan_tama += $loop['osan_tama'];
                                                    // $osan_sai += $loop['osan_sai'];
                                                    // $diferensia += $loop['diferensia'];
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>

                        

                    </div>

                    <!-- <div class="row">
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-body">

                                <?php //include('grafiku/g_relatorio_diaria_por_mensal.php'); ?>

                                </div>

                            </div>
                        </div>
                    </div> -->

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