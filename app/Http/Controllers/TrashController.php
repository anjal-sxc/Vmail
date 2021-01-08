<?php

namespace App\Http\Controllers;

use App\Inbox;
use App\Sent;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Type;

class TrashController extends Controller
{

    public function index()
    {
        //

        $sentMails = Sent::onlyTrashed()->get()->toArray();
        $inboxMails = Inbox::onlyTrashed()->get()->toArray();

        $trashMails = array_merge($inboxMails, $sentMails);

        return view('dashboard.trash', [
            'trashMails' => $trashMails,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $mail = $request->get('origin');
        $id = $request->get('id');

        if($request->exists('delete')) {
            $this->destroy($id, $mail);
        } else {
            if($mail === 'Sent') {
                Sent::onlyTrashed()->find($id)->restore();
            } else {
                Inbox::onlyTrashed()->find($id)->restore();
            }
        }

        return redirect('/dashboard/trash');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param $mail
     * @return void
     */
    public function destroy($id, $mail)
    {

        if($mail === 'Sent') {
            Sent::onlyTrashed()->find($id)->forceDelete();
        } else {
            Inbox::onlyTrashed()->find($id)->forceDelete();

        }

        return redirect('/dashboard/trash');
    }
}
