<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropController extends Controller
{
    public function FeatureCropImage(Request $request)
    {
        $image = $request->file('image');
        $imageName = time() . $image->getClientOriginalName();
        $imageExtention = $image->extension();
        $fullImageName = $imageName . "." . $imageExtention;
        $imagePath = $image->storeAs("public/AdminPanel/assets/Features", $fullImageName);

        if ($imagePath) {
            return response()->json([
                'status' => 1,
                'msg' => $fullImageName
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Error storing image'
            ]);
        }
    }

    public function ProjectCropImage(Request $request)
    {
        $image = $request->file('image');
        $imageName = time() . $image->getClientOriginalName();
        $imageExtention = $image->extension();
        $fullImageName = $imageName . "." . $imageExtention;
        $imagePath = $image->storeAs("public/AdminPanel/assets/Projects", $fullImageName);

        if ($imagePath) {
            return response()->json([
                'status' => 1,
                'msg' => $fullImageName
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Error storing image'
            ]);
        }
    }

    public function ServiceCropImage(Request $request)
    {
        $image = $request->file('image');
        $imageName = time() . $image->getClientOriginalName();
        $imageExtention = $image->extension();
        $fullImageName = $imageName . "." . $imageExtention;
        $imagePath = $image->storeAs("public/AdminPanel/assets/Services", $fullImageName);

        if ($imagePath) {
            return response()->json([
                'status' => 1,
                'msg' => $fullImageName
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Error storing image'
            ]);
        }
    }

    public function TestimonialCropImage(Request $request)
    {
        $image = $request->file('image');
        $imageName = time() . $image->getClientOriginalName();
        $imageExtention = $image->extension();
        $fullImageName = $imageName . "." . $imageExtention;
        $imagePath = $image->storeAs("public/AdminPanel/assets/Testimonial", $fullImageName);

        if ($imagePath) {
            return response()->json([
                'status' => 1,
                'msg' => $fullImageName
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Error storing image'
            ]);
        }
    }

    public function TeamCropImage(Request $request)
    {
        $image = $request->file('image');
        $imageName = time() . $image->getClientOriginalName();
        $imageExtention = $image->extension();
        $fullImageName = $imageName . "." . $imageExtention;
        $imagePath = $image->storeAs("public/AdminPanel/assets/TeamMembers", $fullImageName);

        if ($imagePath) {
            return response()->json([
                'status' => 1,
                'msg' => $fullImageName
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Error storing image'
            ]);
        }
    }
}
