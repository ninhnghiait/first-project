<?php
namespace App\Traits;
use Session;
use URL;
trait RedirectTraits
{
	public function setUrl()
	{
		Session::put('routejt', URL::full());
	}
	public function getUrl($route)
	{
		return Session::has('routejt') ? Session::get('routejt') : $route;
	}
}