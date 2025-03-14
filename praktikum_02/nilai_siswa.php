<?php
   $proses = isset( $_['proses']) ? $_GET['proses']: "";
   $proses = isset( $_POST['proses']) ? $_POST['proses']: "";
   $nama_siswa = isset( $_POST['nama']) ? $_POST['nama']: "";
   $mata_kuliah = isset( $_POST['matkul']) ? $_POST['matkul']: "";
   $nilai_uts = isset($_POST['nilai_uts']) ? floatval($_POST['nilai_uts']) : 0;
   $nilai_uas = isset($_POST['nilai_uas']) ? floatval($_POST['nilai_uas']) : 0;
   $nilai_tugas = isset($_POST['nilai_tugas']) ? floatval($_POST['nilai_tugas']) : 0;

   $nilai_akhir = ($nilai_uts * 0.3) + ($nilai_uas * 0.35) + ($nilai_tugas * 0.35);

if ($nilai_akhir > 55) {
    $status = "Lulus";
} else {
    $status = "Tidak Lulus";
}

if ($nilai_akhir >= 85 && $nilai_akhir <= 100) {
    $grade = "A";
} elseif ($nilai_akhir >= 70) {
    $grade = "B";
} elseif ($nilai_akhir >= 56) {
    $grade = "C";
} elseif ($nilai_akhir >= 36) {
    $grade = "D";
} elseif ($nilai_akhir >= 0) {
    $grade = "E";
} else {
    $grade = "I";
}

switch ($grade) {
    case "A":
        $predikat = "Sangat Memuaskan";
        break;
    case "B":
        $predikat = "Memuaskan";
        break;
    case "C":
        $predikat = "Cukup";
        break;
    case "D":
        $predikat = "Kurang";
        break;
    case "E":
        $predikat = "Sangat Kurang";
        break;
    default:
        $predikat = "Tidak Ada"; // Untuk nilai di luar rentang
}
   
   if(!empty($proses)) {
    echo 'proses : '. $proses;
    echo '<br/> Nama : '. $nama_siswa;
    echo '<br/> Mata Kuliah : '. $mata_kuliah;
    echo '<br/> Nilai UTS : '. $nilai_uts;
    echo '<br/> Nilai UAS : '. $nilai_uas;
    echo '<br/> Nilai Tugas Praktikum : '. $nilai_tugas;
    echo '<br/><strong>Nilai Akhir : ' . $nilai_akhir . '</strong>';
    echo '<br/><strong>Status : ' . $status . '</strong>';
    echo '<br/><strong>Grade : ' . $grade . '</strong>';
    echo '<br/><strong>Predikat : ' . $predikat . '</strong>';

}
 ?>