<?php
$time = time();
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: attachment; filename=DAFTAR-HADIR-$time.xls");
?>
<?php 
include '../../../config/db.php';
 ?>
<style>
td.rotate {
    transform:
        /*nomor magic*/
        translate(1px, 1px) rotate(270deg);
    /*width: 3px;*/
    padding: 0px;
    word-spacing: none;
    white-space: nowrap;
    /*	padding:0px;
		white-space: nowrap;
		position: absolute;
		height: 40px;
		-webkit-transform: rotate(270deg);
		-moz-transform: rotate(270deg);
		-ms-transform: rotate(270deg);
		-o-transform: rotate(270deg);
		transform: rotate(270deg);*/

    /*transform: 
		translate(0px,0px)
		rotate(270deg);
		padding: 0px;
		word-spacing:none;
		white-space: nowrap;*/
}
</style>
<?php 
// tampilkan data mengajar
$kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 
	INNER JOIN tb_guru ON tb_mengajar.id_guru=tb_guru.id_guru

INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1  ");

foreach ($kelasMengajar as $d) 




	// tampilkan data absen

$qry = mysqli_query($con,"SELECT * FROM _logabsensi 
INNER JOIN tb_siswa ON _logabsensi.id_siswa=tb_siswa.id_siswa
INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1
	 GROUP BY _logabsensi.id_siswa  ORDER BY _logabsensi.id_siswa ASC  ");


	// tampilkan data walikelas
$walikelas = mysqli_query($con,"SELECT * FROM tb_walikelas INNER JOIN tb_guru ON tb_walikelas.id_guru=tb_guru.id_guru WHERE tb_walikelas.id_mkelas='$_GET[kelas]' ");
foreach ($walikelas as $walas) 

$tglTerakhir = 25;


 ?>
<style>
body {
    font-family: arial;
}
</style>
<table width="80%">
    <tr>
        <td>
            <img src="../../../assets/img/muhammadiyah.png" width="100">
        </td>
        <td>
            <center>

                <h1>
                    ABSENSI SISWA <br>
                    <small> SMP Muhammadiyah 7 Palembang</small>
                </h1>
                <hr>
                <em>
                    Jl. Urip Sumoharjo, 2 Ilir, Kec. Ilir Tim. II, Kota Palembang, Sumatera Selatan 30118
                    <b>AKREDITASI A</b> <br>
                </em>

            </center>
        </td>
        <td>

            <table width="190%">
                <tr>
                    <td colspan="2"><b style="border: 2px solid;padding: 7px;">
                            KELAS ( <?=strtoupper($d['nama_kelas']) ?> )
                        </b> </td>
                    <td>
                        <b style="border: 2px solid;padding: 7px;">
                            <?=$d['semester'] ?> |
                            <?=$d['tahun_ajaran'] ?>
                        </b>
                    </td>

                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Nama Guru </td>
                    <td>:</td>
                    <td><?=$d['nama_guru'] ?></td>
                </tr>
                <tr>
                    <td>Mata Pelajaran </td>
                    <td>:</td>
                    <td><?=$d['mapel'] ?></td>
                </tr>
                <tr>
                    <td>Wali Kelas </td>
                    <td>:</td>
                    <td><?=$walas['nama_guru'] ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<hr style="height: 3px;border: 1px solid;">


<table width="100%" border="1" cellpadding="2" style="border-collapse: collapse;">
    <tr>
        <td rowspan="2" bgcolor="#EFEBE9" align="center">NO</td>
        <td rowspan="2" bgcolor="#EFEBE9" align="center">NIS</td>
        <td rowspan="2" bgcolor="#EFEBE9" align="center">NAMA SISWA</td>
        <td rowspan="2" bgcolor="#EFEBE9" align="center">L/P</td>
        <td colspan="3" style="padding: 8px;" align="center"><b></b>JUMLAH</td>
    </tr>
    <tr>

        <td bgcolor="#FFC107" align="center">S</td>
        <td bgcolor="#4CAF50" align="center">I</td>
        <td bgcolor="#B22222" align="center">A</td>

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

        </td>

        <?php



		?>
        <td align="center" style="font-weight: bold;">
            <?php 
$sakit = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS sakit FROM _logabsensi
	INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
 WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='S' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
echo $sakit['sakit'];

?>
        </td>
        <td align="center" style="font-weight: bold;">
            <?php 
$izin = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS izin FROM _logabsensi
	INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
 WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='I' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
echo $izin['izin'];

?>
        </td align="center" style="font-weight: bold;">

        <td align="center" style="font-weight: bold;">
            <?php 
$alfa = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS alfa FROM _logabsensi
	INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
 WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='A' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
echo $alfa['alfa'];

?>
        </td>

    </tr>

    <?php } ?>

    </tr>

</table>

<p></p>
<table width="100%">
    <tr>
        <!-- 	<td align="left">
			<p>
				Mengetahui
			</p>
			<p>
				Kepala Sekolah
				<br>
				<br>
				<br>
				<br>
				<br>
				-----------------------------
			</p>
		</td> -->
        <td align="right">
            <p>
                Palembang, <?php echo date('d-F-Y'); ?>
            </p>
            <p>
                Kepala Sekolah
                <br>
                <br>
                <br>
                <br>
                <br>
                Afrizal, S.pd <br>
                ----------------------<br>
                NBM : 866118
            </p>
        </td>
    </tr>
</table>

<script>
window.print();
</script>