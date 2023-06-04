<?php
$get = isset($_GET['c']) ? $_GET['c'] : "index";

echo '<div class="app-main__inner">';

if ($get == 'produtu_sira') {
?>

    <!-- Modal Aumenta -->
    <div class="modal fade" id="aumenta_kategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Aumenta Kategoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="controller/handler.php" method="POST" class="col p-4 position-static" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="naran_produtu">Naran:</label>
                                    <input type="text" class="form-control" id="naran_produtu" name="naran_produtu" placeholder="- Hatama Naran Produtu -">
                                    <input type="hidden" class="form-control" name="id" placeholder="- Hatama Naran Produtu -" value="<?= $_GET['id'] ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="folin">Folin:</label>
                                    <input type="text" class="form-control" id="folin" name="folin" placeholder="- Hatama Folin -">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="hidden" name="action" value="haruka" />
                                    <label for="file" class="form-label required text-active-danger">Imajem</label>
                                    <input class="form-control" type="file" id="file" name="file">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kansela</button>
                        <button type="submit" class="btn btn-success" name="aumenta_produtu">Rai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php }
if ($get == 'membru') {
?>
    <!-- Modal Aumenta -->
    <div class="modal fade" id="aumenta_identidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Aumenta Area Materia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="controller/handler.php" method="POST" class="col p-4 position-static" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="naran_kompletu">Naran Kompletu:</label>
                                    <input type="text" class="form-control" id="naran_kompletu" name="naran_kompletu" placeholder="- Naran Kompletu -">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="sexo">Sexo:</label>
                                    <select class="form-control" id="sexo" name="sexo">
                                        <option selected hidden>- Sexo -</option>
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="id_pozisaun">Pozisaun:</label>
                                    <select class="form-control" id="id_pozisaun" name="id_pozisaun">
                                        <?php
                                        $pozisaun = $get_table->get_table("pozisaun");
                                        echo '<option selected hidden>- Pozisaun -</option>';
                                        foreach ($pozisaun as $loop) {
                                            echo '<option value="' . $loop['id_pozisaun'] . '">' . $loop['pozisaun'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center mt-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data_moris">Data Moris:</label>
                                    <input type="date" class="form-control" id="data_moris" name="data_moris" placeholder="- Data Moris -">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="lovestory@gmail.com">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nu_telemovel">Nu.Telf:</label>
                                    <input type="text" class="form-control" id="nu_telemovel" name="nu_telemovel" placeholder="(+670) 78123123">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kansela</button>
                        <button type="submit" class="btn btn-success" name="aumenta_identidade">Rai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Hamos -->
    <div class="modal fade" id="hamos_identidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Hamos Membru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="controller/handler.php" method="POST" class="col p-4 position-static" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-12">
                                <input type="hidden" id="id_identidade_pessoal" name="id_identidade_pessoal">
                                <p>Tebes hakarak hamos <b id="naran"></b> ?</p>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kansela</button>
                                <button type="submit" class="btn btn-danger" name="hamos_identidade">Sim</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Ativu Utilijador -->
    <div class="modal fade" id="ativu_utilijador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Ativu Utilijador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="controller/handler.php" method="POST" class="col p-4 position-static" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-12">
                                <input type="hidden" id="a_id_identidade_pessoal" name="id_identidade_pessoal" value="<>">
                                <p>Tebes hakarak ativu Utilijador <b id="a_naran"></b> ?</p>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kansela</button>
                                <button type="submit" class="btn btn-danger" name="ativu_utilijador">Sim</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Dejativu Utilijador -->
    <div class="modal fade" id="dejativu_utilijador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Dejativu Utilijador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="controller/handler.php" method="POST" class="col p-4 position-static" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-12">
                                <input type="hidden" id="d_id_identidade_pessoal" name="id_identidade_pessoal">
                                <p>Tebes hakarak Dejativu Utilijador <b id="d_naran"></b> ?</p>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kansela</button>
                                <button type="submit" class="btn btn-danger" name="dejativu_utilijador">Sim</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php }
if ($get == 'order') {
?>

    <!-- Modal Aumenta -->
    <div class="modal fade" id="order_produtu_js" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="controller/handler.php" method="POST" class="col p-4 position-static" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="naran_produtu">Naran Produtu:</label>
                                    <input type="text" class="form-control" id="naran_produtu_js" name="naran_produtu" readonly>
                                    <input type="hidden" class="form-control" name="id_produtu_js" id="id_produtu_js">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="folin">Folin:</label>
                                    <input type="text" class="form-control" id="folin_js" name="folin" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sexo">Kuantidade:</label>
                                    <input type="number" class="form-control" name="kuantidade">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kansela</button>
                        <button type="submit" class="btn btn-success" name="order_produtu">Rai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php }
if ($get == 'profile') {
?>
    <!-- Edit My Profil -->
    <div class="modal fade" id="troka_identifikasaun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tebes hakarak sai?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="controller/handler.php" method="POST" class="col p-4 position-static" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="naran_kompletu">Naran Kompletu:</label>
                                    <input type="text" class="form-control" id="naran_kompletu" name="naran_kompletu" placeholder="- Naran Kompletu -">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="sexo">Sexo:</label>
                                    <select class="form-control" id="sexo" name="sexo">
                                        <option selected hidden>- Sexo -</option>
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="id_pozisaun">Pozisaun:</label>
                                    <select class="form-control" id="id_pozisaun" name="id_pozisaun">
                                        <?php
                                        $pozisaun = $get_table->get_table("pozisaun");
                                        echo '<option selected hidden>- Pozisaun -</option>';
                                        foreach ($pozisaun as $loop) {
                                            echo '<option value="' . $loop['id_pozisaun'] . '">' . $loop['pozisaun'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center mt-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data_moris">Data Moris:</label>
                                    <input type="date" class="form-control" id="data_moris" name="data_moris" placeholder="- Data Moris -">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="lovestory@gmail.com">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nu_telemovel">Nu.Telf:</label>
                                    <input type="text" class="form-control" id="nu_telemovel" name="nu_telemovel" placeholder="(+670) 78123123">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kansela</button>
                        <button type="submit" class="btn btn-success" name="aumenta_identidade">Rai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Password -->
    <div class="modal fade" id="troka_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tebes hakarak sai?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="controller/handler.php" method="POST" class="col p-4 position-static" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-md-center mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data_moris">ID Membru:</label>
                                    <input type="text" readonly class="form-control" id="data_moris" name="data_moris" placeholder="<?= $_SESSION['id_membru']?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_atual">Password Atual:</label>
                                    <input type="password" class="form-control" id="password_atual" name="password_atual">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_foun">Password Foun:</label>
                                    <input type="password" class="form-control" id="password_foun" name="password_foun">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="konf_password">Konfirmasaun Password Foun:</label>
                                    <input type="password" class="form-control" id="konf_password" name="konf_password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kansela</button>
                        <button type="submit" class="btn btn-success" name="troka_password">Rai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php }



echo '</div>';
?>