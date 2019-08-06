<?php 
if (! function_exists('hasError')) {
	/**
	 * Check for the existence of an error message and return a class name
	 *
	 * @param  string  $key
	 * @return string
	 */
	function hasError($key)
	{
		$errors = session()->get('errors') ?: new \Illuminate\Support\ViewErrorBag;
		return $errors->has($key) ? 'is-invalid' : '';
	}
}

if (! function_exists('errorClass')) {
	/**
	 * Check for the existence of an error message and return a class name
	 *
	 * @param  string  $key
	 * @return string
	 */
	function errorClass($key)
	{
		$errors = session()->get('errors') ?: new \Illuminate\Support\ViewErrorBag;
		return $errors->has($key) ? 'is-invalid' : '';
	}
}

if (! function_exists('setActive')) {
	/**
	 * Check if the route is active or not
	 *
	 * @param  string  $key
	 * @return string
	 */
	function setActive($path, $active = 'warning-color darken-4 text-white') {
		return Request::routeIs($path) ? $active : '';
	}
}
?>