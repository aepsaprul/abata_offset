<?php
function rupiah($angka){
    $hasil_rupiah = "" . number_format($angka,0,',','.');
    return $hasil_rupiah;
}
?>
