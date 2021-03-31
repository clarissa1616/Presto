<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RevisorRecived;
use Illuminate\Http\Request;
use App\Models\RevisorCreate;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class RevisorCreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('revisor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $revisor = RevisorCreate::create($request->all());
        // dd($request);

        $revisor = RevisorCreate::create
                ([
                    'address' => request('address'),
                    'date' => request('date'),
                    'phone' => request('phone'),
                    'body' => request('body'),
                    'user_id' => auth()->id()
                ]);
        
        // $user = Auth::user();

        Mail::to($revisor->user->email)->send(new RevisorRecived($revisor));
        return redirect(route('revisor.control' ,compact('revisor')));
    }

    public function control()
    {
        return view('revisor.control');
    }

 public function final(){


     return view('revisor.final');


 }
    public function index(){
        $users = Auth::user();
        if ($users->admin == 1){

            $revisors = RevisorCreate::all();
            return view('revisor.index' , compact('revisors' , 'users'));
        }else{
            return view('revisor.final');
        }
    }

    // public function revisorReject($id)
    // {
    //     $revisorReject = RevisorCreate::find($id);
    //     $revisorReject->visible = false;
    //     $revisorReject->save();
    //     return redirect(route('revisor.index'));
    // }
    public function destroyRevisor($id)
    {
        $revisorDelete = RevisorCreate::find($id);
        $revisorDelete->delete();
        return redirect()->back()->with('messagge' , 'Revisore eliminato');
    }

    public function revisorTrue($id)
    {
        $revisorAccept = User::find($id);
        $revisorAccept->is_revisor = true;
        $revisorAccept->save();
        // dd($revisorAccept);
        return redirect(route('revisorCreate.index'));  
    }

    public function indexRevisor()
    {
        $userRevisors = User::where('is_revisor' , 1)
                            ->get();

        return view('revisorCreate.index' , compact('userRevisors'));
    }

    public function destroyRevisorAccept($id)
    {
        $userRevisors = User::find($id);
        $userRevisors->is_revisor = false;
        $userRevisors->save();
        return redirect()->back()->with('messagge' , 'Revisore eliminato');
    }
    // public function revisorTrue($revisorApproved , $revisorCreate , $email , $id)
    // {
    //     $revisorApproved = RevisorCreate::find($email)->get('email');
    //     $revisorCreate = User::find($email)->get('email');
    //     $revisorModelUser = User::find($id);

    //     if ($revisorApproved == $revisorCreate) 
    //     {
    //         $revisorModelUser->is_revisor = false;
    //         $revisorModelUser->save();
    //         return redirect(route('revisorCreate.index'));
    //     }
    // }

    
}

