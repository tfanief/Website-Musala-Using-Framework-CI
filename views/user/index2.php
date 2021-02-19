    <!-- Start Banner -->
    <div class="ulockd-home-slider">
        <div class="container-fluid">
            <div class="row">
                <div class="pogoSlider" id="js-main-slider">
                    <div class="pogoSlider-slide" style="background-image:url(<?= base_url('assets/user/'); ?>images/slider-01.jpg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text">
                                        <h3><span class="theme_color">MUSHOLLA</span> BAITURRAHIM</h3>
                                        <br>
                                        <h4>BANK RIAU KEPRI<br></h4>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pogoSlider-slide" style="background-image:url(<?= base_url('assets/user/'); ?>images/slider-01.jpg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text">
                                        <h3><span class="theme_color">MUSHOLLA</span> BAITURRAHIM</h3>
                                        <br>
                                        <h4>BANK RIAU KEPRI<br></h4>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .pogoSlider -->
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full center">
                        <div class="heading_main text_align_center">
                            <h2><span class="theme_color">JADWAL</span> SHOLAT WILAYAH PEKANBARU</h2>
                            <p class="large">sholatlah anda sebelum disholatkan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- section -->

    <div class="section layout_padding theme_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 text_align_center">
                    <div class="full">
                        <img class="img-responsive" src="<?= base_url('assets/user/'); ?>images/resume_img3.png" alt="#" width="400" height="300" />
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 white_fonts">
                                        
                    <div align="center" id="table"></div>
                    <script type="text/javascript" src="<?= base_url('assets/user/'); ?>PrayTimes.js"></script>
                    <script type="text/javascript">
                       var date = new Date(); // today
                        //var jam = today.getHour();
                       // var menit = today.getMinutes();
                        //var detik = today.getSecond();
                        prayTimes.tune( {subuh: 2, dhuhur: 2, ashar: 2, maghrib: 2, isya: 2} );
                        var times = prayTimes.getTimes(new Date(), [0.53333330, 101.45000000, 13.74], +7);
                        var list2 = ['Subuh', 'Dhuhur', 'Ashar', 'Maghrib', 'Isya'];
                        var list = ['Fajr', 'Dhuhr', 'Asr', 'Maghrib', 'Isha'];
                        var html = '<table class="table">';
                        html += '<tr class="bg-light" width="700px"><th colspan="2" >'+ " Tanggal : " +date.toLocaleDateString()+'</th></tr>';
                        for(var i in list)  {
                            html += '<tr class="bg-light"><td>'+ list2[i] + '</td>';
                            html += '<td>'+ times[list[i].toLowerCase()] + '</td></tr>';
                        }
                        html += '</table>';
                        document.getElementById('table').innerHTML = html;
                    </script>
                
                  
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
                            <h2><span class="theme_color">KEGIATAN</span> MUSHOLLA BAITURRAHIM</h2>
                            <p class="large">jangan sampai terlewatkan</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <?php foreach($kegiatan_terbaru as $k) : ?>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                             <img id="tombol" class="img-responsive" src="<?= base_url('assets/img/kegiatan/') . $k['image']  ?>" alt="#" data-toggle="modal" data-target="#editIMGModal<?=$k['id_kegiatan'];?>" width="250" height="250"/>
                                        </div>
                                        <div id="#editIMGModal<?=$k['id_kegiatan'];?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- konten modal-->
                                                <div class="modal-content">
                                                    <!-- heading modal-->
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Bagian heading modal</h4>
                                                    </div>
                                                    <!-- body modal-->
                                                    <div class="modal-body">
                                                        <p>bagian body modal.</p>
                                                    </div>
                                                    <!-- footer modal -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <?php foreach($kegiatan_terbaru2 as $k2) : ?>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                             <img class="img-responsive" src="<?= base_url('assets/img/kegiatan/') . $k2['image']  ?>" width="250" height="250" data-toggle="modal" data-target="#editIMGModal<?=$k2['id_kegiatan'];?>" />
                                        </div>
                                    <?php endforeach; ?>
                                
                            </div>
                        </div>
                     </div>
                       
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="full center">
                        <a href="kegiatan" class="hvr-radial-out button-theme">Lihat Lebih Lengkap></a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- end section -->

    <!-- section 
    <div class="section layout_padding theme_bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 white_fonts">
                    <h3 class="small_heading">CERITA TENTANG MUSHOLLA BANK RIAU
                        
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 text_align_center">
                    <div class="full">
                        <img class="img-responsive" src="images/resume_img2.png" alt="#" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
     <!-- Modal-->
                       <?php foreach ($kegiatan_terbaru as $k) : ?>
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
                                            <img alt="Card image cap" class="card-img-top" src="<?= base_url('assets/img/kegiatan/') . $k['image']; ?>" />
                                            <br>
                                            <h3 class="modal-body w-100 text-center" id="editIMGModalLabel"> Tanggal Kegiatan :
                                                <?= $k['tanggal_kegiatan']?>
                                            </h3>
                                            <h3 class="modal-body w-100 text-center" id=" editIMGModalLabel">
                                            <?= $k['deskripsi_kegiatan']?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       <?php endforeach; ?>
                        