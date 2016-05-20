<?php

namespace App\Controllers;

use App\Models\Comment;

class CommentsController extends Controller
{
    public function create()
    {
        $input = $_POST;
       
        $input['user_id'] = static::$auth->user()->id;

        $newcomment = new Comment($input);

        if( ! $newcomment->isValid()){
        	$_SESSION['comment.form'] = $newcomment;
        	header("Location:.\?page=listing&id=" . $newcomment->listing_id);
        	exit();
        }

        $newcomment->save();
        header("Location: ./?page=listing&id=" . $newcomment->listing_id . "#comment-" . $newcomment->id);
    }
}