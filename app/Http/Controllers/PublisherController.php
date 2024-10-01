<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Order;
use App\Repositories\CategoryRepository;
use App\Repositories\WebsiteRepository;
use App\Repositories\StatuRepository;
use App\Repositories\LanguageRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Language;
use App\Models\LinkType;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Support\Facades\DB;
use App\Models\Website;

class PublisherController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $categoryRepository;

    private $websiteRepository;

    private $statuRepository;

    private $languageRepository;

    public function __construct(CategoryRepository $categoryRepo, WebsiteRepository $websiteRepo, StatuRepository $statuRepo, LanguageRepository $languageRepo)
    {
        $this->categoryRepository = $categoryRepo;
        $this->websiteRepository = $websiteRepo;
        $this->statuRepository = $statuRepo;
        $this->languageRepository = $languageRepo;
    }

	public function index() {
        if (!Auth::check()){
            return  redirect('login')->with('error','Please login first');
        }
        $orders = Order::with('website')
            ->where('buyers_id', Auth::id())
            ->get();
        $websitesCount = Website::where('user_id',Auth::id())->count();
        $activeOrders = Order::where('buyers_id', Auth::id())->where('status', 'Active')->count();

        return view('publisher.index', [
            'orders' => $orders,
            'websitesCount' => $websitesCount,
            'activeOrders'=>$activeOrders
        ]);
	}

    public function websiteAdd() {

        $linkTypes = LinkType::all();

        $languages = $this->languageRepository->all();

        $categories = $this->categoryRepository->all();

        $prices = DB::table('guest_post_prices')->select('price')->get();

        return view('publisher.add', compact('linkTypes', 'languages', 'categories', 'prices'));
    }

    public function orders() {
        return view('publisher.orders');
    }

    public function earning() {
        return view('publisher.earning');
    }

    public function websites() {
        $categories = $this->categoryRepository->all();

        $status = $this->statuRepository->all();

        $websites = Website::join("status", "status.id", "=", "websites.statu_id")->get();

        return view('publisher.websites')->with('categories', $categories)->with('status', $status);
    }

    public function submitWebsites()
    {
        return view('publisher.submitws');
    }


}
