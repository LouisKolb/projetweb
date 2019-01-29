<?php

namespace App\Http\Controllers;

use App\centre;
use App\order;
use App\user;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Session;

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

     //function create
    public function create()
    {
        //check if the user is connected
        if (session()->has('user'))
        {
            //go to the home page
            return redirect("/");
        }
        //else
        //get all centers
        $centres = Centre::get();
        //return the user to the register page with all centers from the bdd
        return view("user.register", compact('centres'));
    }



    //function login
    public function login()
    {
        //check if the user is connected
        if (session()->has('user'))
        {
            //go to the home page
            return redirect("/");
        }
        //else
        //Go to the login page
        return view("user.login");
    }



    //function processlogin
    public function processlogin()
    {
        //put errors inside an array
        $errors = array();
        $client = new Client(); //GuzzleHttp\Client

        //get info from the BDD with the API
        $result = $client->post('http://localhost:3000/user/login', ['form_params' => [
            'username' => request()->username,
            //md5 is used to encrypt the password
            'password' => md5(request()->password),
            'token'=>'L4CduC0neM4raB45580o5TeD'
        ]]);

        //get the body of the response
        $user = json_decode($result->getBody(true));

        //if the user does not exist
        if (empty($user->id))
        {
            array_push($errors, $user->id);
        }

        if ($errors) {

            return response()->json([
                'errors' => $errors,
            ], 418);
        }

        $user = json_decode($result->getBody());
        session()->push('user', $user->id);

        //create new order
        if (!order::where('user_id', $user->id)->where('validate', 0)->get()->count()) {
            $order = new order;
            $order->validate = 0;
            $order->user_id = $user->id;
            $order->save();
        }

        return "Connected :" . $user->username;

    }
    public function logout()
    {
        //close session
        Session::flush();
        //go to login page
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
        //place errors inside an array
        $errors = array();

        //check if all field are completed
        if (!request()->username || !request()->first_name || !request()->last_name || !request()->email || !request()->password || !request()->centre) {
            array_push($errors, "Merci de compléter tout les champs");
        }

        //check the minimal username lenght
        $minuserlength = 5;
        if (strlen(request()->username) < $minuserlength) {
            array_push($errors, "La longueure minimale du noms d'utilisateur est $minuserlength");
        }

        //check if the emails match each other
        if (request()->email != request()->email_confirm) {
            array_push($errors, "Les Email ne corespondent pas");
        }

        //check if the user has accepted
        if (empty(request()->accept)) {
            array_push($errors, "Merci d'accepter les conditions général d'utilisations");
        }

        //check the emails format
        if (!filter_var(request()->email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Le format de mail n'est pas valide");
        }

        //check if the user is part of the cesi
        if (!preg_match('/@(via)?cesi\.fr/', request()->email)) {
            array_push($errors, "Vous devez etre en formation du cesi");
        }

        //check if the passwords match each other
        if (request()->password != request()->password_confirm) {
            array_push($errors, "Les Mot de passe ne corespondent pas");
        }

        //check if the center exists
        if (!Centre::where('id', request()->centre)->count()) {
            array_push($errors, "Le centre n'existe pas");
        }

        //check the password reliability
        if (strlen(request()->password) < 8) {
            array_push($errors, "Le mot de passe doit d'être de 8 caracteres minimims");
        }
        //check the password reliability
        if (!preg_match("/^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/",request()->password)) {
            array_push($errors, "Le mot de passe doit contenir au moins une majuscule , minuscule, un chiffre et un caractere spécial");
        }
        

        //if no error
        if (sizeof($errors) == 0) {
            $client = new Client(); //GuzzleHttp\Client
            //try to completed the bdd with the data
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
                        "token"=>'L4CduC0neM4raB45580o5TeD'
                    ]]);

                $body = json_decode($result->getBody());

                //if the user was created well
                if (!empty($body->id)) {
                    //get the user
                    $user = user::find($body->id);
                    //if the email ended by viacesi
                    if (preg_match('/@viacesi\.fr/', request()->email)) {
                        $user->addrole("Student");
                    //if the email ended by cesi
                    } else if (preg_match('/@cesi\.fr/', request()->email)) {
                        $user->addrole("Tutor");
                    }

                    return response()->json([
                        'id' => $body->id,
                    ], 200);

                }
                //if errors
                else if (!empty($body->errors)) {
                    return response()->json([
                        'errors' => $body->errors,
                    ], 418);
                }
                return;

            }
            catch (ClientErrorResponseException $exception)
            {
                $responseBody = $exception->getResponse()->getBody(true);
            }

        }
        else {
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
     //function show
    public function show()
    {
       //return the user profil
        return view('user.show');
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
