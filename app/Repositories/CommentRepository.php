<?php


namespace App\Repositories;
use App\Interfaces\CommentInterface;
use App\Models\Comment;
use DB;
class CommentRepository extends BaseRepository implements CommentInterface
{
    
    public function __construct(){
       
    }

    public function find($id){
    	return Comment::find($id);
	}

    public function all(){
	}

    public function create(object $data){
    	DB::beginTransaction();
        try {
        	$comment = Comment::create($data->all());
    		DB::commit();
            return $comment;
		} catch (\Exception $e) {
		   return $e->getMessage();
		}
    }

    public function update($id, object $data){
		
	}

    public function delete($id){
    	
	}
}
