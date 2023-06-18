<?php
$nu_meza = $_GET['nu_meza'];
$data = $_GET['data'];
$oras = $_GET['oras'];
$formatu_oras = new DateTime($oras);
$oras_lolos = $formatu_oras->format('H:i');

$detallu = $get_table->get_table_uuid("", "relatorio", "nu_meza", $nu_meza, " and data = '$data' and oras_selu = '$oras' order by oras_tama ASC");
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-print icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Detallu Resibu Meza <?= $nu_meza ?>
                <div class="page-title-subheading">
                    <? //= $nu_meza.' - '.$data.' - '.$oras 
                    ?>
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <a href="../public/content/relatorio/tcpdf/pdf_resibu.php?nu_meza=<?=$nu_meza?>&data=<?=$data?>&oras=<?=$oras?>" target="_blank">
                <button type="button" data-toggle="tooltip" title="Imprimi Resibu" data-placement="bottom" class="btn-shadow mr-3 btn btn-primary">
                    Imprimi <i class="fa fa-print"></i>
                </button>
            </a>

        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Oras : <?= $oras_lolos ?></h6>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Produtu</th>
                                <th class="text-center">Folin</th>
                                <th class="text-center">Kuantidade</th>
                                <th class="text-center">Total Folin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $kuantidade_total = 0;
                            $folin_total = 0;
                            foreach ($detallu as $loop) {

                                echo '<tr>
                                        <td class="text-center">' . $no++ . '</td>     
                                        <td class="text-center">' . $loop['naran_produtu'] . '</td>
                                        <td class="text-center">' . $loop['folin'] . '</td>
                                        <td class="text-center">' . $loop['kuantidade'] . '</td>
                                        <td class="text-center">$ ' . $loop['total'] . '</td>
                                    </tr>';
                                $kuantidade_total += $loop['kuantidade'];
                                $folin_total += $loop['total'];
                            }

                            if ($no > count($detallu)) {
                                echo '<tr class="text-success">
                                <td colspan="3" class="text-center">TOTAL :</td>  
                                <td class="text-center">' . $kuantidade_total . '</td>   
                                <td class="text-center">$ ' . $folin_total . '</td>
                            </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="row justify-content-md-center">
                    <div class="col-xl-2 col-lg-7">
                        <a href="?c=resibu" type="button" class="btn-shadow mr-3 btn btn-success text-white">
                            <i class="fa fa-backward"></i> Fila
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>