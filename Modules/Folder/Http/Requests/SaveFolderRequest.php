<?php

namespace Modules\Folder\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Folder\Entities\Folder;
use Modules\Base\Http\Requests\Request;

class SaveFolderRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'folder::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'name' => 'required|alpha_dash',
            'name' => $this->getNameRules(),
            'slug' => $this->getSlugRules(),
            'is_active' => 'required|boolean',
        ];
    }

    private function getSlugRules()
    {
        $rules = $this->route()->getName() === 'admin.folders.update'
            ? ['required']
            : ['nullable'];

        $slug = Folder::withoutGlobalScope('isactive')->where('id', $this->id)->value('slug');

        $rules[] = Rule::unique('folders', 'slug')->ignore($slug, 'slug');

        return $rules;
    }
    
    private function getNameRules()
    {
        $rules = ['required','alpha_dash'];
        
        $name=Rule::unique('folders');
        
        if(!is_null($this->parent_id)) {
            $parent_id=$this->parent_id;
            $name->where('parent_id', $parent_id);
        }else{
            $name->whereNull('parent_id');
        }
        
        
        if($this->route()->getName() === 'admin.folders.update')
        {
            $name->ignore($this->id, 'id');
        }
        
        $rules[] =$name;

        return $rules;
    }
}
