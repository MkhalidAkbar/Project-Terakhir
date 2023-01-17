<?php 
$taAktif = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tb_thajaran WHERE status=1 "));
$semAktif = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tb_semester WHERE status=1 "));

 ?>
<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Jadwal</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Jadwal Mengajar</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Tambah Jadwal</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Form Elements</div>
								</div>
								<div class="card-body">
									<form action="" method="post">

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="kode">Kode Pelajaran</label>
												<input name="kode" type="text" class="form-control" id="kode" value="MPL-<?=time();?>" readonly>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Tahun Pelajaran</label>
												<input type="hidden" name="ta" value="<?=$taAktif['id_thajaran'] ?>">
												<input type="hidden" name="semester" value="<?=$semAktif['id_semester'] ?>">
												<input type="text" class="form-control" placeholder="<?=$taAktif['tahun_ajaran'] ?>" readonly>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="kode">Semester</label>
												<input type="text" class="form-control" placeholder="<?=$semAktif['semester'] ?>" readonly>
											</div>
										</div>
									</div>

									<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Guru Mata Pelajaran</label>
											<select name="guru" class="form-control">
												<option value="">- Pilih -</option>
												<?php 
												$guru = mysqli_query($con,"SELECT * FROM tb_guru ORDER BY id_guru ASC");
												foreach ($guru as $g) {
													echo "<option value='$g[id_guru]'>$g[nama_guru]</option>";
												}
												 ?>
												
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Wali Kelas</label>
											<select name="walikelas" class="form-control">
												<option value="">- Pilih -</option>
												<?php 
												$walikelas = mysqli_query($con,"SELECT * FROM tb_walikelas ORDER BY id_walikelas ASC");
												foreach ($walikelas as $w) {
													echo "<option value='$w[id_walikelas]'>$w[nama_lengkap]</option>";
												}
												 ?>
												
											</select>
										</div>
										</div>
								
									<div class="col-md-6">
										<div class="form-group">
											<label>Mata Pelajaran</label>
											<select name="mapel" class="form-control">
												<option value="">- Pilih -</option>
												<?php 
												$mapel = mysqli_query($con,"SELECT * FROM tb_master_mapel ORDER BY id_mapel ASC");
												foreach ($mapel as $g) {
													echo "<option value='$g[id_mapel]'> $g[mapel]</option>";
												}
												 ?>
												
											</select>
										</div>
									</div>
								</div>

									<div class="row">
									<div class="col-md-6">											
											<div class="container">
												<label>Hari</label><br/>
												
												<label class="form-radio-label">
													<input class="form-radio-input" type="checkbox" name="hari[]" value="Senin">
													<span class="form-radio-sign">Senin</span>
												</label>
												<label class="form-radio-label">
													<input class="form-radio-input" type="checkbox" name="hari[]" value="Selasa">
													<span class="form-radio-sign">Selasa</span>
												</label>
												<label class="form-radio-label">
													<input class="form-radio-input" type="checkbox" name="hari[]" value="Rabu">
													<span class="form-radio-sign">Rabu</span>
												</label>
												<label class="form-radio-label">
													<input class="form-radio-input" type="checkbox" name="hari[]" value="Kamis">
													<span class="form-radio-sign">Kamis</span>
												</label>
												<label class="form-radio-label">
													<input class="form-radio-input" type="checkbox" name="hari[]" value="Jum'at">
													<span class="form-radio-sign">Jum'at</span>
												</label>
												<label class="form-radio-label">
													<input class="form-radio-input" type="checkbox" name="hari[]" value="Sabtu">
													<span class="form-radio-sign">Sabtu</span>
												</label>

											</div>
										</div>
										<div class="col-md-6">	
												<label>Kelas</label>
											<select name="kelas" class="form-control">
												<option value="">- Pilih -</option>
												<?php 
												$kelas = mysqli_query($con,"SELECT * FROM tb_mkelas ORDER BY id_mkelas ASC");
												foreach ($kelas as $g) {
													echo "<option value='$g[id_mkelas]'>$g[nama_kelas]</option>";
												}
												 ?>
												
											</select>


										</div>
									</div>
									<?php 
									// =============================== waktu pertemuan 1=================================================
									?>
									<hr>
									<div class="card-header">
										<div class="card-title">
											Jadwal Pertama
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="waktumulai">Waktu Mulai</label>
												<select name="waktumulai" id="waktumulai" class="form-control">
													<option value="">- Pilih -</option>
													<option value="07.00">07.00</option>
													<option value="07.30">07.30</option>
													<option value="08.00">08.00</option>
													<option value="08.30">08.30</option>
													<option value="09.15">09.15</option>
													<option value="09.45">09.45</option>
													<option value="10.15">10.15</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="waktuselesai">Waktu Selesai</label>
												<select name="waktuselesai" id="waktuselesai" class="form-control">
													<option value="">- Pilih -</option>
													<option value="07.30">07.30</option>
													<option value="08.00">08.00</option>
													<option value="08.30">08.30</option>
													<option value="09.00">09.00</option>
													<option value="09.45">09.45</option>
													<option value="10.15">10.15</option>
													<option value="10.45">10.45</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="jamke">Jam Ke</label>
												<select name="jamke" id="jamke" class="form-control">
													<option value="">- Pilih -</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
												</select>
											</div>
										</div>
									</div>
									<?php 
									// ===========================end  waktu pertemuan 1=================================================
									// =============================== waktu pertemuan 2=================================================
									?>
									<hr>
									<div class="card-header">
										<div class="card-title">
											Jadwal Kedua
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="waktumulai2">Waktu Mulai</label>
												<select name="waktumulai2" id="waktumulai2" class="form-control">
													<option value="">- Pilih -</option>
													<option value="07.00">07.00</option>
													<option value="07.30">07.30</option>
													<option value="08.00">08.00</option>
													<option value="08.30">08.30</option>
													<option value="09.15">09.15</option>
													<option value="09.45">09.45</option>
													<option value="10.15">10.15</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="waktuselesai2">Waktu Selesai</label>
												<select name="waktuselesai2" id="waktuselesai2" class="form-control">
													<option value="">- Pilih -</option>
													<option value="07.30">07.30</option>
													<option value="08.00">08.00</option>
													<option value="08.30">08.30</option>
													<option value="09.00">09.00</option>
													<option value="09.45">09.45</option>
													<option value="10.15">10.15</option>
													<option value="10.45">10.45</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="jamke2">Jam Ke</label>
												<select name="jamke2" id="jamke2" class="form-control">
													<option value="">- Pilih -</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
												</select>
											</div>
										</div>
									</div>
									<hr>
									<?php 
									// ===========================end  waktu pertemuan 2=================================================
									?>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<button type="submit" name="save" class="btn btn-secondary">
													<i class="far fa-save"></i> Simpan
												</button>
												<a href="javascript:history.back()" class="btn btn-danger">
													<i class="fas fa-angle-double-left"></i> Kembali
												</a>
											</div>
										</div>
									</div>
									</form>
						<?php 

						if (isset($_POST['save'])) {
							

									$kode = $_POST['kode'];
									$ta = $_POST['ta'];
									$semester = $_POST['semester'];
									$guru = $_POST['guru'];
									$mapel = $_POST['mapel'];
									$hari = implode(",", $_POST['hari']);
									$kelas = $_POST['kelas'];
									$waktumulai = $_POST['waktumulai'];
									$waktuselesai = $_POST['waktuselesai'];
									$waktumulai2 = $_POST['waktumulai2'];
									$waktuselesai2 = $_POST['waktuselesai2'];
									$jamke = $_POST['jamke'];
									$jamke2 = $_POST['jamke2'];

									$walikelas = $_POST['walikelas'];

						$insert = mysqli_query($con,"INSERT INTO tb_mengajar VALUES (NULL,'$kode','$hari','$waktumulai','$waktuselesai','$waktumulai2','$waktuselesai2','$jamke','$jamke2','$guru','$mapel','$kelas','$semester','$ta','$walikelas' ) ");

								if ($insert) {
								echo "
								<script type='text/javascript'>
								setTimeout(function () { 

								swal('Sukses', 'Jadwal ditambahkan', {
								icon : 'success',
								buttons: {        			
								confirm: {
								className : 'btn btn-success'
								}
								},
								});    
								},10);  
								window.setTimeout(function(){ 
								window.location.replace('?page=jadwal');
								} ,3000);   
								</script>";
								}
						}


						?>

							

</div>

</div>
</div>
</div>
</div>
</div>
