<?php
/**
 * Created by PhpStorm.
 * User: arab
 * Date: 11/12/19
 * Time: 1:59 AM
 */

namespace Xpeed;


class Controller
{
  protected $view;
  protected $title;

  public function __construct()
  {
  }


  function view($page,$variables=[])
    {
        ob_start();

        if(count($variables))
        {
            extract($variables);
        }

        $_view_path = VIEW_PATH.DIRECTORY_SEPARATOR.$page.'.php';

        if(!file_exists($_view_path)) throw new Exceptions($_view_path.' not found');

        require $_view_path;

        $output = ob_get_contents();
        ob_end_clean();
        echo $output ;
    }

  public function __destruct()
  {
      // TODO: Implement __destruct() method.
  }

}