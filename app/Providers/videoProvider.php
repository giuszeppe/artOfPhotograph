<?php

namespace App\Providers;

use Google_Client;
use Google\Service\YouTube;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class VideoProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function getVideo()
    {
        $DEVELOPER_KEY = 'AIzaSyCGILPCMutOGD0Gs5A5E2B1EHeqwC9hyx4';

        $client = new Google_Client();
    
        $client->setDeveloperKey($DEVELOPER_KEY);

        // Define an object that will be used to make all API requests.
        $youtube = new Youtube($client);


        // Call the search.list method to retrieve results matching the specified
        // query term.
        $searchResponse = $youtube->search->listSearch('id,snippet', ['channelId' => 'UCd7aULLkxl-y-K1RfyUmqQQ']);

        $videos = '';
        $channels = '';
        $playlists = '';

        // Add each result to the appropriate list, and then display the lists of
        // matching videos, channels, and playlists.
        dd($searchResponse);
        
    }
}