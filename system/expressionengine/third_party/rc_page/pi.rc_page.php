<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * RC Page
 *
 * @package    		ExpressionEngine
 * @category        Plugin
 * @author      	Red Carrot
 * @copyright       Copyright (c) 2012, Andrew Fairlie
 * @link        	http://redcarrot.co.uk/
 */

$plugin_info = array(
  'pi_name'         => 'RC Page',
  'pi_version'      => '1.0',
  'pi_author'       => 'Red Carrot',
  'pi_author_url'   => 'http://redcarrot.co.uk/',
  'pi_description'  => 'Displays the page number for pagination SEO'
);

class Rc_page
{

    public $return_data = "";

    // --------------------------------------------------------------------

    public function __construct()
    {
        $this->EE =& get_instance();
        $limit = (int) $this->EE->TMPL->fetch_param('limit');
        $lastSegment = $this->EE->uri->segment($this->EE->uri->total_segments());

        // if last segment begins with p and ends with a letter (99% certain this is a paginated page!)
        if($lastSegment[0]=="P" && is_numeric(substr($lastSegment, -1))){
          $startingEntry = substr($lastSegment, 1);
          $pageNo = ($startingEntry/$limit)+1;

          $this->return_data = "- Page ". $pageNo;
        }
    }

    // END
}
