<?php

namespace App\Http\Controllers;

use App\centre;
use App\user;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session()->has('username')) {
            return redirect("/");
        }
        $centres = Centre::get();
        return view("user.register", compact('centres'));
    }

    public function login()
    {

        if (session()->has('user')) {
            return redirect("/");
        }
        return view("user.login");
    }
    public function processlogin()
    {
        $errors = array();
        $client = new Client(); //GuzzleHttp\Client
          
                $result = $client->post('http://localhost:3000/user/login',['form_params' =>[
                    'username' => request()->username,
                    'password'=>md5(request()->password)
                ]]);
                
                
                $user =json_decode($result->getBody(true));
                if(empty($user->id)){
                    array_push($errors,empty($user->id));
                }
            if($errors) {
                
                return response()->json([
                    'errors' => $errors,
                ], 418);
            }
            
       
            session()->push('user', request()->username);
            
            return "Connected :" . $user->username;
        
    }
    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $errors = array();
        if (!request()->username || !request()->first_name || !request()->last_name || !request()->email || !request()->password || !request()->centre) {
            array_push($errors, "Merci de completer tout les champs");
        }

        //test de la longueure user
        $minuserlength = 5;
        if (strlen(request()->username) < $minuserlength) {
            array_push($errors, "La longueure minimale du noms d'utilisateur est $minuserlength");
        }

        //test emails similaires
        if (request()->email != request()->email_confirm) {
            array_push($errors, "Les Email ne corespondent pas");
        }
        //les emails n'ont pas le bon format
        if (!filter_var(request()->email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Le format de mail n'est pas valide");
        }

        //Pas au cesi
        if (!preg_match('/@(via)?cesi\.fr/', request()->email)) {
            array_push($errors, "Vous devez etre en formation du cesi");
        }

        //test mot de pass pas similaires
        if (request()->password != request()->password_confirm) {
            array_push($errors, "Les Mot de passe ne corespondent pas");
        }

        //est si le centre existe bien
        if (!Centre::where('id', request()->centre)->count()) {
            array_push($errors, "Le centre n'existe pas");
        }

        //test de la dureté du mdp bon on va pas faire chier le monde
        if (strlen(request()->password) < 8) {
            array_push($errors, "Le mot de passe doit d'être de 8 caracteres minimims");
        }

        if (sizeof($errors) == 0) {
            $client = new Client(); //GuzzleHttp\Client
            try {
                $result = $client->post('http://localhost:3000/user', [
                    'form_params' => [

                        "username" => request()->username,
                        "password" => md5(request()->password),
                        "email" => strtolower(request()->email),

                        "first_name" => ucwords(strtolower(request()->first_name)),
                        "last_name" => ucwords(strtoupper(request()->last_name)),
                        "centre" => request()->centre,
                        "mailtoken" => bin2hex(random_bytes(30)),
                        "validate" => 0,
                    ]]);

                    $body = json_decode($result->getBody());
                    //Si l'utilisateur a bien été créé
                    if(!empty($body->id)){
                        $user = new User;

                        if(preg_match('/@viacesi\.fr/',request()->email))
                        {
                            $user->addrole($body->id,"Student");
                        
                        }
                        else if(preg_match('/@cesi\.fr/',request()->email)){
                            $user->addrole($body->id,"Tutor"); 
                        }

                        
                        


                        return response()->json([
                            'id' => $body->id,
                        ], 200);
                    }
                    else if(!empty($body->errors)){
                        return response()->json([
                            'errors' => $body->errors,
                        ], 418);
                    }

                    return ;
                    //return $result->getBody();

            } catch (ClientErrorResponseException $exception) {
                $responseBody = $exception->getResponse()->getBody(true);
            }


        }else{
            if ($errors) {
                return response()->json([
                    'errors' => $errors,
                ], 418); //Im a tea Pot
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }

}
