<?php

namespace Modules\User\Http\Controllers\Admin;

use Modules\User\Http\Controllers\BaseAuthController;
use Laravel\Socialite\Facades\Socialite;
use Modules\User\Entities\User;

class AuthController extends BaseAuthController
{
    /**
     * Where to redirect users after login..
     *
     * @return string
     */
    protected function redirectToUrl()
    {
        return route('admin.files.manager');
    }

    /**
     * The login URL.
     *
     * @return string
     */
    protected function loginRoute()
    {
        return route('admin.login');
    }

    /**
     * Show login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLoginView()
    {
        return view('user::admin.auth.login');
    }
    
    /**
     * Show registrations form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegisterView()
    {
        if(!setting('allow_registrations'))
        {
              return redirect()->route('admin.login');
        }
        return view('user::admin.auth.register');
    }
    

    /**
     * Show reset password form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getResetView()
    {
        return view('user::admin.auth.reset.index');
    }

    /**
     * Reset complete form route.
     *
     * @param \Modules\User\Entities\User $user
     * @param string $code
     * @return string
     */
    protected function resetCompleteRoute($user, $code)
    {
        return route('admin.reset.complete', [$user->email, $code]);
    }

    /**
     * Password reset complete view.
     *
     * @return string
     */
    protected function resetCompleteView()
    {
        return view('user::admin.auth.reset.complete');
    }
    
    /**
     * Redirect the user to the given provider authentication page.
     *
     * @param string $provider
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        if (! in_array($provider, app('enabled_social_login_providers'))) {
            abort(404);
        }

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the given provider.
     *
     * @param string $provider
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        if (! in_array($provider, app('enabled_social_login_providers'))) {
            abort(404);
        }

        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect()->route('login');
        }

        if (User::registered($user->getEmail())) {
            
            $loggedIn =auth()->login(
                User::findByEmail($user->getEmail())
            );
            
            activity('user')
                ->performedOn($loggedIn)
                ->causedBy($loggedIn)
                ->withProperties(['subject' => $loggedIn,'causer'=>$loggedIn])
                ->log('login');

            return redirect($this->redirectToUrl());
        }
        if(!setting('allow_registrations'))
        {
              return redirect()->route('admin.login')->withError(trans('user::messages.users.invalid_credentials'));
        }
        [$firstName, $lastName] = $this->extractName($user->getName());

        $data = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $user->getEmail(),
            'password' => str_random(),
        ];
        
        if (setting('auto_approve_user')) {
            $registeredUser = $this->auth->registerAndActivate($data);
        
        }else{
            $registeredUser = $this->auth->register($data);
        }
        
        activity('user')
                ->performedOn($registeredUser)
                ->causedBy($registeredUser)
                ->withProperties(['subject' => $registeredUser,'causer'=>$registeredUser])
                ->log('register');
        
        $this->assignUserRole($registeredUser);
        
        if (setting('auto_approve_user')) {
            auth()->login($registeredUser);
            return redirect($this->redirectToUrl());
        }else{
            return redirect($this->loginRoute())
                ->withSuccess(clean(trans('user::messages.users.account_created_but_need_admin_review')));
        }
        
    }
    
    private function extractName($name)
    {
        return explode(' ', $name, 2);
    }
    
}
