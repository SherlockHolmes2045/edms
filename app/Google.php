<?php


namespace App;


use Google_Client;
use Google_Service_Drive;
use Illuminate\Support\Facades\Storage;

class Google
{

    public function client()
    {
        $client = new Google_Client();
        $client->setAuthConfig(Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix('public/client_secret.json'));
        //$client->setClientId(env('GOOGLE_CLIENT_ID'));
        //$client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URL'));
        $client->setScopes(explode(',', env('GOOGLE_SCOPES')));
        $client->setApprovalPrompt(env('GOOGLE_APPROVAL_PROMPT'));
        $client->setAccessType(env('GOOGLE_ACCESS_TYPE'));
        return $client;
    }
    public function drive($client)
    {
        //Calling Google APIs
        $drive = new Google_Service_Drive($client);
        return $drive;
    }

}