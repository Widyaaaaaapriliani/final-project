<?php

namespace App\Http\Controllers;

use App\Models\Input;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NilaiController extends Controller
{
  public function index()
  {
    return view('inputnilai');
  }

  public function index2()
  {
    $input = Input::all();
    return view('nilaihasil', compact('input'));
  }

  public function store(Request $request)
  {
    // Retrieve input values
    $kehadiran = $request->input('kehadiran');
    $tugas1    = $request->input('tugas1');
    $tugas2    = $request->input('tugas2');
    $tugas3    = $request->input('tugas3');
    $tugas4    = $request->input('tugas4');
    $tugas5    = $request->input('tugas5');
    $tugas6    = $request->input('tugas6');
    $respon1   = $request->input('respon1');
    $respon2   = $request->input('respon2');
    $respon3   = $request->input('respon3');
    $respon4   = $request->input('respon4');
    $respon5   = $request->input('respon5');

    // Calculate the weighted score for each "respon" value
    $respon1_score = $respon1 * 0.05;  // 5% of respon1
    $respon2_score = $respon2 * 0.05;  // 5% of respon2
    $respon3_score = $respon3 * 0.1;  // 10% of respon3
    $respon4_score = $respon4 * 0.15;  // 15% of respon4
    $respon5_score = $respon5 * 0.15;  // 15% of respon5

    // Calculate the total for the tugas fields (sum of tugas1 to tugas6)
    $tugas_total = $tugas1 + $tugas2 + $tugas3 + $tugas4 + $tugas5 + $tugas6;

    $project_total = $respon1_score + $respon2_score + $respon3_score + $respon4_score + $respon5_score;

    // Calculate the weighted score for the tugas (30% of total tugas score)
    $tugas_score = $tugas_total * 0.3;

    // Calculate the weighted score for kehadiran (20% of kehadiran score)
    $kehadiran_score = $kehadiran * 0.2;

    // Sum the total score from kehadiran, tugas, and respon values
    $total_score = $kehadiran_score + $tugas_score + $project_total;

    // Determine the letter grade based on the total score
    $huruf = '';
    if ($total_score >= 85) {
      $huruf = 'A';
    } elseif ($total_score >= 70) {
      $huruf = 'B';
    } elseif ($total_score >= 55) {
      $huruf = 'C';
    } elseif ($total_score >= 40) {
      $huruf = 'D';
    } else {
      $huruf = 'E';
    }

    Input::create([
      'kehadiran' => $kehadiran,
      'tugas'     => $tugas_total,
      'project'   => $project_total,
      'total'     => $total_score,
      'huruf'     => $huruf,
    ]);

    return redirect()->route('hasil')->with('success', 'Data berhasil disimpan.');
  }
}
