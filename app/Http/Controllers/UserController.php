<?php

namespace App\Http\Controllers;

use App\user;
use App\centre;
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
        return view("user.register",compact('centres'));
    }


    public function login(){

        if (session()->has('username')) {
            return redirect("/");
        }
        return view("user.login");
    }
    public function processlogin()
    {
        if (User::where('username', request()->username)->where('password', md5(request()->password))->count()) {
            $user = User::where('username', request()->username)->get()->first();
            $loged = true;
        } else if (User::where('email', request()->username)->where('password', md5(request()->password))->count()) {
            $user = User::where('email', request()->username)->get()->first();
            $loged = true;
        } else {
            return response()->json([
                'errors' => array("Les idenifiants ne corespondent pas"),
            ], 418);
        }
        if ($loged) {
            session()->push('user', request()->username);
            $user->save();
            return "Connected :" . $user->username;
        }
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
    public function store(){
        $errors = array();
        if (!request()->username || !request()->first_name || !request()->last_name || !request()->email || !request()->password) {
            array_push($errors, "Merci de completer tout les champs");
        }
        //test de la longueure user
        $minuserlength = 5;
        if (strlen(request()->username) < $minuserlength) {
            array_push($errors, "La longueure minimale du noms d'utilisateur est $minuserlength");
        }
        //test de l'existance d'un utilisateur
        if (User::where('username', '=', request()->username)->count()) {
            array_push($errors, "Le nom d'utilisateur request()->username existe déja");
        }
        //test de l'existance du mail
        if (User::where('email', '=', request()->email)->count()) {
            array_push($errors, "L'email est déja enregistrée");
        }
        //test emails similaires
        if (request()->email != request()->email_confirm) {
            array_push($errors, "Les Email ne corespondent pas");
        }
        //les emails n'ont pas le bon format
        if (!filter_var(request()->email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Le format de mail n'est pas valide");
        }

        //les emails n'ont pas le bon format
        if (!preg_match('/@(via)?cesi\.fr/',request()->email)){
            array_push($errors, "Vous devez etre en formation du cesi");
        }



        //
        //test mot de pass similaires
        if (request()->password != request()->password_confirm) {
            array_push($errors, "Les Mot de passe ne corespondent pas");
        }

        //est si le centre existe bien
        if (!Centre::where('id',request()->centre)->count()) {
            array_push($errors, "Le centre n'existe pas");
        }



    


        //test de la dureté du mdp bon on va pas faire chier le monde
        if (strlen(request()->password) < 8) {
            array_push($errors, "Le mot de passe doit d'être de 8 caracteres minimims");
        }
        if ($errors) {
            return response()->json([
                'errors' => $errors,
            ], 418); //Im a tea Pot
        }
        $user = new User();
        $user->username = request()->username;
        $user->password = md5(request()->password);
        $user->email = strtolower(request()->email);
       
        $user->first_name = ucwords(strtolower(request()->first_name));
        $user->last_name = ucwords(strtoupper(request()->last_name));
        $user->centre = request()->centre;
        $user->mailtoken=bin2hex(random_bytes(30));
       
        
        $user->save();



        $user = User::where('username',$user->username)->first();
        if (!preg_match('/@cesi\.fr/',$user->email)){
            $user->addRole("Tutor");
        }else{
            $user->addRole("Student");
        }
        $user->save();
        return "Succesfully Sing in";

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
