<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package 	WordPress
 * @subpackage 	Timber
 * @since 		Timber 0.1
 */

use JuiceBox\Core\Helpers;

$templates = array('search.twig', 'archive.twig', 'index.twig');
$context = Timber::context();
$context['title'] = 'Search results for '. get_search_query();

if ( Helpers::is_ajax() ) {

    $titles = [];

    foreach ( $context['posts'] as $p ) {
        $titles[] = [
            'title' => $p->title,
            'url'   => $p->link()
        ];
    }

    echo json_encode(array_splice($titles, 0, 5));
    die();

}

Timber::render($templates, $context);
