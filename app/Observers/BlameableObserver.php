<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BlameableObserver
{
    public function creating(Model $model)
    {
        if(Auth::check()){
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        }else{
            $model->created_by = null;
            $model->updated_by = null;
        }
        
    }

    public function updating(Model $model)
    {
        if(Auth::check()){
            $model->updated_by = Auth::user()->id;
        }else{
            $model->updated_by = null;
        }
    }
}
