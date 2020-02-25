<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        ini_set('upload_max_filesize', '300M');
        ini_set('post_max_size', '350M');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        return view('videos.index', compact('user'));
    }

    public function upload(Request $request)
    {

        $user = Auth::user();

        $content = $request->content;

        $name=$request->file('video')->getClientOriginalName();
        $file = explode(".", $name);

        $extension = end($file);

        $attach_extensions = array("pdf", "txt", "doc", "odp", "docx", "xlsx", "pub", "csv", "pptx", "zip", "rar");

        if (in_array($extension, $attach_extensions)) { //this means a document file
            $path = $request->file('video')->storeAs('public/attachments',$name);
            $post = new Post();
            $post->user_id = $user->id;
            $post->has_video = 0;
            $post->has_image = 1;
            $post->has_attachment = 1;
            $post->group_id = 0;
            if ($content) {
                $post->content = $content;
            }
            $post->save();

            $post_image = new PostImage();
            $post_image->post_id = $post->id;
            $post_image->image_path = basename($path);
            $post_image->save();

            return response()->json([
                "code" => 200,
                "path" => basename($path),
                "content" => $content,
            ]);
        } else {
            $path = $request->file('video')->storeAs('public/videos',$name);
            $post = new Post();
            $post->user_id = $user->id;
            $post->has_video = 1;
            $post->has_image = 1;
            $post->has_attachment = 0;
            $post->group_id = 0;

            if ($content) {
                $post->content = $content;
            }

            $post->save();

            $post_image = new PostImage();
            $post_image->post_id = $post->id;
            $post_image->image_path = basename($path);
            $post_image->save();

            return response()->json([
                "code" => 200,
                "path" => basename($path),
                "content" => $content,
            ]);
        }

    }

    public function getFile(Request $request){
        
    }

}
