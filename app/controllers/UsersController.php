<?php
use Illuminate\Support\MessageBag;

class UsersController extends BaseController {


    /**
     * Login user
     *
     * @return mixed
     */
    public function loginAction() {

        $errors = new MessageBag();

        if ($old = Input::old("errors"))
        {
            $errors = $old;
        }

        $data = [
            "errors" => $errors
        ];

        if (Input::server("REQUEST_METHOD") == "POST")
        {
            $validator = Validator::make(Input::all(), [
                "username" => "required",
                "password" => "required"
            ]);

            if ($validator->passes())
            {
                $credentials = [
                    "username" => Input::get("username"),
                    "password" => Input::get("password")
                ];

                if (Auth::attempt($credentials))
                {
                    return Redirect::to("/");
                }
            }

            $data["errors"] = new MessageBag([
                "password" => [
                    "Username and/or password invalid."
                ]
            ]);

            $data["username"] = Input::get("username");

            return Redirect::route("users/login")
                ->withInput($data);
        }

        return View::make("users/login", $data);
    }


    /**
     * Logouts user
     *
     * @return mixed
     */
    public function logoutAction(){
        Auth::logout();
        return Redirect::to("/");
    }


}

