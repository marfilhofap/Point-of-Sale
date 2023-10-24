<?php
$meza_mamuk = $get_table->get_table("view_meza_mamuk");

foreach ($jestaun_sira as $loop) {
    if ($loop['id_jestaun'] == 'e607497b-e6c7-4d2b-9478-48558f043a0e') {
?>

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-coffee icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Meza ne'ebe Mamuk hela
                <div class="page-title-subheading">
                    <?= 'Total Meza ' . count($meza_mamuk) . ' nebe Mamuk hela' ?>
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <button type="button" class="btn-shadow mr-3 btn btn-primary" data-toggle="modal" data-target="#aumenta_meza">
                Aumenta <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-body">

                <?php if (count($meza_mamuk) > 0) { ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">Numeru Meza</th>
                                    <th class="text-center">Asaun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($meza_mamuk as $loop) {
                                    echo '<tr>
                                        <td class="text-center">' . $loop['nu_meza'] . '</td>
                                        <td>
                                            <div class="d-flex justify-content-center flex-shrink-0">
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-toggle="modal" data-target="#edit_meza" data-id_meza="' . $loop['id_meza'] . '" data-nu_meza="' . $loop['nu_meza'] . '">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-toggle="modal" data-target="#delete_meza" data-id_meza="' . $loop['id_meza'] . '" data-nu_meza="' . $loop['nu_meza'] . '">
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
                <?php } else{
                    echo '<div class="alert alert-success">
                            Laiha Meza ruma nebe mak Avaliable agora dadaun !
                        </div>';
                } ?>

            </div>

        </div>
    </div>
</div>

<?php } 
    }
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#delete_meza').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_meza = button.data('id_meza')
            var nu_meza = button.data('nu_meza')

            var modal = $(this)
            modal.find('#id_meza').val(id_meza)
            modal.find('#nu_meza').text(nu_meza)

        })

        $('#edit_meza').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_meza = button.data('id_meza')
            var nu_meza = button.data('nu_meza')

            var modal = $(this)
            modal.find('#id_meza').val(id_meza)
            modal.find('#nu_meza').val(nu_meza)

        })
    })
</script>