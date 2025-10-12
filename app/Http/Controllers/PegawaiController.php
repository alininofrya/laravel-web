<?php

namespace App\Http\Controllers;

class PegawaiController extends Controller
{
    public function index()
    {
        
        $name = "Alini Nofry Ananta";

        $tanggal_lahir = date_create('2005-11-30');
        $sekarang = date_create(date('Y-m-d'));
        $umur = date_diff($tanggal_lahir, $sekarang)->y;

        $hobbies = ["Main Volly", "Main Duo lingo", "Streaming NVL", "Main Game", "Nonton Film"];

        $tgl_harus_wisuda = "2028-10-28";

        $hari_ini = strtotime(date('Y-m-d'));
        $tanggal_wisuda = strtotime($tgl_harus_wisuda);
        $time_to_study_left = round(($tanggal_wisuda - $hari_ini) / (60 * 60 * 24));

        $current_semester = 3;

        if ($current_semester < 3) {
            $motivasi = "Masih Awal, Kejar TAK!";
        } else {
            $motivasi = "Jangan main-main, kurangi main game!";
        }

        $future_goal = "Menjadi Software Engineer profesional";

        return view('halaman-pegawai', [
            'name' => $name,
            'my_age' => $umur,
            'hobbies' => $hobbies,
            'tgl_harus_wisuda' => $tgl_harus_wisuda,
            'time_to_study_left' => $time_to_study_left,
            'current_semester' => $current_semester,
            'motivasi' => $motivasi,
            'future_goal' => $future_goal
        ]);
    }
}
