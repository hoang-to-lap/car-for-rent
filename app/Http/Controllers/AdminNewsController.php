<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Support\Facades\Log;

class AdminNewsController extends Controller
{
    //
    use StorageImageTrait;
    private $news;
    public function __construct( News $news)
{
    $this->news = $news;
   
    $this->middleware('auth');
}
public function index()
{
    $news = News::latest()->paginate(10);
    return view('news.index', compact('news'));
}
}
