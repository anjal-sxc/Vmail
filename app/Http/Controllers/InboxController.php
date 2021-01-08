<?php

namespace App\Http\Controllers;

use App\Inbox;
use App\Sent;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use mysql_xdevapi\Exception;

class InboxController extends Controller
{
    public function index()
    {
        //
        $user = auth()->user();

        $client = new Client();
        $token = 'f3825659be47f337ed78cebfe43976d5';
        $inbox_id = 1162893;
        $uri = 'https://mailtrap.io/api/v1/inboxes/'.$inbox_id.'/messages/';
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];

        $response = $client->get($uri, [
            'headers' => $headers,
        ]);

        $emails = json_decode($response->getBody()->getContents());

        $data = $uri.$emails[0]->id.'/body.htmlsource';




        if (!empty($emails)) {
            foreach ($emails as $email) {

                $response = $client->get($uri.$email->id.'/body.txt', [
                    'headers' => $headers,
                ]);

                $body = $response->getBody()->getContents();


                Inbox::updateOrCreate([
                    'email_id' => $email->id,
                   'from' => $email->from_email,
                   'subject' => $email->subject,
                   'body' => $body,
                    'user_id' => $user->id,
                ]);

                } // End foreach

        } // End if

        $inboxMails = Inbox::where('user_id', $user->id)->get();

        return view('dashboard.inbox.index', ['inboxMails'=>$inboxMails]);

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

    public function show(Inbox $inbox, $id)
    {
        //
        $inbox = Inbox::findOrFail($id);

        return view('dashboard.inbox.email', ['inbox'=>$inbox]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Inbox $inbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inbox $inbox)
    {
        //
    }


    public function destroy(Inbox $inbox)
    {
        //
        $id = \request()->get('id');
        $inbox = Inbox::findOrFail($id);

        $client = new Client();
        $token = 'f3825659be47f337ed78cebfe43976d5';
        $inbox_id = 1162893;
        $uri = 'https://mailtrap.io/api/v1/inboxes/'.$inbox_id.'/messages/'.$inbox->email_id;
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];

        try {
            $client->delete($uri, [
                'headers' => $headers,
            ]);
        } catch (ClientException $exception) {
            $inbox->delete();
            return redirect('/dashboard/inbox');
        }


        $inbox->delete();

        return redirect('/dashboard/inbox');
    }
}
