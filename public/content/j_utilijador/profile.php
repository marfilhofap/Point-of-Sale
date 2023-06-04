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
                                                <td><?= $loop['sexo'] = 'M' ? 'Mane' : 'Feto' ?></td>
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
                                            <button type="button" class="btn-shadow mr-3 btn btn-danger text-white" data-toggle="modal" data-target="#troka_identifikasaun">
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