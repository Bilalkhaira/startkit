<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Notification;
use App\Models\SellerRequest;
use App\Models\ContactRequest;

class DashboardController extends Controller
{
    public function index()
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        $cars = Car::with('images')->latest()->limit(5)->get();
        $dream_cars = Notification::latest()->limit(5)->get(['id','data', 'created_at']);
        $sellers = SellerRequest::latest()->limit(5)->get();
        $contacts = ContactRequest::latest()->limit(5)->get();

        return view('pages.dashboards.index', compact('cars', 'dream_cars', 'sellers', 'contacts'));
    }
}
