<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'primerNombre',
        'segundoNombre',
        'tercerNombre',
        'primerApellido',
        'segundoApellido',
        'apellidoCasada',
        'genero',
        'email',
        'password',
        'cargo',
        'id_rol_usuarios',
        'id_sucursal'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function obtenerPorEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function obtenerSucursal($id)
    {
        $encontrado = User::select('users.id','sucursal.nombreSucursal')
                            ->join('sucursal', 'users.id_sucursal', '=', 'sucursal.id')
                            ->where('users.id', $id)
                            ->first();
        return $encontrado->nombreSucursal;
    }

    public function obtenerPorId(string $username)
    {
        return User::where('id', $username)->first();
    }

    public function eliminarPorId(string $id)
    {
        User::destroy($id);
    }

    public function cambiarUsuariosABasicos($idGrupo)
    {
        User::where('id_rol_usuarios', $idGrupo)
            ->update(['id_rol_usuarios' => 4]);
    }

    public function updatePorIdAdmin($id, $nombre, $email)
    {
        $usuario = User::find($id);
        $usuario->name = $nombre;
        $usuario->email = $email;
        $usuario->id_rol = 1;
        $usuario->save();
    }

    public function updatePorIdUsuario($id, $nombre, $email)
    {
        $usuario = User::find($id);
        $usuario->name = $nombre;
        $usuario->email = $email;
        $usuario->id_rol = 2;
        $usuario->save();
    }

    public function crear(User $obj)
    {
        return $obj->save();
    }

    public function obtenerTodos()
    {
        return User::orderBy('created_at', 'desc')->get();
    }

    public function admins()
    {
        $admins = User::where('id_rol', 1)->get();
        return $admins->count();
    }

    public function usuariosN()
    {
        $usuariosN = User::where('id_rol', 2)->get();
        return $usuariosN->count();
    }
}

