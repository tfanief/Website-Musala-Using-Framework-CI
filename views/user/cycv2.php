
	
	<!-- section --> 
	   <div class="innerpage_banner">
	      <div class="container">
		     <div class="row"> 
			    <div class="col-md-12">
				   <h2>Kegiatan Terbaru</h2>
				</div>
			 </div>
		  </div>
	   </div>
	<!-- end section -->
	<?php
    $hari   = date('l', microtime($kegiatan_palingBaru['tanggal_kegiatan']));
    ?>

    <div class="section layout_padding theme_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 text_align_center">
                    <div class="full">
                       <img class="img-responsive" src="<?= base_url('assets/img/kegiatan/') . $kegiatan_palingBaru['image']?>"/>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 ">
                    <div class="row">
                        <h1><?= $kegiatan_palingBaru['judul_kegiatan'] ?></h1>
                    </div>
                     <div class="row">
                        <span class="fa fa-calendar-o" /><h5><?=$hari?>, <?=$kegiatan_palingBaru['tanggal_kegiatan'] ?></h5>
                    </div>
                    <div class="row">
                        <span class="fa fa-clock-o" /><h5><?=$kegiatan_palingBaru['waktu_kegiatan'] ?> - Selesai</h5>
                    </div>
                    <div class="row">
                        <span class="fa fa-map-marker"/> <h5><?= $kegiatan_palingBaru['lokasi_kegiatan'] ?></h5>
                    </div>
                    <div class="row">
                        <h5><?= $kegiatan_palingBaru['deskripsi_kegiatan'] ?></h5>
                    </div>
                    <div class="row">
                        <div id="googlemaps"  style="width:100%;height:100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
	
	<!-- section -->
    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full center margin-bottom_30">
                        <div class="heading_main text_align_center">
                            <h2><span class="theme_color">JADWAL</span> KEGIATAN</h2>
                            <p class="large">jangan sampai terlewatkan</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <?php foreach($kegiatan as $k) : ?>
                            <?php
                            $hari   = date('l', microtime($k['tanggal_kegiatan']));
                            ?>
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <img class="img-responsive" src="<?= base_url('assets/img/kegiatan/') . $k['image']  ?>" width="250" height="250" data-toggle="modal" data-target="#editIMGModal<?=$k['id_kegiatan'];?>" onclick />
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="row">
                                     <h1 data-toggle="modal" data-target="#editIMGModal<?=$k['id_kegiatan'];?>" onclick><?= $k['judul_kegiatan'] ?></h1>
                                    </div>
                                    <div class="row">
                                        <span class="fa fa-calendar-o" /><h5><?=$hari?>, <?=$k['tanggal_kegiatan'] ?></h5>
                                    </div>
                                    <div class="row">
                                        <span class="fa fa-clock-o" /><h5><?=$k['waktu_kegiatan'] ?> - Selesai</h5>
                                    </div>
                                    <div class="row">
                                        <span class="fa fa-map-marker"/> <h5><?= $k['lokasi_kegiatan'] ?></h5>
                                    </div>
                                    <div class="row">
                                        <h5><?= substr($k['deskripsi_kegiatan'],0,100)?>....</h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            
            </div>

        </div>
    </div>
    <!-- end section -->

         <!-- Modal-->
                       <?php foreach ($kegiatan as $k) : ?>
                            <div class="modal fade" id="editIMGModal<?= $k['id_kegiatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="editIMGModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title w-100 text-center" id="editIMGModalLabel"><?= $k['judul_kegiatan'] ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                            <img alt="Card image cap" class="card-img-top" src="<?= base_url('assets/img/kegiatan/') . $k['image']; ?>" />
                                            </div>
                                           <div class="row">
                                        <span class="fa fa-calendar-o" /><h5><?=$hari?>, <?=$k['tanggal_kegiatan'] ?></h5>
                                    </div>
                                     <div class="row">
                                        <span class="fa fa-clock-o" /><h5><?=$k['waktu_kegiatan'] ?> - Selesai</h5>
                                    </div>
                                    <div class="row">
                                        <span class="fa fa-map-marker"/> <h5><?= $k['lokasi_kegiatan'] ?></h5>
                                    </div>
                                            <div class="row">
                                            <?= $k['deskripsi_kegiatan']?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       <?php endforeach; ?>