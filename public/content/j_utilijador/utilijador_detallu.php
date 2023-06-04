<?php
$id_utilijador = $_GET['id'];
$nivel_asesu = $get_table->get_table_uuid("", "view_nivel_asesu_utilijador", "id_utilijador", $id_utilijador, "order by jestaun ASC");
$utilijador = $get_table->get_table_uuid("", "view_utilijador", "id_utilijador", $id_utilijador, " and estadu='Ativu'");

if (count($utilijador) > 0) {

?>

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-user icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Nivel Asesu
                    <div class="page-title-subheading">
                        <?= ($utilijador[0]['naran_kompletu'] . ' - ' . $utilijador[0]['pozisaun']) ?>
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-primary">
                    Aumenta <i class="fa fa-plus"></i>
                </button>
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
                                    <th>Jestaun</th>
                                    <th>Create</th>
                                    <th>Read</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                    <th>Asaun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($nivel_asesu as $loop) {
                                    echo '<tr>
                                        <td>' . $no++ . '</td>     
                                        <td>' .  $loop['jestaun'] . '</td>
                                        <td>' . ($loop['create'] == true ? 'Sim' : 'Lae') . '</td>
                                        <td>' . ($loop['read'] == true ? 'Sim' : 'Lae') . '</td>
                                        <td>' . ($loop['update'] == true ? 'Sim' : 'Lae') . '</td>
                                        <td>' . ($loop['delete'] == true ? 'Sim' : 'Lae') . '</td>
                                        <td>
                                            <div class="d-flex justify-content-center flex-shrink-0">
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary" target="_blank">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-toggle="modal" data-target="#hamos_identidade" data-id_nivel_asesu="' . $loop['id_nivel_asesu'] . '" data-jestaun="' . $loop['jestaun'] . '">
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

                </div>

            </div>
        </div>
    </div>


    <!-- Modal Aumenta -->
    <div class="modal fade" id="aumenta_identidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-success">
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

<?php
}
?>

<!-- Modal Hamos -->
<div class="modal fade" id="hamos_identidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-success">
                <h5 class="modal-title text-white" id="exampleModalLabel">Hamos Area Materia</h5>
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

<script>
    $(document).ready(function() {
        $('#hamos_identidade').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_identidade_pessoal = button.data('id_identidade_pessoal')
            var naran_kompletu = button.data('naran_kompletu')
            var modal = $(this)
            modal.find('#id_identidade_pessoal').val(id_identidade_pessoal)
            modal.find('#naran').text(naran_kompletu)

        })
    })
</script>