<?php
if (isset($_GET['m'])) { 

    $id_meza = $_GET['m'];
    $kategoria = $get_table->get_table("kategoria order by kategoria ASC limit 1");
    $produtu_sira = $get_table->get_table("produtu order by naran_produtu ASC");
    $meza = $get_table->get_table_uuid("", "transaksaun", "id_meza", $id_meza, " and tipu_transaksaun='Pendente'");

?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-coffee icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Produtu sira
                    <div class="page-title-subheading">
                        <?= 'Total produtu ' . count($produtu_sira) . ' husi Kategoria ' . count($kategoria) . ' mak ita bele order' ?>
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <button class="mb-2 mr-2 btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-30"></i>
                    </span>
                    Order sira
                    <span class="badge badge-pill badge-light">
                        <?= count($meza) ?>
                    </span>
                </button>
            </div>
        </div>
    </div>


    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="header-icon lnr-gift icon-gradient bg-love-kiss">
                        </i>Hili Produtu sira tuir Kategoria</div>
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
                        // '.$loops['id_produtu'].'
                        foreach ($kategoria as $loop) {
                            $produtu = $get_table->get_table_uuid("", "produtu", "id_kategoria", $loop['id_kategoria'], " limit 1");
                            $act = $no == 1 ? 'active' : '';

                            echo '<div class="tab-pane ' . $act . '" id="k' . $loop['id_kategoria'] . '" role="tabpanel">
                                <div class="row">';
                            foreach ($produtu as $loops) {
                                $id_produtu = $loops['id_produtu'];
                                $naran_produtu = $loops['naran_produtu'];
                                $folin = $loops['folin'];
                                echo '<div class="col-xl-3 col-md-6 mb-4"  data-toggle="modal" data-target="#order_produtu_js" data-id_produtu="' . $id_produtu . '" data-naran_produtu="' . $naran_produtu . '" data-folin="' . $folin . '">
                                    <div class="card border-left-primary shadow py-2">
                                        <div class="card-body">
                                            <a href="#" class="text-decoration-none" data-toggle="modal">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            ' . $naran_produtu . '</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">' . $folin . '</div>
                                                    </div>
                                                    <div class="col-auto">';
                                                    $jestaun_sira = $auth->image_cache($loop['id_kategoria']);
                                                    echo '</div>
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
                    <!-- javascript:void(0); -->
                    <a href="#" class="btn-wide btn-shadow btn btn-danger">Remata</a>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<script>
    console.log('susesu 1');
    $('#order_produtu_js').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget)

        var id_produtu_js = button.data('id_produtu')
        var naran_produtu_js = button.data('naran_produtu')
        var folin_js = button.data('folin')
        var modal = $(this)

        alert('id_produtu_js');

        modal.find('#id_produtu_js').val(id_produtu_js)
        modal.find('#naran_produtu_js').val(naran_produtu_js)
        modal.find('#folin_js').val(folin_js)

    })
</script>