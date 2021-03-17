<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Form;
use App\Models\Wish;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class WishController extends Controller
{

    public function storeBookWish($id)
    {
        
        $user_id=Auth::user();
        $forms = $user_id->orders;
        $forme = Form::find($id);
        $user = User::find(1);     
        $wish = new Wish();
        $wish->title = $forme->title;
        $wish->author = $forme->author;
        $wish->link = $forme->link;
        $wish->description = $forme->description;
        $wish->profilephoto = $forme->profilephoto;
        $wish->user_id=Auth::id();
        $wish->save();
        return back()->with('Book_wish','Book has been added to wishlist!');
    }

    public function showBookWish()
    {
        $user_id=Auth::user();
        $forms = $user_id->wishes;
        return view('showbookwish',compact('forms','user_id'))->with('user_id',$user_id);
    }


    public function editBook($id)
    {
        $forme = Form::find($id);

        return view('editBook',compact('forme'));
    }

    public function readBook($id)
    {
        $formr = Form::find($id);

        return view('readBook',compact('formr'));
    }

    public function updateBook(Request $request)
    {

        $title=$request->title;
        $author=$request->author;
        $description=$request->description;
        $link=$request->link;
        $image=$request->file('file');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $book=Form::find($request->id);
        $book->title=$title;
        $book->author=$author;
        $book->description = $description;
        $book->link = $link;
        $book->profilephoto = $imageName;
        $book->save();
        return back()->with('Book_updated','Book has been updated successfully!');

    }

    public function deleteBook($id)
    {
        $formd = Form::find($id);
        unlink(public_path('images').'/'.$formd->profilephoto);
        $formd->delete();
        return back()->with('Book_deleted','Book has been deleted successfully!');
    }

}
