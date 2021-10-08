<?php


namespace App\Repositories;
use App\Interfaces\BlogInterface;
use App\Models\Blog;
use DB;
class BlogRepository extends BaseRepository implements BlogInterface
{
    
    public function __construct(){
       
    }

    public function find($id){
    	return Blog::with('comments','comments.replys')->find($id);
	}

    public function all(){
    	return Blog::all();
	}

    public function create(object $data){
    	DB::beginTransaction();
        try {
        	if($data->banner){
        		$directory = 'blog';
        		$file = $data->banner;
        		$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'_'.rand(1000000,9999999);
		        $extension = $file->getClientOriginalExtension();
		        $name = $filename.'.'.$extension;
		        \Storage::disk('local')->put('/public/images/'.$directory.'/'.$name,$file->get());
		        $path = 'images/'.$directory.'/'.$name;

		        $data['image'] = $path;
        	}
        	$blog = Blog::create($data->all());
    		DB::commit();
		} catch (\Exception $e) {
		   return redirect()->back()->withInput()->with('error', $e->getMessage());
		}
    }

    public function update($id, object $data){
		$blog = Blog::find($id);
    	DB::beginTransaction();
        try {
        	if($data->banner){
        		@unlink('storage/'.@$blog->image);
        		$directory = 'blog';
        		$file = $data->banner;
        		$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'_'.rand(1000000,9999999);
		        $extension = $file->getClientOriginalExtension();
		        $name = $filename.'.'.$extension;
		        \Storage::disk('local')->put('/public/images/'.$directory.'/'.$name,$file->get());
		        $path = 'images/'.$directory.'/'.$name;

		        $data['image'] = $path;
        	}
    		$blog->update($data->all());
    		DB::commit();
		} catch (\Exception $e) {
		   return redirect()->back()->withInput()->with('error', $e->getMessage());
		}
	}

    public function delete($id){
    	 $blog = Blog::find($id);
    	 @unlink('storage/'.@$blog->image);
    	return $blog->delete();
	}
}
