<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::route('login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::getToken() != Input::get('csrf_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

/*
|--------------------------------------------------------------------------
| API Filters
|--------------------------------------------------------------------------
|
| Authentication and rate limiting.
|
*/

Route::filter('api.auth', function()
{
	if (!Request::getUser())
	{
		App::abort(401, 'A valid API key is required');
	}

	$user = User::where('api_key', '=', Request::getUser())->first();

	if (!$user)
	{
		App::abort(401);
	}

	Auth::login($user);
});

Route::filter('api.limit', function()
{
	$key = sprintf('api:%s', Auth::user()->api_key);

	// Create the key if it doesn't exist
	Cache::add($key, 0, 60);

	// Increment by 1
	$count = Cache::increment($key);

	// Fail if hourly requests exceeded
	if ($count > Config::get('api.requests_per_hour'))
	{
		App::abort(403, 'Hourly request limit exceeded');
	}
});
