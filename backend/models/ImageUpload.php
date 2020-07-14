<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg']
        ];
    }

    public function uploadFile(UploadedFile $file, $id, $catalogPath, $catalog)
    {


        self::folderCreate($catalogPath, $id);

        $file->saveAs($catalogPath.'/p-'.$id.'/'.$file->name);

        return '/img/'.$catalog.'/p-'.$id.'/'.$file->name;
    }

    public function folderCreate($path, $id)
    {
        if(!file_exists ( $path.'/p-'.$id) )
        {

			mkdir($path.'/p-'.$id, 0775);

        }

    }
    public static function deleteFolder($path, $id)
    {

        $dir = $path.'/p-'.$id;
        if(file_exists ($path.'/p-'.$id) )
        {
            $files = scandir($dir);
            for ($i=2; $i < count($files); $i++) {
                if(file_exists( $dir.'/'.$files[$i] ) )
                {
                    unlink($dir.'/'.$files[$i]);
                }
            }
            rmdir($dir);
            return true;
        }
            return false;
    }

}
