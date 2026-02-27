<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;


use App\Models\Regra;
use App\Models\RegraUser;
use App\Models\Marca;
use App\Models\Produto;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

   

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bloqueio',
        'tipo_user',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /* public function regra(){
        return $this->belongsTo(Regra::class);
    } */
    
   /*  public function regras()
    {
        return $this->belongsToMany(Regra::class);
    } */

  
 
    public function regra_user()
    {
        return $this->hasMany(RegraUser::class, 'user_id');
    }

    public function regras()
    {
        return $this->belongsToMany(Regra::class, 'regra_user', 'user_id', 'regra_id');
    }

    public function marcas()
    {
        return $this->belongsToMany(Marca::class, 'brand_users', 'user_id', 'brand_id');
    }

    public function referencias()
    {
        return $this->belongsToMany(Produto::class, 'blocked_transfers', 'user_id', 'transfer_id');
    }

    public function brands()
    {
        return $this->belongsToMany(Marca::class, 'brand_users', 'user_id', 'brand_id');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'user_id', 'id');
    }
    
    
    public function rule_user()
    {
        return $this->hasMany(Regra_user::class, 'user_id');
    }

    public function rules()
    {
        return $this->belongsToMany(Regra::class, 'regra_user', 'user_id', 'regra_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Regra::class, 'regra_user', 'user_id', 'regra_id');
    }

}
