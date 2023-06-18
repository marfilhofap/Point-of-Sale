<?php
if (isset($_GET['m'])) { 

    $id_meza = $_GET['m'];
    $kategoria = $get_table->get_table("kategoria order by kategoria ASC");
    $meza = $get_table->get_table_uuid("", "transaksaun", "id_meza", $id_meza, " and tipu_transaksaun='Pendente'");
?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-coffee icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Home
                    <div class="page-title-subheading">
                        Informasaun no Grafiku sira konaba POS Love Story
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <button class="mb-2 mr-2 btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-30"></i>
                    </span>
                    Primary
                    <span class="badge badge-pill badge-light">
                        <?= count($meza) ?>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-6 col-xl-3">

        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-12 col-lg-11">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="header-icon lnr-gift icon-gradient bg-love-kiss"> </i>Hili Menu sira tuir Kategoria</div>
                    <ul class="nav">
                        <?php
                        $no = 1;
                        foreach ($kategoria as $loop) {
                            if ($no == 1) {
                                echo '<li class="nav-item"><a data-toggle="tab" href="#k' . $loop['id_kategoria'] . '" class="active nav-link show">' . $loop['kategoria'] . '</a></li>';
                            } else {
                                echo '<li class="nav-item"><a data-toggle="tab" href="#k' . $loop['id_kategoria'] . '" class="nav-link show">' . $loop['kategoria'] . '</a></li>';
                            }
                            $no++;
                        }
                        ?>

                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <?php
                        $no = 1;
                        foreach ($kategoria as $loop) {
                            $produtu = $get_table->get_table_uuid("", "produtu", "id_kategoria", $loop['id_kategoria'], "");
                            $act = $no == 1 ? 'active' : '';

                            echo '<div class="tab-pane ' . $act . '" id="k' . $loop['id_kategoria'] . '" role="tabpanel">
                                <div class="row">';
                            foreach ($produtu as $loops) {
                                echo '<div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow py-2">
                                        <div class="card-body">
                                            <a href="#" class="text-decoration-none" data-toggle="modal" data-target="#modal_konfirmasaun" data-naran_produtu="' . $loops['naran_produtu'] . '" data-folin="' . $loops['folin'] . '">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            ' . $loops['naran_produtu'] . '</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">' . $loops['folin'] . '</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <img src="assets/images/meza.jpg" style="width: 100px;" alt="logo">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>';
                            }
                            echo '</div></div>';

                            $no++;
                        }
                        ?>
                    </div>
                </div>
                <div class="d-block text-center card-footer">
                    <a href="javascript:void(0);" class="btn-wide btn-shadow btn btn-danger">Remata</a>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<script>
    $(document).ready(function() {
        $('#modal_konfirmasaun').on('show.bs.modal', function(event) {
            alert('AAAA');
            // var button = $(event.relatedTarget)

            // var naran_produtu = button.data('naran_produtu')
            // var folin = button.data('folin')
            // var modal = $(this)

            // modal.find('#naran_produtu').text(naran_produtu)
            // modal.find('#folin').val(folin)
        })

    })
</script>