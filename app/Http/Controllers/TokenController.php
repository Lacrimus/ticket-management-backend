<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    /**
     * Get the current session token
     * 
     * @return \Illuminate\Http\Response
     */
    public function session(Request $request)
    {
        return $request->session()->token();
    }

    /**
     * Converts the initial token to a full user token for permanent access.
     *
     * @return \Illuminate\Http\Response
     */
    public function receive()
    {
        /**
         *   Todo: Implement actual datbase access, the code below is just a scheme and will not work
        **/
        $current = $request->user()->currentAccessToken();
        $user = $request->user();

        if($this::show($current)) {
            //Make new user token
            $token = create();
            //Remove initial token
            $user->currentAccessToken()->delete();
            return $token;
        } else if($current = User::show($user)->token()) {
            throw new Exception("Initial token has already been redeemed.");
        } else {
            throw new Exception("Initial token is not valid.");
        }
    }

    /**
     * Generates a unique token for the user behind the request
     * @return string
     */
    private function create() {
        return $request->user()->createToken($request->token_name, ['tickets:store','tickets:modify', 'tickets:delete']);;
        #return $request->user()->createToken($request->user()->token, ['tickets:store','tickets:modify', 'tickets:delete']); # uses initial token
    }

    /**
     * Display the specified token.
     *
     * @param  \App\Models\Token  $token
     * @return \Illuminate\Http\Response
     */
    public function show(Token $token)
    {
        return $ticket;
    }

}
