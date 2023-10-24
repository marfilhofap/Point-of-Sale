<?php
$transasaun_sira = $get_table->get_table("view_meza_ujadu order by tipu_transaksaun DESC");

foreach ($jestaun_sira as $loop) {
    if ($loop['id_jestaun'] == 'e607497b-e6c7-4d2b-9478-48558f043a0e') {
?>

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-shopbag icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Transasaun sira ne'ebe lao hela
                        <div class="page-title-subheading">
                            <?= 'Total Meza ' . count($transasaun_sira) . ' nebe uja hela' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <?php
                            if (count($transasaun_sira) > 0) {
                                foreach ($transasaun_sira as $loop) {
                                    $tipu_transaksaun = $loop['tipu_transaksaun'];
                                    $hahan = $get_table->get_table_uuid("", "view_order_sira", "id_meza", $loop['id_meza'], " and tipu_transaksaun = '$tipu_transaksaun' and data = CURRENT_DATE order by naran_produtu ASC");

                                    if ($loop['tipu_transaksaun'] == 'Konsumu') {
                                        echo '<div class="col-xl-3 col-lg-7" data-toggle="modal" data-target="#konfirma_konsumu" data-id_meza="' . $loop['id_meza'] . '" data-nu_meza="' . $loop['nu_meza'] . '" data-tipu_transaksaun="' . $tipu_transaksaun . '">
                                <a href="#" class="text-decoration-none"> <div class="card card-houver shadow mb-4"> <div class="card-header py-3"> 
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Meza ' . $loop['nu_meza'] . ' - ' . $loop['tipu_transaksaun'] . '
                                    </h6>
                                </div>
                                <div class="card-body">';
                                        $no = 1;
                                        foreach ($hahan as $loops) {
                                            echo $no++ . '. ' . $loops['naran_produtu'] . ' : ' . $loops['kuantidade'] . '<br>';
                                        }
                                    } elseif ($loop['tipu_transaksaun'] == 'Prosesa') {

                                        echo '<div class="col-xl-3 col-lg-7" data-toggle="modal" data-target="#konfirma_prosesa" data-id_meza="' . $loop['id_meza'] . '" data-nu_meza="' . $loop['nu_meza'] . '" data-tipu_transaksaun="' . $tipu_transaksaun . '">
                                <a href="#" class="text-decoration-none"> <div class="card card-houver shadow mb-4"> <div class="card-header py-3"> 
                                    <h6 class="m-0 font-weight-bold text-warning">
                                        Meza ' . $loop['nu_meza'] . ' - ' . $loop['tipu_transaksaun'] . '
                                    </h6>
                                </div>
                                <div class="card-body">';
                                        $no = 1;
                                        foreach ($hahan as $loops) {
                                            echo $no++ . '. ' . $loops['naran_produtu'] . ' : ' . $loops['kuantidade'] . '<br>';
                                        }
                                    }

                                    echo '</div>
                                </div>
                                </a>
                    </div>';
                                }
                            } else {
                                echo '<div class="col-xl-12">
                            <div class="alert alert-danger">
                                <strong>Deskulpa!</strong> Laiha Transasaun ruma nebe agora dadaun lao hela.
                            </div>
                        </div>';
                            }
                            ?>
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
        $('#konfirma_konsumu').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)

            var id_meza = button.data('id_meza')
            var nu_meza = button.data('nu_meza')
            var tipu_transaksaun = button.data('tipu_transaksaun')
            var modal = $(this)

            modal.find('#id_meza').val(id_meza)
            modal.find('#nu_meza').text(nu_meza)
            modal.find('#t_tipu_transaksaun').text(tipu_transaksaun)
            modal.find('#tipu_transaksaun').val(tipu_transaksaun)

        })

        $('#konfirma_prosesa').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)

            var id_meza = button.data('id_meza')
            var nu_meza = button.data('nu_meza')
            var tipu_transaksaun = button.data('tipu_transaksaun')
            var modal = $(this)

            modal.find('#id_meza').val(id_meza)
            modal.find('#nu_meza').text(nu_meza)
            modal.find('#t_tipu_transaksaun').text(tipu_transaksaun)
            modal.find('#tipu_transaksaun').val(tipu_transaksaun)

        })
    })

    function autoRefresh(){
        location.reload();
    }
    setInterval(autoRefresh, 5000)
</script>