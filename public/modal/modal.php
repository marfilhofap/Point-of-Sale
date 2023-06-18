<?php
$get = isset($_GET['c']) ? $_GET['c'] : "index";

echo '<div class="app-main__inner">';

if ($get == 'produtu_sira') {
?>

    <!-- Modal Aumenta -->
    <div class="modal fade" id="aumenta_produtu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Aumenta Produtu</h5>
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

    <!-- Modal Edit -->
    <div class="modal fade" id="edit_produtu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Produtu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="controller/handler.php" method="POST" class="col p-4 position-static" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="naran_produtu">Kategoria:</label>
                                    <input type="text" class="form-control" id="kategoria_js" disabled>
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
                        <div class="row justify-content-md-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="naran_produtu">Naran:</label>
                                    <input type="text" class="form-control" id="naran_produtu_js" name="naran_produtu">
                                    <input type="hidden" class="form-control" id="id_produtu_js" name="id_produtu">
                                    <input type="hidden" class="form-control" id="id_kategoria_js" name="id_kategoria">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="folin">Folin:</label>
                                    <input type="text" class="form-control" id="folin_js" name="folin">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kansela</button>
                        <button type="submit" class="btn btn-success" name="edit_produtu">Rai</button>
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

    <!-- Modal Order Produtu -->
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
                                    <input type="hidden" class="form-control" name="id_produtu" id="id_produtu_js">
                                    <input type="hidden" class="form-control" name="id_meza" id="id_meza">
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
                                    <input type="hidden" class="form-control" name="id_identidade_pessoal" value="<?= $_SESSION['id_identidade_pessoal'] ?>">
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
if ($get == 'pendente') {
?>

    <!-- Modal Alterar Order -->
    <div class="modal fade" id="alterar_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Order</h5>
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
                                    <input type="hidden" class="form-control" name="id_produtu" id="id_produtu_js">
                                    <input type="hidden" class="form-control" name="id_meza" id="id_meza">
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
                                    <input type="number" class="form-control" name="kuantidade" id="kuantidade">
                                    <input type="hidden" class="form-control" name="id_transaksaun" id="id_transaksaun">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kansela</button>
                        <button type="submit" class="btn btn-success" name="alterar_order">Rai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Alterar Order -->
    <div class="modal fade" id="kansela_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Tebes hakarak kansela Order ida ne'e ?</h5>
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
                                    <input type="hidden" class="form-control" name="id_produtu" id="id_produtu_js">
                                    <input type="hidden" class="form-control" name="id_meza" id="id_meza">
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
                                    <input type="number" readonly class="form-control" name="kuantidade" id="kuantidade">
                                    <input type="hidden" class="form-control" name="id_transaksaun" id="id_transaksaun">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kansela</button>
                        <button type="submit" class="btn btn-danger" name="kansela_order">Rai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmar Order -->
    <div class="modal fade" id="konfirma_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Konfirma Transasaun !</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="controller/handler.php" method="POST" class="col p-4 position-static" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p>
                                        Ita nia Transasaun ho Total $ <b id="folin_total"></b>
                                    </p>
                                    <input type="hidden" class="form-control" name="id_meza" id="id_meza">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kansela</button>
                        <button type="submit" class="btn btn-primary" name="konfirma_order">Rai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php }
if ($get == 'transasaun_sira') {
?>

    <!-- Modal Konfirma Tipu Transasaun Konsumu -->
    <div class="modal fade" id="konfirma_konsumu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Konfirma Transasaun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="controller/handler.php" method="POST" class="col p-4 position-static" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- <label for="naran_produtu">Naran Produtu:</label>
                                    <input type="text" class="form-control" id="naran_produtu_js" name="naran_produtu" readonly>
                                    <input type="hidden" class="form-control" name="id_produtu" id="id_produtu_js"> -->
                                    <input type="hidden" class="form-control" name="id_meza" id="id_meza">
                                    <p>
                                        Selu transaksaun Meza <b id="nu_meza"></b> ne'ebe Konsumu ona?
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Lae</button>
                        <button type="submit" class="btn btn-success" name="selu_transasaun">Sim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Konfirma Tipu Transasaun Prosesa -->
    <div class="modal fade" id="konfirma_prosesa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Konfirma Transasaun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="controller/handler.php" method="POST" class="col p-4 position-static" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- <label for="naran_produtu">Naran Produtu:</label>
                                    <input type="text" class="form-control" id="naran_produtu_js" name="naran_produtu" readonly>
                                    <input type="hidden" class="form-control" name="id_produtu" id="id_produtu_js">-->
                                    <input type="hidden" class="form-control" name="id_meza" id="id_meza">
                                    <p>
                                        Meza <b id="nu_meza"></b> ho Tipu Transasaun Prosesa, Atu muda ba Konsumu ?
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Lae</button>
                        <button type="submit" class="btn btn-success" name="konfirma_prosesa">Sim</button>
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
                                    <label for="id_membru">ID Membru:</label>
                                    <input type="text" readonly class="form-control" id="id_membru" name="id_membru" value="<?= $_SESSION['id_membru'] ?>">
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
if ($get == 'relatorio_jeral') {
?>

    <!-- Modal Order Produtu -->
    <div class="modal fade" id="aumenta_gastu_kada_loron" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Gastu Diariu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="controller/handler.php" method="POST" class="col p-4 position-static" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="naran_produtu">Osan sai: </label>
                                    <input type="text" class="form-control" id="osan_sai_js" name="osan_sai">
                                    <input type="hidden" class="form-control" name="id_identidade_pessoal" value="<?= $_SESSION['id_identidade_pessoal']?>">
                                    <!-- <input type="hidden" class="form-control" name="id_meza" id="id_meza"> -->
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="folin">Data:</label>
                                    <input type="text" class="form-control" id="data_js" name="data" readonly>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kansela</button>
                        <button type="submit" class="btn btn-success" name="aumenta_gastu_kada_loron">Rai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php }



echo '</div>';
?>