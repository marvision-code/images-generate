<?php

namespace Marvision\ImagesGenerate\Controllers;

use Illiminate\Html\Request;
use Illuminate\Routing\Controller;
use Marvision\ImagesGenerate\IGText as image;

class ImagesGenerateController extends Controller
{
	public function index(){   
		$url = image::run("MH","white","orange",30,30);
		return view('ImagesGenerate::home')->with('url',$url);
	}
}