<?php 

/**
 * Used to define the routes in the system.
 * 
 * A route should be defined with a key matching the URL and an
 * controller#action-to-call method. E.g.:
 * 
 * '/' => 'index#index',
 * '/calendar' => 'calendar#index'
 * '/nomRuta' => 'controlador#método'
 */
$routes = array(
	/* '/test' => 'test#index',
	'/check' => 'test#check', */
	'/' => 'task#index',
	'/index' => 'task#index',
	'/create' => 'task#create',
	'/update' => 'task#update',
);
