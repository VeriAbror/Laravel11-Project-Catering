<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function snackbox()
    {
        return view('menu.snackbox');  // Menampilkan view snackbox.blade.php
    }

    public function snack()
    {
        return view('menu.snack');  // Menampilkan view snack.blade.php
    }

    public function nasibox()
    {
        return view('menu.nasibox');  // Menampilkan view nasibox.blade.php
    }

    public function kue_kering()
    {
        return view('menu.kue_kering');  // Menampilkan view kue_kering.blade.php
    }

    public function tumpeng()
    {
        return view('menu.tumpeng');  // Menampilkan view tumpeng.blade.php
    }

    public function omset()
    {
        return view('omset.menu-chart');  // Menampilkan view tumpeng.blade.php
    }

    public function chart()
    {
        return view('omset.chart');  // Menampilkan view tumpeng.blade.php
    }
}
