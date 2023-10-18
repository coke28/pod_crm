<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use App\Models\UserLevel;


use DB;

class PageController extends Controller
{
  public function indexPage()
  {
    if (Auth::check()) {
      // The user is logged in...
      return redirect()->route('user.dash');
    } else {
      return redirect()->route('guest.index');
    }
  }

  public function loginPage()
  {
    return view('auth.login');
  }

  public function guestPage()
  {
    return view('guest.view');
  }


  public function dashboardPage()
  {

    return view('dashboard.view', array(
      'pageTitle' => 'Dashboard',
      'pageDescription' => 'Test description',
    ));
  }

  private function permissionCheck($userlevel)
  {
    return ($userlevel == 0) ? false : true;
  }

  public function manageUser()
  {
    //  $hasAccess = (auth()->user()->userlevel->n2_users == 0) ? false : true;
    $hasAccess = $this->permissionCheck(auth()->user()->userlevel->n2_users);
    if (!$hasAccess) {
      if (Auth::check()) {
        // The user is logged in...
        return redirect()->route('user.dash');
      } else {
        return redirect()->route('get.login');
      }
    }
    return view('tools.manageUsers.view', array(
      'pageTitle' => 'Manage Users',
      'pageDescription' => '',
      'userLevels' => UserLevel::where('deleted', '0')->get()
    ));
  }
  //
  public function manageUserLevel()
  {
    $hasAccess = $this->permissionCheck(auth()->user()->userlevel->n2_user_roles);
    if (!$hasAccess) {
      if (Auth::check()) {
        // The user is logged in...
        return redirect()->route('user.dash');
      } else {
        return redirect()->route('get.login');
      }
    }
    return view('tools.manageUserLevels.view', array(
      'pageTitle' => 'Manage User Levels',
      'pageDescription' => ''
    ));
  }

  public function manageImage()
  {
    // $hasAccess = $this->permissionCheck(auth()->user()->userlevel->n2_user_roles);
    // if (!$hasAccess) {
      // if (Auth::check()) {
      //   // The user is logged in...
      //   return redirect()->route('user.dash');
      // } else {
      //   return redirect()->route('get.login');
      // }
    // }
    return view('tools.manageImages.view', array(
      'pageTitle' => 'Manage Images',
      'pageDescription' => '',
      'categories' => Category::where('status','1')->where('deleted','0')->get(),
      'projects' => Project::where('status','1')->where('deleted','0')->get()
    ));
  }

  public function manageProject()
  {
    // $hasAccess = $this->permissionCheck(auth()->user()->userlevel->n2_user_roles);
    // if (!$hasAccess) {
      // if (Auth::check()) {
      //   // The user is logged in...
      //   return redirect()->route('user.dash');
      // } else {
      //   return redirect()->route('get.login');
      // }
    // }
    return view('tools.manageProjects.view', array(
      'pageTitle' => 'Manage Projects',
      'pageDescription' => '',
      // 'categories' => Category::where('status','1')->where('deleted',0)->get()
    ));
  }



  public function manageCategory()
  {
    // $hasAccess = $this->permissionCheck(auth()->user()->userlevel->n2_user_roles);
    // if (!$hasAccess) {
      // if (Auth::check()) {
      //   // The user is logged in...
      //   return redirect()->route('user.dash');
      // } else {
      //   return redirect()->route('get.login');
      // }
    // }
    return view('tools.manageCategories.view', array(
      'pageTitle' => 'Manage Categories',
      'pageDescription' => ''
    ));
  }


  public function manageForm()
  {
    $hasAccess = $this->permissionCheck(auth()->user()->userlevel->n2_forms);
    if (!$hasAccess) {
      if (Auth::check()) {
        // The user is logged in...
        return redirect()->route('user.dash');
      } else {
        return redirect()->route('get.login');
      }
    }
    return view('tools.manageForms.view', array(
      'pageTitle' => 'Manage Forms',
      'pageDescription' => '',
    ));
  }

  public function manageCrmLog()
  {
    $hasAccess = $this->permissionCheck(auth()->user()->userlevel->n2_forms);
    if (!$hasAccess) {
      if (Auth::check()) {
        // The user is logged in...
        return redirect()->route('user.dash');
      } else {
        return redirect()->route('get.login');
      }
    }
    return view('tools.manageCrmLogs.view', array(
      'pageTitle' => 'Manage CRM Logs',
      'pageDescription' => '',
    ));
  }


}
