<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Pagination\Paginator;
use App\Models\GruposUsuarios;
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

    public static function usuariosPorSucursal($id_sucursal)
    {
        Paginator::useBootstrap();
        $usuarios = User::where('id_sucursal', $id_sucursal)->paginate(20);
        return $usuarios;
    }


    public static function usuariosPorRol($id_rol)
    {
        Paginator::useBootstrap();
        $usuarios = User::where('id_rol_usuarios', $id_rol)->paginate(20);
        return $usuarios;
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

    public static function getSucursal($id_user)
    {
        $encontrado = User::find($id_user);
        return $encontrado->id_sucursal;
    }

    public function cambiarUsuariosABasicos($idGrupo)
    {
        User::where('id_rol_usuarios', $idGrupo)
            ->update(['id_rol_usuarios' => 4]);
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

    public static function validacionDePamSucursal($id_sucursal)
    {
        //Validando si en la sucursal hay gestor de paquetes
        $gestores = GruposUsuarios::gruposConGestor();
        foreach ($gestores as $gestor)
        {
            $sucursalValida = User::where([
                ['id_sucursal', '=', $id_sucursal],
                ['id_rol_usuarios', '=', $gestor->id]])->get();
            if (count($sucursalValida) != 0)
            {
                return true;
            }

        }
        return false;

    }

    public static function pamsSucursal($id)
    {
        return User::join('rol_usuarios','users.id_rol_usuarios','=','rol_usuarios.id')
        ->join('sucursal','users.id_sucursal','=','sucursal.id')
        ->select('users.*')
            ->where([['users.id_sucursal','=', $id],
            ['rol_usuarios.gestionarPaquetes','=','Y']])->get();
    }


    public static function validacionPamSucursal($id)
    {
        $encontrados = User::join('rol_usuarios','users.id_rol_usuarios','=','rol_usuarios.id')
        ->join('sucursal','users.id_sucursal','=','sucursal.id')
        ->select('users.*')
            ->where([['users.id_sucursal','=', $id],
            ['rol_usuarios.gestionarPaquetes','=','Y']])->get();
        if (count($encontrados) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    public static function validacionEmailUser($email)
    {
        $encontrado = User::where('email','=',$email)->first();
        if ($encontrado)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public static function validacionEmailUserMod($email,$id)
    {
        $encontrado = User::where([['email','=',$email],['id','!=', $id]])->first();
        if ($encontrado)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public static function usuariosTotales()
    {
        $resultado = User::get();
        return count($resultado);
    }

    public static function adminsTotales()
    {
        $resultado = User::where('id_rol_usuarios','=',1)->get();
        return count($resultado);
    }

    public static function userEstadisticas()
    {
        $resultado = User::join('rol_usuarios','users.id_rol_usuarios','=','rol_usuarios.id')
                                ->where('rol_usuarios.gestionarPaquetes','=','Y')->get();
        return count($resultado);
    }

    public static function nombreApellido($id)
    {
        $encontrado = User::find($id);
        $resultado = $encontrado->primerNombre.' '.$encontrado->primerApellido;
        return $resultado;
    }

    public static function destinatarioEntrante($id)
    {
        return User::find($id);
    }

    public static function destinatario($id)
    {
        return User::join('sucursal','users.id_sucursal','=','sucursal.id')
        ->select('users.primerNombre','users.segundoNombre','users.primerApellido','users.segundoApellido','users.apellidoCasada','sucursal.nombreSucursal')->find($id);
    }


}

