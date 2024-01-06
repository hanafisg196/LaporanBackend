<?php

namespace App\Http\Controllers;

use App\Services\DashboardServices;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private DashboardServices $dashboardServices;
    public function __construct(DashboardServices $dashboardServices)
    {
        $this->dashboardServices = $dashboardServices;
    }
        public function index()
        {
                return response()->view("kegiatan.dashboard");
        }

        public function getData()
        {
           $data = $this->dashboardServices->getDataKegitanList();

           return response()->view('kegiatan.listkegiatan',[
                "data" => $data
           ]);
        }
}
