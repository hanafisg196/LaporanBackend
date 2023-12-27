<?php

namespace App\Services\Impl;

use App\Models\Kegiatan;
use App\Services\DashboardServices;

class DahsboardServiceImpl implements DashboardServices {

    public function getDataKegitanList()
    {
        return Kegiatan::paginate(10);
    }
}

