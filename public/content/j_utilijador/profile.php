<?php
$profile = $get_table->get_table_uuid("", "view_identidade_pessoal", "id_membru", $_SESSION['id_membru'], "");
?>


<h3 class="text-center">Profile Utilijador</h3>

<section>
    <div class="rt-container">
        <div class="col-rt-12">
            <div class="Scriptcontent">
                <?php
                foreach ($profile as $loop) {
                ?>
                    <!-- Profile -->
                    <div class="container py-4">
                        <div class="row">

                            <div class="col-lg-8">
                                <div class="card shadow-sm">
                                    <div class="card-header bg-transparent border-0">
                                        <h5 class="mb-0">Informasaun Pessoal</h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <table class="table">
                                            <tr>
                                                <th width="30%">Naran Kompletu</th>
                                                <td width="2%">:</td>
                                                <td><?= $loop['naran_kompletu'] ?></td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Sexu</th>
                                                <td width="2%">:</td>
                                                <td><?= $loop['sexo'] == 'M' ? 'Mane' : 'Feto' ?></td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Data Moris</th>
                                                <td width="2%">:</td>
                                                <td><?= $loop['data_moris'] ?></td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Nu. Telemovel</th>
                                                <td width="2%">:</td>
                                                <td><?= $loop['nu_telemovel'] ?></td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Email</th>
                                                <td width="2%">:</td>
                                                <td><?= $loop['email'] ?></td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Pozisaun</th>
                                                <td width="2%">:</td>
                                                <td><?= $loop['pozisaun'] ?></td>
                                            </tr>
                                        </table>
                                        <div class="row justify-content-center">
                                            <button type="button" class="btn-shadow mr-3 btn btn-danger text-white" data-toggle="modal" data-target="#edit_profile" data-id_identidade_pessoal="<?= $loop['id_identidade_pessoal'] ?>" data-naran_kompletu="<?= $loop['naran_kompletu'] ?>" data-sexo="<?= $loop['sexo'] ?>" data-data_moris="<?= $loop['data_moris'] ?>" data-email="<?= $loop['email'] ?>" data-nu_telemovel="<?= $loop['nu_telemovel'] ?>">
                                                <i class="fa fa-pen"></i> Alterar
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card shadow-sm">
                                    <div class="card-header bg-transparent border-0">
                                        <h5 class="mb-0">Utilijador</h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <table class="table">
                                            <tr>
                                                <th width="50%">ID Membru</th>
                                                <td width="2%">:</td>
                                                <td><?= $loop['id_membru'] ?></td>
                                            </tr>
                                            <tr>
                                                <th width="50%">Password</th>
                                                <td width="2%">:</td>
                                                <td>********</td>
                                            </tr>
                                            <tr>

                                                <?php
                                                if (isset($_GET['r'])) {
                                                    $r = $_GET['r'];
                                                    if ($r == 1) {
                                                        echo '<th width="100%" colspan="3" class="text-success">Parabens, Password troka ho Susesu !</th>';
                                                    } else if ($r == 2) {
                                                        echo '<th width="100%" colspan="3" class="text-danger">Deskulpa, Password atual la los !</th>';
                                                    } else if ($r == 3) {
                                                        echo '<th width="100%" colspan="3" class="text-danger">Deskulpa, konfirmasaun password lalos !</th>';
                                                    }
                                                }
                                                ?>
                                                </th>
                                            </tr>
                                        </table>
                                        <div class="row justify-content-center">
                                            <button type="button" class="btn-shadow mr-3 btn btn-danger text-white" data-toggle="modal" data-target="#troka_password">
                                                <i class="fa fa-pen"></i> Alterar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#edit_profile').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)

            var id_identidade_pessoal = button.data('id_identidade_pessoal')
            var naran_kompletu = button.data('naran_kompletu')
            var sexo = button.data('sexo')
            var data_moris = button.data('data_moris')
            var email = button.data('email')
            var nu_telemovel = button.data('nu_telemovel')
            var modal = $(this)

            modal.find('#id_identidade_pessoal').val(id_identidade_pessoal)
            modal.find('#naran_kompletu').val(naran_kompletu)
            modal.find('#sexo').val(sexo)
            modal.find('#data_moris').val(data_moris)
            modal.find('#email').val(email)
            modal.find('#nu_telemovel').val(nu_telemovel)

        })
    })
</script>