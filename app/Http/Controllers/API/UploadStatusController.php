<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormmater;
use App\Http\Controllers\Controller;
use App\Models\UploadStatus;
use Illuminate\Http\Request;

class UploadStatusController extends Controller
{
    public function uploadStatus(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 10);

        if($id)
        {
            $uploadStatus = UploadStatus::find($id);

            if($uploadStatus)
            {
                return ResponseFormmater::success(
                    $uploadStatus,
                    'Data upload status berhasil diambil'
                );
            }

            else {
                return ResponseFormmater::error(
                    null,
                    'Data upload status tidak ditemukan',
                );
            }
        }

        $uploadStatus = UploadStatus::query();
        return ResponseFormmater::success(
            $uploadStatus->paginate($limit),
            'Data upload status berhasil diambil'
        );
    }
}
