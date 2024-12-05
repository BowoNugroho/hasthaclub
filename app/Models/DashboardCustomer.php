<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Blameable;
use App\Traits\UuidTraits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DashboardCustomer extends Authenticatable
{
    public static function getInformasiCs($id)
    {
        return DB::table('users')->where('id', $id)->first();  // Mengambil semua post
    }

    public static function UpdateInformasiCs($request)
    {
        $id =  $request->id;

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'username' => $request->ktp,
            'gender' => $request->gender,
        ];

        $user = DB::table('users')
            ->where('id', $id)
            ->update($data);

        return $user;
    }
}
