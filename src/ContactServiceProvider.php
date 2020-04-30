<?php

namespace Donpuerto\contact;

use Illuminate\Support\ServiceProvider;


class ContactServiceProvider extends ServiceProvider
{
  public function boot()
  {
    $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    $this->loadViewsFrom(__DIR__ . '/views', 'contact');

    $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

    // merging app/config/contact.php
    // need to publish
    $this->mergeConfigFrom(
      __DIR__ . '/config/contact.php',
      'contact'
    );

     // need to publish
    $this->publishes([
      __DIR__ . '/config/contact.php' => config_path('contact.php'),
      __DIR__ . '/views' => resource_path('views/vendor/contact')
    ]);
  }

  public function register()
  {
  }
}