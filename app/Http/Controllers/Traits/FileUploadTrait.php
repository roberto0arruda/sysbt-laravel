<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

trait FileUploadTrait
{
    /**
     * File upload trait used in controllers to upload files
     */
    public function saveFiles(Request $request, $path)
    {
        $uploadPath = storage_path('app/public')."/{$path}";

        $finalRequest = $request;

        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {
                if ($request->has($key . '_max_width') && $request->has($key . '_max_height')) {
                    // Check file width
                    $fileName = time() . '-' . $request->file($key)->getClientOriginalName();
                    $file     = $request->file($key);
                    $image    = Image::make($file);

                    $width  = $image->width();
                    $height = $image->height();

                    if ($width > $request->{$key . '_max_width'} && $height > $request->{$key . '_max_height'}) {
                        $image->resize($request->{$key . '_max_width'}, $request->{$key . '_max_height'});
                    } elseif ($width > $request->{$key . '_max_width'}) {
                        $image->resize($request->{$key . '_max_width'}, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    } elseif ($height > $request->{$key . '_max_height'}) {
                        $image->resize(null, $request->{$key . '_max_height'}, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }

                    $image->save($uploadPath . '/' . $fileName);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $fileName]));
                } else {
                    $fileName = time() . '-' . $request->file($key)->getClientOriginalName();
                    $request->file($key)->storeAs($path, $fileName);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $fileName]));
                }
            }
        }

        return $finalRequest;
    }
}
