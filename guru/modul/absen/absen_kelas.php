<?php 
// tampilkan data mengajar
$kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 

INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
WHERE tb_mengajar.id_guru='$data[id_guru]' AND tb_mengajar.id_mengajar='$_GET[pelajaran]'  AND tb_thajaran.status=1  ");

foreach ($kelasMengajar as $d) 
	?>

<div class="page-inner">

	<div class="page-header">
<!-- <h4 class="page-title">KELAS (<?=strtoupper($d['nama_kelas']) ?> )</h4> -->
<ul class="breadcrumbs" style="font-weight: bold;">
<li class="nav-home">
<a href="#">
<i class="flaticon-home"></i>
</a>
</li>
<li class="separator">
<i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
<a href="#">KELAS (<?=strtoupper($d['nama_kelas']) ?> )</a>
</li>
<li class="separator">
<i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
<a href="#"><?=strtoupper($d['mapel']) ?></a>
</li>
</ul>

</div>

					



<?php 			

$bulan = $_GET['bulan'];
$pertemuan = $_GET['pertemuan_ke'];

$qry = mysqli_query($con,"SELECT * FROM _logabsensi 
		INNER JOIN tb_siswa ON _logabsensi.id_siswa=tb_siswa.id_siswa
		INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
		WHERE MONTH(tgl_absen)='$bulan' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1
	 GROUP BY _logabsensi.id_siswa  ORDER BY _logabsensi.id_siswa ASC ");
foreach ($qry as $db)
$tglBulan = $db['tgl_absen'];

$tglTerakhir = 16; 
?>

<table width="100%" border="1" cellpadding="2" style="border-collapse: collapse;">
  <tr>
    <td rowspan="2" bgcolor="#EFEBE9" align="center">NO</td>
    <td rowspan="2" bgcolor="#EFEBE9" align="center">NIS</td>
    <td rowspan="2" bgcolor="#EFEBE9" align="center">NAMA SISWA</td>
    <td rowspan="2" bgcolor="#EFEBE9" align="center">L/P</td>
    <td colspan="<?=$tglTerakhir;?>" style="padding: 8px;">REKAP PER BULAN</td>
    <td colspan="5" align="center" bgcolor="#EFEBE9">JUMLAH</td>
  </tr>
  <tr>
	<?php 
	for ($i = 1; $i <=$tglTerakhir ; $i++) {
	echo "<td bgcolor='#EFEBE9' align='center'>".$i."</td>";
	}


	?> 
	<td bgcolor="#FFC107" align="center">S</td>
	<td bgcolor="#4CAF50" align="center">I</td>
	<td bgcolor="#D50000" align="center">A</td>
	
 
  </tr>
  	<?php 
			// tampilkan absen siswa
			$no=1;
			foreach ($qry as $ds) {
				 $warna = ($no % 2 == 1) ? "#ffffff" : "#f0f0f0";

				?>
			<tr>

  <tr bgcolor="<?=$warna; ?>">
    <td align="center"><?=$no++; ?></td>
    <td align="center"><?=$ds['nis'];?></td>
    <td><?=$ds['nama_siswa'];?></td>
    <td align="center"><?=$ds['jk'];?></td>
		<?php 
		for ($i = 1; $i <=$tglTerakhir ; $i++) {


		?>
		<td align="center" bgcolor="white">
		<?php 
		$ket = mysqli_query($con,"SELECT * FROM _logabsensi
		INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
		WHERE pertemuan_ke='$i' AND id_siswa='$ds[id_siswa]' AND _logabsensi.id_mengajar='$_GET[pelajaran]' 
		AND MONTH(tgl_absen)='$bulan' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 
		AND tb_semester.status=1 GROUP BY DAY(tgl_absen) ");
		foreach ($ket as $h)
			
			// echo $h['ket'];
		if ($h['ket']=='H') {
				echo "<b style='color:#2196F3;'>H</b>";				
			}elseif ($h['ket']=='I') {
				echo "<b style='color:#4CAF50;'>I</b>";
			}elseif ($h['ket']=='S') {
				echo "<b style='color:#FFC107;'>S</b>";
			}elseif($h['ket']=='A'){
				echo "<b style='color:#D50000;'>A</b>";
			}
			
		

		 ?>
</td>
		
		<?php


		}

		?>
<td align="center" style="font-weight: bold;">
<?php 
$sakit = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS sakit FROM _logabsensi
	INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
 WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='S' and MONTH(tgl_absen)='$bulan' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
echo $sakit['sakit'];

?>
</td>
<td align="center" style="font-weight: bold;">
<?php 
$izin = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS izin FROM _logabsensi
	INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
 WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='I' and MONTH(tgl_absen)='$bulan' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
echo $izin['izin'];

?>
</td align="center" style="font-weight: bold;">
<td align="center" style="font-weight: bold;">
	<?php 
$alfa = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS alfa FROM _logabsensi
	INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
 WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='A' and MONTH(tgl_absen)='$bulan' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
echo $alfa['alfa'];

?>
</td>

  </tr>
<?php } ?>
</table>

<br>




					<div class="row">
						
						
						<?php 
								// dapatkan pertemuan terakhir di tb izin
								$last_pertemuan = mysqli_query($con,"SELECT * FROM _logabsensi WHERE id_mengajar='$_GET[pelajaran]' GROUP BY pertemuan_ke ORDER BY pertemuan_ke DESC LIMIT 1  ");
								$cekPertemuan = mysqli_num_rows($last_pertemuan);
								$jml = mysqli_fetch_array($last_pertemuan);

								if ($cekPertemuan > 0 ) {
								$pertemuan = $jml['pertemuan_ke']+1;
								}else{
								 $pertemuan = 1;
									
								}


								?>

							<div class="card">
								<div class="card-body">
									<form action="" method="post">
									<!-- <div class="card-title fw-mediumbold">DAFTAR HADIR SISWA</div> -->
									<p>
									<span class="badge badge-success" style="padding: 7px;font-size: 14px;"><b>Daftar Hadir Siswa</b>
									</span>
									<span class="badge badge-success" style="padding: 7px;font-size: 14px;">
									Pertemuan Ke : <b><?=$pertemuan; ?></b>
									</span>
									</p>
									  
									<div class="card-list">
										
										
								
									
									<input type="date" name="tgl" class="form-control" value="<?=date('Y-m-d') ?>" style="background-color: #FFFFFD;color: #212121;" readonly>
									
									<input type="hidden" name="pertemuan" class="form-control" value="<?=$pertemuan; ?>">
										<?php 

										// tampilakan data siswa berdasarkan kelas yang dipilih

										$siswa = mysqli_query($con,"SELECT * FROM tb_siswa WHERE id_mkelas='$d[id_mkelas]' ORDER BY id_siswa ASC ");
										$jumlahSiswa = mysqli_num_rows($siswa);
										foreach ($siswa as $i =>$s) {?>

										<div class="item-list">
										<!-- <div class="avatar">
												<img src="../assets/img/user/<?=$s['foto'] ?>" class="avatar-img rounded-circle">
											</div>  -->
										
											<div class="info-user">
												<div class="username">
													<b class="text-success"><?=$s['nama_siswa'] ?></b>
<?php 
// tampilkan data yg sudah absen
$tgl_hari_ini = date('Y-m-d');
$siswa_telah_absen_hari_ini = mysqli_query($con,"SELECT * FROM _logabsensi INNER JOIN tb_siswa ON _logabsensi.id_siswa=tb_siswa.id_siswa WHERE _logabsensi.id_siswa='$s[id_siswa]' AND _logabsensi.tgl_absen='$tgl_hari_ini' AND _logabsensi.id_mengajar='$_GET[pelajaran]' AND _logabsensi.ket='' ");
if (mysqli_num_rows($siswa_telah_absen_hari_ini) < 1) {

// echo '<span class="badge badge-danger">Belum Absen</span>';

}

?>
													<!-- (<code><?=$s['nis'] ?></code>) -->
													<input type="hidden" name="id_siswa-<?=$i;?>" value="<?=$s['id_siswa'] ?>">

													<input type="hidden" name="pelajaran" value="<?=$_GET['pelajaran'] ?>">
												</div>
												<div class="status mt-0">
													<div class="form-check">
														<label class="form-check-label">&emsp;
														<input name="ket-<?=$i;?>" class="form-check-input" type="radio" value="H" checked>
														&emsp;<span class="form-check-sign">H</span>&emsp;
														</label>&emsp;

														<label class="form-check-label">
														<input name="ket-<?=$i;?>" class="form-check-input" type="radio" value="I" >
														&emsp;<span class="form-check-sign">I</span>&emsp;
														</label>&emsp;
															<label class="form-check-label">
														<input name="ket-<?=$i;?>" class="form-check-input" type="radio" value="S" >
														&emsp;<span class="form-check-sign">S</span>&emsp;
														</label> &emsp;

														<label class="form-check-label">
														<input name="ket-<?=$i;?>" class="form-check-input" type="radio" value="A">
														&emsp;<span class="form-check-sign">A</span>&emsp;
														</label>
														
														

												
						<label>
								
						</label>

													</div>


														

													

													
												</div>
											</div>
											
											
										</div>
									<?php } ?>								
									
										
									
										
									</div>
									<!-- <input type="submit" name="absen" class="btn btn-info"> -->
									<center>
										<button type="submit" name="absen" class="btn btn-success">
										<i class="fa fa-check"></i> Selesai
									</button>

									<a href="?page=absen&act=update&pelajaran=<?=$_GET['pelajaran']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Update Absensi</a>

								<!-- 	<a href="index.php" class="btn btn-default"><i class="fas fa-arrow-circle-left"></i> Kembali</a> -->

									</center>
								</div>
								</form>
								<?php 
									if (isset($_POST['absen'])) {
										
										$total = $jumlahSiswa-1;
										$hari = $_POST['tgl'];
										$today = $_POST['tgl'];
										$pertemuan = $_POST['pertemuan'];

										for ($i =0; $i <=$total ; $i++) {

											$id_siswa = $_POST['id_siswa-'.$i];
											$pelajaran = $_POST['pelajaran'];
											$ket = $_POST['ket-'.$i];


											$cekAbsesnHariIni = mysqli_num_rows(mysqli_query($con,"SELECT * FROM _logabsensi WHERE tgl_absen='$hari' AND id_mengajar='$pelajaran' AND id_siswa='$id_siswa' "));

											if ($cekAbsesnHariIni > 0) {


													echo "
													<script type='text/javascript'>
													setTimeout(function () { 

													swal('Sorry!', 'Absen Hari ini sudah dilakukan', {
													icon : 'error',
													buttons: {        			
													confirm: {
													className : 'btn btn-danger'
													}
													},
													});    
													},10);  
													window.setTimeout(function(){ 
													window.location.replace('index.php');
													} ,3000);   
													</script>";
							
											}else{

												$insert = mysqli_query($con,"INSERT INTO _logabsensi VALUES (NULL,'$pelajaran','$id_siswa','$today','$ket','$pertemuan')");

										if ($insert) {


											echo "
											<script type='text/javascript'>
											setTimeout(function () { 

											swal('Berhasil', 'Absen hari ini telah tersimpan!', {
											icon : 'success',
											buttons: {        			
											confirm: {
											className : 'btn btn-success'
											}
											},
											});    
											},10);  
											window.setTimeout(function(){ 
											window.location.replace('?page=absen&pelajaran=$d[id_mengajar]&bulan=$bulan&kelas=$d[id_mkelas]');
											} ,3000);   
											</script>";
											}
										}											
										}
									}
								 ?> 
							</div>
						</div>
					</div>
				</div>

					