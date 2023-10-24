<?php
$id = $_GET['id'];
$produtu = $get_table->get_table_uuid("", "view_produtu_sira", "id_kategoria", $id, " order by naran_produtu ASC");
$kategoria = $get_table->get_table_uuid("", "kategoria", "id_kategoria", $id, "");

foreach ($jestaun_sira as $loop) {
    if ($loop['id_jestaun'] == 'd0d9ef35-005b-4905-8de0-aa8a9e4e321c') {
?>

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-coffee icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>
                        Kategoria <?= $kategoria[0]['kategoria'] ?>
                        <div class="page-title-subheading">
                            <?= 'Eziste Produtu ' . count($produtu) . ' husi Kategoria ida ne'; ?>
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" class="btn-shadow mr-3 btn btn-primary" data-toggle="modal" data-target="#aumenta_produtu">
                        Aumenta <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-7">
                    <div class="card shadow mb-4">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produtu</th>
                                            <th>Folin</th>
                                            <th>Estadu</th>
                                            <th class="text-center">Asaun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($produtu as $loop) {
                                            echo '<tr>
                                        <td>' . $no++ . '</td>     
                                        <td>' . $loop['naran_produtu'] . '</td>
                                        <td>' . $loop['folin'] . '</td>
                                        <td>' . $loop['estadu'] . '</td>
                                        <td>
                                            <div class="d-flex justify-content-center flex-shrink-0">
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-toggle="modal" data-target="#edit_produtu" data-id_produtu="' . $loop['id_produtu'] . '" data-id_kategoria="' . $loop['id_kategoria'] . '" data-kategoria="' . $loop['kategoria'] . '" data-naran_produtu="' . $loop['naran_produtu'] . '" data-folin="' . $loop['folin'] . '" data-estadu="' . $loop['estadu'] . '">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-toggle="modal" data-target="#delete_produtu" data-id_produtu="' . $loop['id_produtu'] . '" data-id_kategoria="' . $loop['id_kategoria'] . '" data-naran_produtu="' . $loop['naran_produtu'] . '">
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
        </div>

<?php }
}
?>

<script>
    $(document).ready(function() {
        $('#edit_produtu').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)

            var kategoria = button.data('kategoria')
            var id_kategoria_js = button.data('id_kategoria')
            var id_produtu_js = button.data('id_produtu')
            var naran_produtu_js = button.data('naran_produtu')
            var folin_js = button.data('folin')
            var modal = $(this)

            modal.find('#id_kategoria_js').val(id_kategoria_js)
            modal.find('#kategoria_js').val(kategoria)
            modal.find('#id_produtu_js').val(id_produtu_js)
            modal.find('#naran_produtu_js').val(naran_produtu_js)
            modal.find('#folin_js').val(folin_js)

        })

        $('#delete_produtu').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_produtu = button.data('id_produtu')
            var id_kategoria = button.data('id_kategoria')
            var naran_produtu = button.data('naran_produtu')

            var modal = $(this)
            modal.find('#id_produtu').val(id_produtu)
            modal.find('#id_kategoria').val(id_kategoria)
            modal.find('#naran_produtu').text(naran_produtu)

        })
    })
</script>