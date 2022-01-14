<?php
function rupiah($angka){
    $hasil_rupiah = "" . number_format($angka,0,',','.');
    return $hasil_rupiah;
}

function planoPaperBag($panjang, $lebar, $tinggi) {

    // title
    $lipatan_bawah = $tinggi - 2;
    $lipatan_atas = $lipatan_bawah * 0.5;
    $lipatan_lem = $lipatan_atas;

    // ukuran plat
    $plat_lebar = $lipatan_atas + $lebar + $lipatan_bawah;
    $plat_panjang = 2 * ($panjang + $tinggi) + $lipatan_lem;


    // ukuran plano kecil
    $plano_panjang_1 = 100;
    $plano_lebar_1 = 65;

    // hitung plano kecil
        // lebar x panjang (standar)
        $hitung_lebar_plat_lebar_plano_kecil = $plano_lebar_1 / $plat_lebar;
        $hitung_panjang_plat_panjang_plano_kecil = $plano_panjang_1 / $plat_panjang;
        // hasil
        $hasil_1 = floor($hitung_lebar_plat_lebar_plano_kecil) * floor($hitung_panjang_plat_panjang_plano_kecil);

        // lebar x panjang (di tukar)
        $hitung_lebar_plat_panjang_plano_kecil = $plano_lebar_1 / $plat_panjang;
        $hitung_panjang_plat_lebar_plano_kecil = $plano_panjang_1 / $plat_lebar;
        // hasil
        $hasil_2 = floor($hitung_lebar_plat_panjang_plano_kecil) * floor($hitung_panjang_plat_lebar_plano_kecil);


    // ukuran plano besar
    $plano_panjang_2 = 109;
    $plano_lebar_2 = 79;

    // hitung plano besar
        // lebar x panjang (standar)
        $hitung_lebar_plat_lebar_plano_besar = $plano_lebar_2 / $plat_lebar;
        $hitung_panjang_plat_panjang_plano_besar = $plano_panjang_2 / $plat_panjang;
        // hasil
        $hasil_3 = floor($hitung_lebar_plat_lebar_plano_besar) * floor($hitung_panjang_plat_panjang_plano_besar);

        // lebar x panjang (di tukar)
        $hitung_lebar_plat_panjang_plano_besar = $plano_lebar_2 / $plat_panjang;
        $hitung_panjang_plat_lebar_plano_besar = $plano_panjang_2 / $plat_lebar;
        // hasil
        $hasil_4 = floor($hitung_lebar_plat_panjang_plano_besar) * floor($hitung_panjang_plat_lebar_plano_besar);

    // result
    $array = array(1 => $hasil_1, 2 => $hasil_2, 3 => $hasil_3, 4 => $hasil_4);
    $maxValue = max($array);
    $maxIndex = array_search(max($array), $array);

    if ($maxIndex == 1 || $maxIndex == 2) {
        $maxx = "Plano Kecil";
    }
    if ($maxIndex == 3 || $maxIndex == 4) {
        $maxx = "Plano Besar";
    }

    return $maxx . "," . $maxValue;
}
?>
