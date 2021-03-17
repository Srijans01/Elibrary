<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\User;
use Auth;
use DB;

class FormController extends Controller
{
    public function addBook()
    {
        return view('addbook');
    }

    public function storeBook(Request $request)
    {

        $title=$request->title;
        $author=$request->author;
        $description=$request->description;
        $link=$request->link;
        $image=$request->file('file');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $book=new Form();
        $book->title=$title;
        $book->author=$author;
        $book->description = $description;
        $book->link = $link;
        $book->profilephoto = $imageName;
        $book->save();
        return back()->with('Book_added','Book has been added');
    }

    

    public function showBook()
    {
        $forms = Form::all();

        return view('showbook',compact('forms'))->withErrors(['Duplicate Record.']);
    }

    public function showUser()
    {
        $forms =User::all();

        return view('showuser',compact('forms'))->withErrors(['Duplicate Record.']);
    }

    public function makeAdmin($id)
    {
        $user_id=DB::table('users')
        ->where('id', $id)
        ->update(['role' => 'admin']);

        return back()->with('Book_added','Book has been added');
    }

    public function removeAdmin($id)
    {
        $user_id=DB::table('users')
        ->where('id', $id)
        ->update(['role' => 'user']);

        return back()->with('Book_added','Book has been added');
    }

    public function editBook($id)
    {
        $forme = Form::find($id);

        return view('editBook',compact('forme'));
    }

    public function readmBook($id)
    {
        $forme = Form::find($id);

        return view('readmBook',compact('forme'));
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
    
    public function addToCart(Request $request)
    {
        $cart=session()->get('cart');
        if(!$cart)
        {
            $cart=[
                $request->id=>[
                    'title'=>$request->title,
                    'author'=>$request->author,
                    'description'=>$request->description,

                ]
            ];
        }
    }

}
