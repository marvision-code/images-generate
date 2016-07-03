<?php

namespace Marvision\ImagesGenerate;

use Illuminate\Support\ServiceProvider;

class ImagesGenerateServiceProvider extends ServiceProvider
{
	public function boot()
	{
		include __DIR__.'/routes.php';
		$this->loadViewsFrom(__DIR__.'/views','ImagesGenerate');
	}

	public function register(){
		$this->app['ImagesGenerate'] = $this->app->share(function($app){
			return new ImagesGenerate;
		});
	}
}