<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormmater;
use App\Http\Controllers\Controller;
use App\Models\Komentar;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class KomentarController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 10);
        $product_id = $request->input('product_id');


        if($id)
        {
            $komentar = Komentar::with(['product'])->find($id);

            if($komentar)
            {
                return ResponseFormmater::success(
                    $komentar,
                    'Komentar berhasil diambil'
                );
            }

            else {
                return ResponseFormmater::error(
                    null,
                    'Komentar tidak ditemukan',
                    404
                );
            }
        }

        $komentar = Komentar::with(['product']);

        if($product_id)
        {
            $komentar = $komentar->where('product_id', $product_id);
        }


        return ResponseFormmater::success(
            $komentar->paginate($limit),
            'Komentar berhasil diambil'
        );
    }

    public function postKomentar(Request $request)
    {
        $request->validate([
            'name_comment' => 'required|string|max:255',
            'status_comment' => 'required|string|max:255',
            'category' => 'string|max:255',
            'rate_comment' => 'sometimes|numeric',
            'comment' => '',
            'comment_admin' => '',
            'product_id' => 'required|exists:products,id',
        ]);


        $komentar = Komentar::create([
            'name_comment' => $request->name_comment,
            'status_comment' => $request->status_comment,
            'category' => $request->category,
            'rate_comment' => $request->rate_comment,
            'comment' => $request->comment,
            'comment_admin' => $request->comment_admin,
            'product_id' => $request->product_id,
        ]);


        $komentar = Komentar::with(['product'])->find($komentar->id);

        try {
            $komentar->save();
            return ResponseFormmater::success(
                $komentar,
                'Komentar berhasil ditambahkan'
            );
        }

        catch (Exception $error)
        {
            return ResponseFormmater::error(
                $error->getMessage(),
                'Komentar gagal ditambahkan',
                404
            );
        }
    }

    public function uploadKomentar (Request $request) {
      $input = $request->all();
      $komentar = Komentar::find($request->get('id'));

      if(is_null($komentar)) {
        return ResponseFormmater::error(
            null,
            'Data komentar tidak di temukan',
            404
        );
      }

      $validate = Validator::make($input,[
        'photo_comment' => "sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
    ]);

    if($validate->fails()) {
        return ResponseFormmater::error(
            $validate->errors(),
            'Gambar gagal di upload',
            400
        );
    }

        if($request->hasFile('photo_comment')) {
                if($request->file('photo_comment')->isValid()) {
                    Storage::disk('upload')->delete($komentar->photo_comment);
                    $photoComment = $request->file('photo_comment');
                    $extesions = $photoComment->getClientOriginalExtension();
                    $komentarPhoto = "komentar-photo-comment/".date('YmdHis').".".$extesions;
                    $uploadPath = env('UPLOAD_PATH')."/komentar-photo-comment";
                    $request->file('photo_comment')->move($uploadPath, $komentarPhoto);
                    $input['photo_comment'] = $komentarPhoto;
                }
            }

            $komentar->update($input);
            return ResponseFormmater::success(
                $komentar,
                'Gambar berhasil di upload',
                200
            );

    }

}
