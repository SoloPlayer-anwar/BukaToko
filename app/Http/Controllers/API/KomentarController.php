<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormmater;
use App\Http\Controllers\Controller;
use App\Models\Komentar;
use Exception;
use Illuminate\Http\Request;

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
            'photo_comment' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $komentar = Komentar::create([
            'name_comment' => $request->name_comment,
            'status_comment' => $request->status_comment,
            'category' => $request->category,
            'rate_comment' => $request->rate_comment,
            'comment' => $request->comment,
            'comment_admin' => $request->comment_admin,
            'product_id' => $request->product_id,
            'photo_comment' => $request->photo_comment
        ]);


        $komentar = Komentar::with(['product'])->find($komentar->id);

        if($request->file('photo_comment')->isValid()) {
            $photoComment = $request->file('photo_comment');
            $extesions = $photoComment->getClientOriginalExtension();
            $komentarPhoto = "komentar-photo-comment/".date('YmdHis').".".$extesions;
            $uploadPath = env('UPLOAD_PATH')."/komentar-photo-comment";
            $request->file('photo_comment')->move($uploadPath, $komentarPhoto);
            $komentar['photo_comment'] = $komentarPhoto;
        }

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

}
