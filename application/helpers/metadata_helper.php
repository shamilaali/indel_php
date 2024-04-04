<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * Metadata
 *
 * Fetches page title and returns page metadata array.
 *
 * @access  public
 * @param   string page title
 * @return  array response
 */
if ( ! function_exists('metadata'))
{
    function metadata($page_title = NULL)
    {
        $metadata['page_title'] = $page_title.' - Ooredoo';

        return $metadata;
    }
}