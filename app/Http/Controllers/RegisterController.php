<?php


use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller{

    protected function create(){
        $request = request();

        if($this->countErrors($request) ===0){
            $newUser = User::create([
                'username' =>  $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'name' => $request->name,
                'surname' => $request->surname
            ]);
            if($newUser){
                Session::put('id', $newUser->id);
                return redirect('home');
            }
            else{
                return redirect('register')->withInput();
            }
        }else{
            return redirect('register')->withInput();
        }
    }

    private function countErrors($data){
        $error = array();

            // username
            if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['username'])){
                $error[] = 'Username non valido';
            }else{
                $username = user::where('username', $data['username'])->first();
                if($username !== null){
                    $error[] = 'Username già utilizzato';
                }
            }

            //password
            if(strlen($data['password']) < 8){
                $error[] = "Caratteri password insufficienti";
            }

            //conferma password
            if(strcmp($data['password'], $data['password1']) !=0 ){
                $error[] = "Le password non coincidono";
            }

             // EMAIL
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $error[] = "Email non valida";
            } 
            else {
                $email = User::where('email', $data['email'])->first();
            if ($email !== null) {
                $error[] = "Email già utilizzata";
            }
    }

    return count($error);
}

    public function checkUsername($query) {
        $exist = User::where('username', $query)->exists();
        return ['exists' => $exist];
    }

    public function checkEmail($query) {
        $exist = User::where('email', $query)->exists();
        return ['exists' => $exist];
    }

    public function index() {
        return view('register');
    } 

}

?>
