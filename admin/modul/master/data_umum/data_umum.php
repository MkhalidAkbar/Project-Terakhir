                <div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Umum</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a>
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a>Data Umum</a>
							</li>
						</ul>
					</div>

<!------------------------------------------------ card semester --------------------------------------------------->
            
        <div class="page-header">
            <h4 class="page-title">Semester</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">
                     <a href="" class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#addSemester"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
                </div>
                    <div class="card-body">
                      <div class="table-responsive">
                 <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Semester</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        $no=1;
			            $semester = mysqli_query($con,"SELECT * FROM tb_semester");
                        foreach ($semester as $k) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                            <td><?=$k['semester'];?></td>
                            <td><?php 
                            if ($k['status']==0) {
                              echo "<span class='badge badge-danger'>Tidak Aktif</span>";
                              
                            }else{
                              echo "<span class='badge badge-success'>Aktif</span>";
                            }

                            ?></td>
                            <td>
                              <?php 
                            if ($k['status']==0) {
                             ?>
                             <a onclick="return confirm('Yakin Aktifkan Semester  ??')" href="?page=master&act=set_semester&id=<?=$k['id_semester'] ?>&status=1" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Aktifkan</a>
                             <?php
                              
                            }else{
                              ?>
                              <a onclick="return confirm('Yakin NonAktifkan Semester  ??')" href="?page=master&act=set_semester&id=<?=$k['id_semester'] ?>&status=0" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i> Nonaktif</a>
                              <?php
                            }

                            ?>
                               
                                
                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?=$k['id_semester'] ?>"><i class="far fa-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delsemester&id=<?=$k['id_semester'] ?>">
                        <i class="fas fa-trash"></i> Del</a>

                    <!-- Modal -->
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?=$k['id_semester'] ?>" class="modal fade" style="display: none;">
                      <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit semester</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                      <div class="modal-body">
                          <form action="" method="post">
                            <div class="row">
                              <div class="col-md-10">
                                <div class="form-group">
                        <label>Semester</label>
                         <input name="id" type="hidden" value="<?=$k['id_semester'] ?>">
                        <input name="semester" type="text" value="<?=$k['semester'] ?>" class="form-control">
                    </div>
                   
                    <div class="form-group">                    
                            <button name="edit" class="btn btn-primary" type="submit">Edit</button>
                     
                    </div>                        
                    </div>                      
                  </div>
                </form>
                <?php 
                if (isset($_POST['edit'])) {
                    $save= mysqli_query($con,"UPDATE tb_semester SET semester='$_POST[semester]' WHERE id_semester='$_POST[id]' ");
                    if ($save) {
                        echo "<script>
                        alert('Data diubah !');
                        window.location='?page=master&act=data_umum';
                        </script>";                        
                    }
                }

                 ?>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
          <?php } ?>
          </table>
</div>
</div>
</div>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addSemester" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">           
            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah semester</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label>Semester</label>
                        <input name="semester" type="text" placeholder="Nama semester .." class="form-control">
                    </div>
                   
                    <div class="form-group">                     
                            <button name="save" class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
                <?php 
                if (isset($_POST['save'])) {
                    $save= mysqli_query($con,"INSERT INTO tb_semester VALUES(NULL,'$_POST[semester]','1') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=data_umum';
                        </script>";                        
                    }
                }

                 ?>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-------------------------------------------------- end card semester --------------------------------------------->

<!-------------------------------------------------- card kelas ---------------------------------------------------->

                    <div class="page-header">
                        <h4 class="page-title">Kelas</h4>
                    </div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">
										 <a href="" class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#addKelas"><i class="fa fa-plus"></i> Tambah</a>
									</div>
								</div>
								<div class="card-body">
									
									<table class="table table-sm">
										<thead>
											<tr>
												<th scope="col">No</th>
                                                <th scope="col">Kode Kelas</th>
												<th scope="col">Nama Kelas</th>
												<th scope="col">Opsi</th>
											</tr>
										</thead>
										<tbody>
                        <?php 
                        $no=1;
                        $kelas = mysqli_query($con,"SELECT * FROM tb_mkelas");
                        foreach ($kelas as $k) {?>
                        <tr>
                            <td><b><?=$no++;?>.</b></td>                            
                            <td><?=$k['kd_kelas'];?></td>
                            <td><?=$k['nama_kelas'];?></td>
                            <td>
                                
                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?=$k['id_mkelas'] ?>"><i class="far fa-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delkelas&id=<?=$k['id_mkelas'] ?>"><i class="fas fa-trash"></i> Del</a>

                            <!-- Modal -->
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?=$k['id_mkelas'] ?>" class="modal fade" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit Kelas</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                          <div class="row">
                                            <div class="col-md-10">
                                                  <div class="form-group">
                                                <label>Nama Kelas</label>
                                                 <input name="id" type="hidden" value="<?=$k['id_mkelas'] ?>">
                                                <input name="kelas" type="text" value="<?=$k['nama_kelas'] ?>" class="form-control">
                                            </div>
                                           
                                            <div class="form-group">                    
                                                    <button name="editkelas" class="btn btn-primary" type="submit">Edit</button>
                                             
                                            </div>                        
                                            </div>                      
                                          </div>
                                        </form>
                                        <?php 
                                        if (isset($_POST['editkelas'])) {
                                            $save= mysqli_query($con,"UPDATE tb_mkelas SET nama_kelas='$_POST[kelas]' WHERE id_mkelas='$_POST[id]' ");
                                            if ($save) {
                                                echo "<script>
                                                alert('Data diubah !');
                                                window.location='?page=master&act=data_umum';
                                                </script>";                        
                                            }
                                        }

                                         ?>


                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->



                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>      
									</table>
								</div>
							</div>



							<!-- Modal -->
<div id="addKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah Kelas</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label>Kode Kelas</label>
                        <input name="kode" type="text" value="K-<?=time();?>" class="form-control" readonly>
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input name="kelas" type="text" placeholder="Nama kelas .." class="form-control">
                    </div>
                    </div>
                    <div class="form-group">                     
                            <button name="savekelas" class="btn btn-primary" type="submit">Simpan</button>
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                    </div>
                </form>
                <?php 
                if (isset($_POST['savekelas'])) {
                   
                    $save= mysqli_query($con,"INSERT INTO tb_mkelas VALUES(NULL,'$_POST[kode]','$_POST[kelas]') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=data_umum';
                        </script>";                        
                    }
                }

                 ?>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!---------------------------------------------- end card kelas ---------------------------------------------------->

<!-------------------------------------------- card tahun ajaran --------------------------------------------------->
          
        <div class="page-header">
            <h4 class="page-title">Tahun Ajaran</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">
                     <a href="" class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#addTahun Pelajaran"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                      <div class="table-responsive">
                 <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        $no=1;
			$ta = mysqli_query($con,"SELECT * FROM tb_thajaran");
                        foreach ($ta as $t) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                            
                            <td><b><?=$t['tahun_ajaran'];?></b></td>
                            <td>
                            <?php 
                            if ($t['status']==0) {
                              echo "<span class='badge badge-danger'>Tidak Aktif</span>";
                              
                            }else{
                              echo "<span class='badge badge-success'>Aktif</span>";
                            }

                            ?></td>
                            <td>
                              <?php 
                            if ($t['status']==0) {
                             ?>
                             <a onclick="return confirm('Yakin Aktifkan Ta  ??')" href="?page=master&act=set_ta&id=<?=$t['id_thajaran'] ?>&status=1" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Aktifkan</a>
                             <?php
                              
                            }else{
                              ?>
                              <a onclick="return confirm('Yakin Non-Aktifkan Ta  ??')" href="?page=master&act=set_ta&id=<?=$t['id_thajaran'] ?>&status=0" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i> Nonaktif</a>
                              <?php
                            }

                            ?>
                                
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delta&id=<?=$t['id_thajaran'] ?>"><i class="fas fa-trash"></i> Del</a>

                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>                        
                </table>

</div>
</div>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addTahun Pelajaran" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah Tahun</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label>TAHUN PELAJARAN</label>
                        <input name="tp" type="text" placeholder="2020/2021" class="form-control" required>
                    </div>
                   
                    <div class="form-group">                    
                            <button name="saveta" class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
                <?php 
                if (isset($_POST['saveta'])) {
                    $save= mysqli_query($con,"INSERT INTO tb_thajaran VALUES(NULL,'$_POST[tp]','1') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=data_umum';
                        </script>";                        
                    }
                }

                 ?>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>
</div>
<!----------------------------------------- end card tahun ajaran --------------------------------------------------->

<!----------------------------------------- start card wali kelas --------------------------------------------------->

                    <div class="page-header">
                        <h4 class="page-title">Wali Kelas</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                         <a href="" class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</a>
                                    </div>
                                </div>
                                <div class="card-body">

                 <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Nama Wali Kelas</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        $no=1;
			$kelas = mysqli_query($con,"SELECT * FROM tb_walikelas
                INNER JOIN tb_guru ON tb_walikelas.id_guru=tb_guru.id_guru
                INNER JOIN tb_mkelas ON tb_walikelas.id_mkelas=tb_mkelas.id_mkelas

                ORDER BY tb_walikelas.id_mkelas DESC");
                        foreach ($kelas as $k) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                            
                            <td><?=$k['nama_kelas'];?></td>
                            <td><?=$k['nama_guru'];?></td>
                            <td>
                                
                            <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?=$k['id_walikelas'] ?>"><i class="far fa-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=walas&act=delwakel&id=<?=$k['id_walikelas'] ?>">
                            <i class="fas fa-trash"></i> Del</a>

                            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?=$k['id_walikelas'] ?>" class="modal fade" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                 <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit Wali Kelas</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                       <form action="" method="post" class="form-horizontal">
                        <input type="hidden" name="id" value="<?=$k['id_walikelas'] ?>">
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <select name="wakel" class="form-control">
                            <?php 
                            $wkel = mysqli_query($con,"SELECT * FROM tb_guru");
                            foreach ($wkel as $wk) {
                                if ($wk['id_guru']==$k['id_guru']) {
                                    $selected="selected";
                                }else{
                                    $selected='';
                                }
                                echo "<option value='$wk[id_guru]' $selected>$wk[nama_guru]</option>";
                            }

                             ?>
                        </select>
                    </div>
               <div class="form-group">
                        <label>Nama Kelas</label>
                        <select name="kelas" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <?php 
                            $kel = mysqli_query($con,"SELECT * FROM tb_mkelas ORDER BY id_mkelas ASC ");
                            foreach ($kel as $kl) {

                                 if ($kl['id_mkelas']==$k['id_mkelas']) {
                                    $selected="selected";
                                }else{
                                    $selected='';
                                }

                                echo "<option value='$kl[id_mkelas]' $selected>$kl[nama_kelas]</option>";
                            }

                             ?>
                        </select>
                    </div>
            
                    <div class="row form-group">
                        <div class="col-lg-2 col-lg-10">                       
                            <button name="editwalas" class="btn btn-info" type="submit">Edit</button>
                        </div>
                    </div>
                </form>
                <?php 
                if (isset($_POST['editwalas'])) {
                    $save= mysqli_query($con,"UPDATE tb_walikelas SET id_guru='$_POST[wakel]',id_mkelas='$_POST[kelas]' WHERE id_walikelas='$_POST[id]' ");
                    if ($save) {
                        echo "<script>
                        alert('Data diubah !');
                        window.location='?page=master&act=data_umum';
                        </script>";                        
                    }
                }

                 ?>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>                        
                </table>

</div>
</div>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
              <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah Wali Kelas</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <select name="wakel" class="form-control">
                            <option value="">Pilih Guru</option>
                            <?php 
                            $wkel = mysqli_query($con,"SELECT * FROM tb_guru");
                            foreach ($wkel as $wk) {
                                echo "<option value='$wk[id_guru]'>$wk[nama_guru]</option>";
                            }

                             ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <select name="kelas" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <?php 
                            $kel = mysqli_query($con,"SELECT * FROM tb_mkelas ORDER BY id_mkelas ASC ");
                            foreach ($kel as $k) {
                                echo "<option value='$k[id_mkelas]'>$k[nama_kelas]</option>";
                            }

                             ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" placeholder="Username" class="form-control">
                    </div>
                  
                    <div class="row form-group">
                        <div class="col-lg-2 col-lg-10">                       
                            <button name="savewalas" class="btn btn-info" type="submit">Save</button>
                        </div>
                    </div>
                </form>
                <?php 
                if (isset($_POST['savewalas'])) {

                    $pass= sha1($_POST['username']);

                    $save= mysqli_query($con,"INSERT INTO tb_walikelas VALUES(NULL,'$_POST[wakel]','','$_POST[kelas]','$_POST[username]','$pass','') ");
                    $save= mysqli_query($con,"INSERT INTO tb_mengajar VALUES('','','','','','','','','','','','','','','$_POST[wakel]') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=data_umum';
                        </script>";                        
                    }
                }

                 ?>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!----------------------------------------- end card wali kelas --------------------------------------------------->

<!----------------------------------------- start card mapel --------------------------------------------------->

          <div class="page-header">
            <h4 class="page-title">Mata Pelajaran</h4>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">
                     <a href="" class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#myModalmapel"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
                </div>
                <div class="card-body">
                      <div class="table-responsive">

               

                 <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Mapel</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        $no=1;
			            $mapel = mysqli_query($con,"SELECT * FROM tb_master_mapel");
                        foreach ($mapel as $k) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                            <td><?=$k['kode'];?></td>
                            <td><?=$k['mapel'];?></td>
                            <td>
                                
                            <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?=$k['id_mapel'] ?>"><i class="far fa-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delmapel&id=<?=$k['id_mapel'] ?>"><i class="fas fa-trash"></i> Del</a>

                            <!-- Modal -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?=$k['id_mapel'] ?>" class="modal fade" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit Mapel</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                <div class="modal-body">
                    <form action="" method="post">
                    <div class="row">
                    <div class="col-md-10">
                          <div class="form-group">
                        <label>Nama mapel</label>
                         <input name="id" type="hidden" value="<?=$k['id_mapel'] ?>">
                        <input name="mapel" type="text" value="<?=$k['mapel'] ?>" class="form-control">
                    </div>
                   
                    <div class="form-group">                    
                            <button name="editmapel" class="btn btn-primary" type="submit">Edit</button>
                     
                    </div>                        
                    </div>                      
                  </div>
                </form>
                <?php 
                if (isset($_POST['editmapel'])) {
                    $save= mysqli_query($con,"UPDATE tb_master_mapel SET mapel='$_POST[mapel]' WHERE id_mapel='$_POST[id]' ");
                    if ($save) {
                        echo "<script>
                        alert('Data diubah !');
                        window.location='?page=master&act=data_umum';
                        </script>";                        
                    }
                }

                 ?>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>                        
                </table>

</div>
</div>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalmapel" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah Mapel</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                <div class="form-group">
                        <label>Kode mapel</label>
                        <input name="kode" type="text" value="MP-<?=time() ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama mapel</label>
                        <input name="mapel" type="text" placeholder="Nama mapel absen" class="form-control">
                    </div>

                   
                    <div class="form-group">                     
                            <button name="savemapel" class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
                <?php 
                if (isset($_POST['savemapel'])) {
                    $save= mysqli_query($con,"INSERT INTO tb_master_mapel VALUES(NULL,'$_POST[kode]','$_POST[mapel]') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=data_umum';
                        </script>";                        
                    }
                }

                 ?>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!----------------------------------------- end card mapel --------------------------------------------------->





				</div>
			</div>
		</div>

	</div>
</div>
</div>
</div>
</div>
</div>
</div>



