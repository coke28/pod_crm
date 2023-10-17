<?php

namespace App\Core\Adapters;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;
use Cache;

/**
 *
 */
class RVNDevFunc
{

  function __construct()
  {
  }

  public function getrandomstring($length)
  {
    return Str::random($length);
  }

  function getActiveNavClass($navtype, $navtitle){
    $classes = array(
      'main' => '',
      'body' => ''
    );
    //Parent Nav part
    if($navtype == 'parentnav'){
      $included_routes = [];

      if($navtitle == 'crmapps'){
        $included_routes = [
          'user.dash'
        ];
      }

      if($navtitle == 'tools'){
        $included_routes = [
          'user.index',
          'userLevel.index',
          'project.index',
          'image.index',
          'category.index',
          'form.index',
          'crmLog.index',
        ];
      }

      if(in_array(request()->route()->getName(), $included_routes)){
        $classes = array(
          'main' => 'active',
          'body' => 'active show'
        );
      }
    }

    if($navtype == 'pagegroup'){

      // if ($navtitle == 'manageUsers') {
      //   $included_routes = [
      //     'user.index',
      //     'userLevel.index',
      //     'form.index',
      //   ];
      // }
    


      if(in_array(request()->route()->getName(), $included_routes)){
        $classes = array(
          'main' => 'show'
        );
      }
    }

    if($navtype == 'page'){
      if(request()->route()->getName() == $navtitle){
        $classes = array(
          'main' => 'active'
        );
      }
    }

    return $classes;
  }


}
