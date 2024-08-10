<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class ImageController extends Controller
{
    public function imageCrop(){
        return view("imageUpload");
    }
    public function upload()
    {
        $request = $this->request->getJSON();

        // Decode the base64 image
        $base64Image = $request->image;
        $base64Image = str_replace('data:image/png;base64,', '', $base64Image);
        $base64Image = str_replace(' ', '+', $base64Image);
        $image = base64_decode($base64Image);

        // Define the path to save the image
        $imageName = uniqid() . '.png';
        $path = WRITEPATH . 'uploads/' . $imageName;

        // Save the image to the specified path
        file_put_contents($path, $image);

        // Return a response
        return $this->response->setJSON(['success' => true, 'image' => $imageName]);
    }
}
