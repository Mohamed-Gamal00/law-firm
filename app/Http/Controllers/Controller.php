<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // hande uploads fiels
    protected function uploadImage(Request $request, $imagefolder, $fieldName)
    {
        return Storage::putFile($imagefolder, $request->file($fieldName));
    }
}
