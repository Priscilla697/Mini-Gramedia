<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $subscriptionPackages = SubscriptionPackage::all();
        return view('home', compact('subscriptionPackages'));
    }
}
