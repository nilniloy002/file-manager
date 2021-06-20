<?php

namespace Modules\User\Http\Controllers\Admin;

use Modules\User\Entities\User;
use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasDefaultActions;
use Modules\User\Http\Requests\SaveUserRequest;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Modules\Folder\Entities\Folder;

class UserController extends Controller
{
    use HasDefaultActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'user::users.user';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'user::admin.users';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected $validation = SaveUserRequest::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\User\Http\Requests\SaveUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUserRequest $request)
    {
        $request->merge(clean($request->all()));
        $request->merge(['password' => bcrypt($request->password)]);

        $user = User::create($request->all());

        $user->roles()->attach($request->roles);
        $user->file_extensions()->sync(array_get($request->all(), 'file_extensions', []));
        $folders=array_get($request->all(), 'folders', []);
        if(!empty($folders)){
            
            $subfolder=Folder::with('children')->whereIn('parent_id',$folders)->get()->toArray();
            
            $subfolderId=get_folders_ids($subfolder);
           
            $folders=array_unique(array_merge($folders,$subfolderId));
        }
        $user->folders()->sync($folders);
        
        Activation::complete($user, Activation::create($user)->code);
        
        activity('user')
            ->performedOn($user)
            ->causedBy(auth()->user())
            ->withProperties(['subject' => $user,'causer'=>auth()->user()])
            ->log('created');
        
        return redirect()->route('admin.users.index')
            ->withSuccess(trans('admin::messages.saved_message', ['resource' => trans('user::users.user')]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param \Modules\User\Http\Requests\SaveUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, SaveUserRequest $request)
    {
        $request->merge(clean($request->all()));
        $user = User::findOrFail($id);
        //dd($request->password);
        if (is_null($request->password) || $request->password=='' ) {
            unset($request['password']);
        } else {
            $request->merge(['password' => bcrypt($request->password)]);
        }

        $user->update($request->all());

        $user->roles()->sync($request->roles);
        $user->file_extensions()->sync(array_get($request->all(), 'file_extensions', []));
        $folders=array_get($request->all(), 'folders', []);
        if(!empty($folders)){
            
            $subfolder=Folder::with('children')->whereIn('parent_id',$folders)->get()->toArray();
            
            $subfolderId=get_folders_ids($subfolder);
           
            $folders=array_unique(array_merge($folders,$subfolderId));
        }
        $user->folders()->sync($folders);
        if (! Activation::completed($user) && $request->activated === '1') {
            Activation::complete($user, Activation::create($user)->code);
        }

        if (Activation::completed($user) && $request->activated === '0') {
            Activation::remove($user);
        }
        
        activity('user')
            ->performedOn($user)
            ->causedBy(auth()->user())
            ->withProperties(['subject' => $user,'causer'=>auth()->user()])
            ->log('updated');
        
        return redirect()->route('admin.users.index')
            ->withSuccess(trans('admin::messages.update_message', ['resource' => trans('user::users.user')]));
    }
}
