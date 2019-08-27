<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Client;

class ApiAuthController extends Controller
{

    public function register(Request $request){

        $this->validate($request, [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:20',

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ]);

        return response()->json('Registration successful');
    }
    public function login(Request $request){


        try {
            $response = $this->authorizeUser($request->email, $request->password);
            $body = json_decode($response->getBody());
            $body->user = User::where('email', $request->email)->get();

            return response()->json($body);
        } catch (BadResponseException $e) {
            if ($e->getCode() === 400) {
                return response()->json('Invalid request. Please enter a username and password.', $e->getCode());
            } elseif ($e->getCode() === 401) {
                return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
            }
            return response()->json('Something went wrong on the server', $e->getCode());
        }
    }
    private function authorizeUser(string $email, string $password)
    {
        $http = new Client();

        return $http->post(route('passport.token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '2',
                'client_secret' => '9pQqzF1eSITvroA4qIophOlljP95TbpLsmOD9G4j',
                'username' => $email,
                'password' => $password,
            ]
        ]);
    }
}
