<?php

namespace Modules\User\Entities;

use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Modules\User\Admin\Table\UserTable;
use Modules\User\Repositories\Permission;
use Modules\Files\Entities\FileExtension;
use Modules\Folder\Entities\Folder;
use Spatie\Activitylog\Traits\LogsActivity;
use Modules\Media\Entities\Media;
use Modules\Media\Eloquent\HasMedia;

class User extends EloquentUser implements AuthenticatableContract
{
    use Authenticatable,HasMedia;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'password', 
        'permissions',
        'file_size',
    ];
    
    protected $dates = ['last_login'];
    
    protected $appends = ['full_name'];
    
    protected static $logName = 'users';
    
    protected static function boot()
    {
        parent::boot();

        /* static::saved(function ($user) {
            if (! empty(request()->all())) {
                $user->saveRelations(request()->all());
            }
        }); */

    }
    
    public function file_extensions()
    {
        return $this->belongsToMany(FileExtension::class, 'user_file_extensions');
        
    } 
    
    public function folders()
    {
        
        return $this->belongsToMany(Folder::class, 'user_folders');
    }
    
    /* public function saveRelations($attributes = [])
    {
        if(isset($attributes['file_extensions'])){
            $this->file_extensions()->sync(array_get($attributes, 'file_extensions', []));
        }
        
        if(isset($attributes['folders'])){
            $folders=array_get($attributes, 'folders', []);
            if(!empty($folders)){
                
                $subfolder=Folder::with('children')->whereIn('parent_id',$folders)->get()->toArray();
                
                $subfolderId=get_folders_ids($subfolder);
               
                $folders=array_unique(array_merge($folders,$subfolderId));
            }
            $this->folders()->sync($folders);
        }
        
    } */
    
    public static function registered($email)
    {
        return static::where('email', $email)->exists();
    }

    public static function findByEmail($email)
    {
        return static::where('email', $email)->first();
    }
    
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }

    /**
     * Login the user.
     *
     * @return $this|bool
     */
    public function login()
    {
        return auth()->login($this);
    }

    /**
     * Determine if the user is a User.
     *
     * @return bool
     */
    public function isUser()
    {
        if ($this->hasRoleName('admin')) {
            return false;
        }

        return $this->hasRoleId(setting('user_role'));
    }
    
    /**
     * Determine if the user is a User.
     *
     * @return bool
     */
    public function isAdmin()
    {
        if ($this->hasRoleName('admin')) {
            return true;
        }

        return false;
    }

    /**
     * Checks if a user belongs to the given Role ID.
     *
     * @param int $roleId
     * @return bool
     */
    public function hasRoleId($roleId)
    {
        return $this->roles()->whereId($roleId)->count() !== 0;
    }

    /**
     * Checks if a user belongs to the given Role Slug.
     *
     * @param string $slug
     * @return bool
     */
    public function hasRoleSlug($slug)
    {
        return $this->roles()->whereSlug($slug)->count() !== 0;
    }

    /**
     * Checks if a user belongs to the given Role Name.
     *
     * @param string $name
     * @return bool
     */
    public function hasRoleName($name)
    {
        return $this->roles()->whereName($name)->count() >= 1;
    }

    /**
     * Check if the current user is activated.
     *
     * @return bool
     */
    public function isActivated()
    {
        return Activation::completed($this);
    }
    
    public function scopeWithProfileImage($query)
    {
        $query->with(['media' => function ($q) {
            $q->wherePivot('zone', 'profile_image');
        }]);
    }
    
    public function getProfileImageAttribute()
    {
        return $this->media->where('pivot.zone', 'profile_image')->first() ?: new Media;
    }
    
    /**
     * Get the roles of the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles')->withTimestamps();
    }
    
    
    /**
     * Get the full name of the user.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Set user's permissions.
     *
     * @param array $permissions
     * @return void
     */
    public function setPermissionsAttribute(array $permissions)
    {
        $this->attributes['permissions'] = Permission::prepare($permissions);
    }

    /**
     * Determine if the user has access to the given permissions.
     *
     * @param array|string $permissions
     * @return bool
     */
    public function hasAccess($permission)
    {
        $permission = is_array($permission) ? $permission : func_get_args();
        $permissions = $this->getPermissionsInstance();
        return $permissions->hasAccess($permission);
    }

    /**
     * Determine if the user has access to the any given permissions
     *
     * @param array|string $permissions
     * @return bool
     */
    public function hasAnyAccess($permission)
    {
        $permission = is_array($permission) ? $permission : func_get_args();
        $permissions = $this->getPermissionsInstance();

        return $permissions->hasAnyAccess($permission);
    }
    
    /**
     * Get table data for the resource
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function table()
    {
        return new UserTable($this->newQuery());
    }
    
    public static function totalUsers()
    {
        return Role::findOrNew(setting('user_role'))->users()->count();
    }
    
    
    public static function list()
    {
        return static::select('id','first_name','last_name')
            ->get()
            ->mapWithKeys(function ($user) {
                return [$user->id => $user->FullName];
            });
    }
    
}
