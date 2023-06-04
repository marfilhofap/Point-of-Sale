<?php
$identificacao = $get_table->get_table("view_identidade_pessoal order by id_membru ASC");
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-user icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Relatorio Jeral
                <div class="page-title-subheading">
                    Relatorio bele hare tuir Diario, Semanal no Anual
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
                                <th>No</th>
                                <th>Naran Kompletu</th>
                                <th>ID Membru</th>
                                <th>Telf</th>
                                <th>Email</th>
                                <th>Pozisaun</th>
                                <th>Asaun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($identificacao as $loop) {
                                $utilizador = $get_table->get_table_uuid("", "view_utilijador", "id_identidade_pessoal", $loop['id_identidade_pessoal'], " and estadu='Ativu'");

                                echo '<tr>
                                        <td>' . $no++ . '</td>     
                                        <td>' . $loop['naran_kompletu'] . '</td>
                                        <td>' . $loop['id_membru'] . '</td>
                                        <td>' . (!empty($loop['nu_telemovel']) ? $loop['nu_telemovel'] : '-') . '</td>
                                        <td>' . (!empty($loop['email']) ? $loop['email'] : '-') . '</td>
                                        <td>' . $loop['pozisaun'] . '</td>
                                        <td>
                                            <div class="d-flex justify-content-center flex-shrink-0">
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary" target="_blank">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-toggle="modal" data-target="#hamos_identidade" data-id_identidade_pessoal="' . $loop['id_identidade_pessoal'] . '" data-naran_kompletu="' . $loop['naran_kompletu'] . '">
                                                    <i class="fas fa-trash"></i>
                                                </a>';
                                if (count($utilizador) == 0) {
                                    echo '<a href="#" class="btn btn-sm btn-light btn-active-primary" data-toggle="modal" data-target="#ativu_utilijador" data-id_identidade_pessoal="' . $loop['id_identidade_pessoal'] . '" data-naran_kompletu="' . $loop['naran_kompletu'] . '">
                                                <i class="fas fa-user-plus"></i>
                                            </a>';
                                } else {
                                    echo '<a href="#" class="btn btn-sm btn-light btn-active-primary" data-toggle="modal" data-target="#dejativu_utilijador" data-id_identidade_pessoal="' . $loop['id_identidade_pessoal'] . '" data-naran_kompletu="' . $loop['naran_kompletu'] . '">
                                                <i class="fas fa-user-minus"></i>
                                            </a>';
                                }
                                '</div>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#hamos_identidade').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_identidade_pessoal = button.data('id_identidade_pessoal')
            var naran_kompletu = button.data('naran_kompletu')

            var modal = $(this)
            modal.find('#id_identidade_pessoal').val(id_identidade_pessoal)
            modal.find('#naran').text(naran_kompletu)

        })

        $('#ativu_utilijador').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var a_id_identidade_pessoal = button.data('id_identidade_pessoal')
            var a_naran = button.data('naran_kompletu')
            var modal = $(this)
            modal.find('#a_id_identidade_pessoal').val(a_id_identidade_pessoal)
            modal.find('#a_naran').text(a_naran)

        })

        $('#dejativu_utilijador').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var d_id_identidade_pessoal = button.data('id_identidade_pessoal')
            var d_naran = button.data('naran_kompletu')
            var modal = $(this)
            modal.find('#d_id_identidade_pessoal').val(d_id_identidade_pessoal)
            modal.find('#d_naran').text(d_naran)

        })
    })
</script>