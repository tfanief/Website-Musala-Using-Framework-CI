
    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full center">
                        <div class="heading_main text_align_center">
                            <h2><span class="theme_color">Data </span>Keuangan</h2>
                            <p class="large">MUSHOLLA BAITURRAHIM BANK RIAU KEPRI</p>
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
                <!--<div class="col-lg-6 col-md-6 col-sm-12 white_fonts">-->
                        <table class="table" width="1500px">
                            <tr class="bg-dark">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                                <th>Keterangan</th>
                            </tr>
                            <?php
                                $no = 1;
                                foreach($keuangan as $k) : ?>
                            <tr class="bg-light">
                                <td><?php echo $no;?></td>
                                <td><?php echo $k["tanggal_keuangan"];?></td>
                                <td><?php echo $k["pemasukan_keuangan"];?></td>
                                <td><?php echo $k["pengeluaran_keuangan"];?></td>
                                <td><?php echo $k["keterangan"];?></td>
                            </tr>
                            <?php $no++; endforeach;?>
                        </table>
                    </form>
                <!--</div>-->
            </div>
        </div>
    </div>
 