<?php
/**
 * Created by lvntayn
 * Date: 04/06/2017
 * Time: 17:23
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{

    protected $table = 'post_images';

    public $timestamps = false;


    public function getURL(){
        return url('storage/uploads/posts/'.$this->image_path);
    }

    public function getVideoURL(){
        return url('storage/videos/'.$this->image_path);
    }

    public function getAttachment(){
        return url('storage/attachments/'.$this->image_path);
    }

}