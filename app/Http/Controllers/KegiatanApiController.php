<?php

namespace App\Http\Controllers;

use App\Http\Requests\KegiatanCreateRequest;
use App\Http\Resources\KegiatanResource;
use App\Models\Kegiatan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanApiController extends Controller
{
    public function create(KegiatanCreateRequest $request):JsonResponse
    {

        $data = $request->validated();
        $user = Auth::user();
        $kegiatan = new Kegiatan($data);
        //user_id(kegiatan) = user->id(user)
        $kegiatan->user_id = $user->id;
        $kegiatan->save();
        return (new KegiatanResource($kegiatan))->response()->setStatusCode(201);

    }


}
