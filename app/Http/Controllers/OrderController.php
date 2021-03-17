<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Form;
use App\Models\User;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Session;

class OrderController extends Controller
{

    public function storeBookOrder(Request $request,$id)
    {
        $data = [
            'user_id' => Auth::id(),
        ];
        $validator = Validator::make($data, [
            'user_id' => 'unique:orders',
        ]);
        if ($validator->fails()) {
            return redirect('show-book-order')
                        ->withErrors($validator)
                        ->withInput();
        }
        $user_id=Auth::user();
        $forms = $user_id->orders;
        $forme = Form::find($id);
        $user = User::find(1);      
        $order = new Order();
        $order->title = $forme->title;
        $order->author = $forme->author;
        $order->link = $forme->link;
        $order->description = $forme->description;
        $order->profilephoto = $forme->profilephoto;
        $order->user_id=Auth::id();
        $order->save();
        return back()->with('Book_issued','Book has been issued successfully!');

    }

    

    public function showBookOrder()
    {
        $user_id=Auth::user();
        $forms = $user_id->orders;
        return view('showbookorder',compact('forms','user_id'))->with('user_id',$user_id);
    }

    public function showBookHistory()
    {
        $user_id=Auth::user();
        $forms = $user_id->histories;
        return view('showbookhistory',compact('forms','user_id'))->with('user_id',$user_id);
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

    public function removeBook($id)
    {
        $forme = Form::find($id);     
        $history = new History();
        $history->title = $forme->title;
        $history->author = $forme->author;
        $history->link = $forme->link;
        $history->description = $forme->description;
        $history->profilephoto = $forme->profilephoto;
        $history->user_id=Auth::id();
        $history->save();

        $formd = Order::find($id);
        $formd->delete();
        return back()->with('Book_deleted','Book has been deleted successfully!');
    }

}
