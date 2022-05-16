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
	'/' => 'task#index',
	'/index' => 'task#index',
	'/create' => 'task#create',
	'/update' => 'task#update',
	'/new' => 'task#new', //ruta sin vista, sólo llama al método
	'/edit' => 'task#edit', //ruta sin vista, sólo llama al método
	'/delete' => 'task#delete', //ruta sin vista, sólo llama al método
);
