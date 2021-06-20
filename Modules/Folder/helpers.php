<?php

if (! function_exists('get_folders_ids')) {
    
    function get_folders_ids($folders)
    {
        $ids=[];
        foreach($folders as $folder) {
            
            $ids[]=$folder['id'];
            
            if(!empty($folder['children'])){
                $childrens=$folder['children'];
                
                foreach($childrens as $children)
                { 
                    $children_ids=get_folders_ids([$children]);
                    $ids=array_merge($ids, $children_ids);
                }
            }
            
            
        }
        
        return $ids;
        
    }
    
}
