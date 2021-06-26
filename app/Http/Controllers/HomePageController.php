
<?php

use Illuminate\Routing\Controller;
use App\Models\User;

class HomePageController extends Controller{
public function v(){
return view('homePage');
}
}