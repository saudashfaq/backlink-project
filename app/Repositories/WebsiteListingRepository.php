<?php
namespace  App\Repositories;
use App\Models\Website;
use App\Models\Category;
use App\Models\User;
use App\Models\WebsiteBacklinkRate;
use Illuminate\Support\Facades\Auth;

class WebsiteListingRepository
{
    public function getWebsites($userId)
    {
        $query = Website::take(10)->with(['websiteBacklinkRates', 'categories'])->orderBy('id', 'desc');

        $query->when($userId, function ($query, $userId) {
            $query->where('user_id', $userId);
        });

        return $query->get();
    }
}
