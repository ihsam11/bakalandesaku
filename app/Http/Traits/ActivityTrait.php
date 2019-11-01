<?php

namespace App\Traits;

use App\Activity;
use Illuminate\Http\Request;

trait ActivityTrait
{
   /*
        Kode Activity
        1: Pengguna, tema success
        2: Posting, tema secondary
        3: Galeri, tema warning
    */

  public function category($kode) {
      $theme = '';        

      switch ($kode) {
          case '1':                
              $theme = 'success';
              break;
          case '2':
              $theme = 'secondary';
              break;
          case '3':
              $theme = 'warning';
              break;            
      }
      return $theme;
  }

  public function added($kode, $menu) {        
      $activity = [];
      $theme = $this->category($kode);
      $message = "Melakukan penambahan di Menu ".$menu;

      $activity['description'] = $message;
      $activity['theme'] = $theme;

      $this->push($activity);

  }

  public function updated($kode, $menu) {
      $activity = [];
      $theme = $this->category($kode);
      $message = "Melakukan pembaruan di Menu ".$menu;

      $activity['description'] = $message;
      $activity['theme'] = $theme;

      $this->push($activity);
  }

  public function deleted($kode, $menu) {
      $activity = [];
      $theme = $this->category($kode);
      $message = "Melakukan penghapusan di Menu ".$menu;

      $activity['description'] = $message;
      $activity['theme'] = $theme;

      $this->push($activity);
  }

  public function push($activity) {
      Activity::create([
          "description" => $activity['description'],
          "theme"       => $activity['theme'],
          "status"      => 0
      ]);        
  }

  public function set_read(Activity $activity) {
      $activity = Activity::find($activity->id);

      $activity->status = 1;        
  }

}