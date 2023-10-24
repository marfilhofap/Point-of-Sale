<?php
if (isset($_GET['m'])) {

    $id_meza = $_GET['m'];
    $kategoria = $get_table->get_table("kategoria order by kategoria ASC");
    $produtu_sira = $get_table->get_table("produtu order by naran_produtu ASC");
    $pendente = $get_table->get_table_uuid("", "view_order_sira", "id_meza", $id_meza, " and tipu_transaksaun='Pendente' order by naran_produtu");

    foreach ($jestaun_sira as $loop) {
        if ($loop['id_jestaun'] == '650a2e7d-80f0-4f03-bef7-abd0731da275') { 
?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Order ne'ebe mak Pendente
                    <div class="page-title-subheading">
                        <?= 'Produtu nebe order ho total ' . count($pendente) ?>
                    </div>
                </div>
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
                                    <th class="text-center">No</th>
                                    <th>Naran Produtu</th>
                                    <th class="text-center">Folin</th>
                                    <th class="text-center">Kuantidade</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Asaun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $all_total = 0;
                                foreach ($pendente as $loop) {

                                    echo '<tr>
                                        <td class="text-center">' . $no++ . '</td>     
                                        <td>' . $loop['naran_produtu'] . '</td>
                                        <td class="text-center">$ ' . $loop['folin'] . '</td>
                                        <td class="text-center">' . $loop['kuantidade'] . '</td>
                                        <td class="text-center">$ ' . $loop['total'] . '</td>
                                        <td>';

                                    echo '<div class="d-flex justify-content-center flex-shrink-0">
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-toggle="modal" data-target="#alterar_order" data-id_produtu="' . $loop['id_produtu'] . '" data-naran_produtu="' . $loop['naran_produtu'] . '" data-folin="' . $loop['folin'] . '" data-kuantidade="' . $loop['kuantidade'] . '" data-id_transaksaun="' . $loop['id_transaksaun'] . '" data-id_meza="' . $loop['id_meza'] . '">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-toggle="modal" data-target="#kansela_order" data-id_produtu="' . $loop['id_produtu'] . '" data-naran_produtu="' . $loop['naran_produtu'] . '" data-folin="' . $loop['folin'] . '" data-kuantidade="' . $loop['kuantidade'] . '" data-id_transaksaun="' . $loop['id_transaksaun'] . '" data-id_meza="' . $loop['id_meza'] . '">
                                                    <i class="fas fa-ban"></i>
                                                </a>
                                            </div>';

                                    echo '</td>
                                    </tr>';

                                    $all_total += $loop['total'];
                                }

                                if ($no > count($pendente)) {
                                    echo '<tr class="text-success">
                                    <td colspan="4" class="text-center">Total :</td>     
                                    <td class="text-center">$ ' . $all_total . '</td>
                                </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="row justify-content-md-center">
                        <div class="col-xl-3 col-lg-7">
                            <a href="?c=order&m=<?= $id_meza ?>" type="button" class="btn-shadow mr-3 btn btn-danger text-white">
                                <i class="fa fa-backward"></i> Fila
                            </a>
                            <?php if (count($pendente) > 0) { ?>
                                <button type="button" class="btn-shadow mr-3 btn btn-primary text-white" data-toggle="modal" data-target="#konfirma_order" data-folin_total="<?= $all_total ?>" data-id_meza="<?= $id_meza ?>">
                                    Konfirma <i class="fa fa-check"></i>
                                </button>
                            <?php } ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


<?php }
    }
} 
?>

<script>
    $(document).ready(function() {
        $('#alterar_order').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)

            var id_produtu_js = button.data('id_produtu')
            var naran_produtu_js = button.data('naran_produtu')
            var folin_js = button.data('folin')
            var kuantidade = button.data('kuantidade')
            var id_transaksaun = button.data('id_transaksaun')
            var id_meza = button.data('id_meza')
            var modal = $(this)

            modal.find('#id_produtu_js').val(id_produtu_js)
            modal.find('#naran_produtu_js').val(naran_produtu_js)
            modal.find('#folin_js').val(folin_js)
            modal.find('#kuantidade').val(kuantidade)
            modal.find('#id_transaksaun').val(id_transaksaun)
            modal.find('#id_meza').val(id_meza)

        })

        $('#kansela_order').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)

            var id_produtu_js = button.data('id_produtu')
            var naran_produtu_js = button.data('naran_produtu')
            var folin_js = button.data('folin')
            var kuantidade = button.data('kuantidade')
            var id_transaksaun = button.data('id_transaksaun')
            var id_meza = button.data('id_meza')
            var modal = $(this)

            modal.find('#id_produtu_js').val(id_produtu_js)
            modal.find('#naran_produtu_js').val(naran_produtu_js)
            modal.find('#folin_js').val(folin_js)
            modal.find('#kuantidade').val(kuantidade)
            modal.find('#id_transaksaun').val(id_transaksaun)
            modal.find('#id_meza').val(id_meza)

        })

        $('#konfirma_order').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)

            var folin_total = button.data('folin_total')
            var id_meza = button.data('id_meza')
            var modal = $(this)

            modal.find('#folin_total').text(folin_total)
            modal.find('#id_meza').val(id_meza)

        })


    })
</script>