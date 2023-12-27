<?php

namespace App\Http\Controllers;

use App\Http\Requests\KegiatanCreateRequest;
use App\Http\Requests\KegiatanUpdateRequest;
use App\Http\Resources\KegiatanCollection;
use App\Http\Resources\KegiatanResource;
use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanApiController extends Controller
{

    private function getKegiatan(int $id): Kegiatan
    {
        $user = $this->getAuthUser();
        $kegiatan = Kegiatan::where('id', $id)->where('user_id', $user->id)->first();
        if(!$kegiatan)
        {
            throw new HttpResponseException(response()->json([
                "errors" => [
                    "message" => [
                        "Not Found"
                    ]
                ]
            ])->setStatusCode(404));
        }

        return $kegiatan;
    }

    private function getAuthUser():User
    {
           return Auth::user();

    }
   public function dataBydateRange($starDate, $endDate)
   {
     $user = $this->getAuthUser();
     $kegiatan = Kegiatan::where('user_id', $user->id)->whereBetween('created_at', [$starDate, $endDate])->get();
     if(!$kegiatan)
     {
         throw new HttpResponseException(response()->json([
             "errors" => [
                 "message" => [
                     "Not Found"
                 ]
             ]
         ])->setStatusCode(404));

     }
     return $kegiatan;
   }

    public function create(KegiatanCreateRequest $request):JsonResponse
    {

        $data = $request->validated();
        $user = $this->getAuthUser();
        $kegiatan = new Kegiatan($data);
        //user_id(kegiatan) = user->id(user)
        $kegiatan->user_id = $user->id;
        $kegiatan->save();
        return (new KegiatanResource($kegiatan))->response()->setStatusCode(201);

    }

    public function update(KegiatanUpdateRequest $request, int $id): KegiatanResource
    {
            $data = $request->validated();
            $kegiatan = $this->getKegiatan($id);
            $kegiatan->fill($data);
            $kegiatan->save();
            return new KegiatanResource($kegiatan);
    }


    public function remove(int $id)
    {
            $kegiatan = $this->getKegiatan($id);
            $kegiatan->delete();
            return response()->json([
                "data" => true
            ])->setStatusCode(200);
    }


    public function search(Request $request):KegiatanCollection
    {
         $user = $this->getAuthUser();
         $page = $request->input('page', 1);
         $size = $request->input('size', 10);

         $kegiatan = Kegiatan::where('user_id', $user->id);
         $kegiatan = $kegiatan->where(function (Builder $builder) use ($request)
         {
                $nagari = $request->input('nagari');
                if($nagari)
                {
                    $builder->where('nagari_kunjungan', 'like', '%' . $nagari . '%');
                }
                //do something here, to add search by another column
         });


         $kegiatan =  $kegiatan->paginate(perPage: $size, page: $page);

         return new KegiatanCollection($kegiatan);
    }

    public function latest(Request $request) :KegiatanCollection{
        $user = $this->getAuthUser();
        $page = $request->input('page', 1);
        $size = $request->input('size', 10);
        $kegiatan = Kegiatan::where('user_id', $user->id)->orderBy('id', 'desc');

        $kegiatan =  $kegiatan->paginate(perPage: $size, page: $page);
         return new KegiatanCollection($kegiatan);
    }

    public function filterBydate(Request $request) :KegiatanCollection
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $kegiatan = $this->dataBydateRange($startDate, $endDate);
        return new KegiatanCollection($kegiatan);

    }


}
