<?php
$resibu = $get_table->get_table_uuid("", "resibu", "data", date('Y-m-d'), " order by oras_selu DESC");

foreach ($jestaun_sira as $loop) {
    if ($loop['id_jestaun'] == 'ad77e562-1004-4287-9f21-160829e7c621') {
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-print icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Resibu
                <div class="page-title-subheading">
                    <?= 'Resibu ohin loron nian' ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tabela Resibu ba Transasaun durante ohin loron nian</h6>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Meza</th>
                                <th class="text-center">Oras</th>
                                <th class="text-center">Total Folin</th>
                                <th class="text-center">Asaun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($resibu as $loop) {
 
                                $oras = $loop['oras_selu'];
                                $formatu_oras = new DateTime($oras);
                                $oras_selu = $formatu_oras->format('H:i');

                                echo '<tr>
                                        <td class="text-center">' . $no++ . '</td>     
                                        <td class="text-center">' . $loop['nu_meza'] . '</td>
                                        <td class="text-center">' . $oras_selu . '</td>
                                        <td class="text-center">$ ' . $loop['total_hotu'] . '</td>
                                        <td>';
                                echo '<div class="d-flex justify-content-center flex-shrink-0">
                                        <a href="?c=detallu&nu_meza=' . $loop['nu_meza'] . '&data=' . $loop['data'] . '&oras=' . $loop['oras_selu'] . '" class="btn btn-sm btn-light btn-active-primary" >
                                            <i class="fas fa-info"></i>
                                        </a>';
                                // echo '<div class="d-flex justify-content-center flex-shrink-0">
                                //         <a href="../public/content/relatorio/tcpdf/pdf_resibu.php?nu_meza='.$loop['nu_meza'].'&data='.$loop['data'].'&oras='.$loop['oras_selu'].'" target="_blank" class="btn btn-sm btn-light btn-active-primary" >
                                //             <i class="fas fa-print"></i>
                                //         </a>';
                                echo '</td>
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

<?php } 
    }
?>