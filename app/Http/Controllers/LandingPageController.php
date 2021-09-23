<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;

class LandingPageController extends Controller
{

    public function __construct()
    {
        $this->ProdukModel = new ProdukModel();
    }

    public function index(){

        $data = [
            'title' => 'Cemilan Wara-Wiri',
            'produk' => $this->ProdukModel->allData(),
];



        return view('template', $data );
    }




}
