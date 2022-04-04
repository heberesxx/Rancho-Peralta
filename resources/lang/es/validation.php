<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'El campo :attribute debe ser aceptado.',
    'active_url'           => 'El campo :attribute no es una URL válida.',
    'after'                => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => 'Este campo solo puede contener letras.',
    'alpha_dash'           => 'Este campo solo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num'            => 'El campo :attribute solo puede contener letras y números.',
    'array'                => 'El campo :attribute debe ser un array.',
    'before'               => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => 'El campo :attribute debe ser un valor entre :min y :max.',
        'file'    => 'El archivo :attribute debe pesar entre :min y :max kilobytes.',
        'string'  => 'El campo :attribute debe contener entre :min y :max caracteres.',
        'array'   => 'El campo :attribute debe contener entre :min y :max elementos.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'El campo confirmación de :attribute no coincide.',
    'date'                 => 'El campo :attribute no corresponde con una fecha válida.',
    'date_equals'          => 'El campo :attribute debe ser una fecha igual a :date.',
    'date_format'          => 'El campo :attribute no corresponde con el formato de fecha :format.',
    'different'            => 'Los campos :attribute y :other deben ser diferentes.',
    'digits'               => 'El campo :attribute debe ser un número de :digits dígitos.',
    'digits_between'       => 'Este campo debe contener entre :min y :max dígitos.',
    'dimensions'           => 'El campo :attribute tiene dimensiones de imagen inválidas.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'Este campo debe de cumplir con un formato valido de correo electrónico.',
    'ends_with'            => 'El campo :attribute debe finalizar con alguno de los siguientes valores: :values',
    'exists'               => 'El campo :attribute seleccionado no existe.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute debe tener un valor.',
    'gt'                   => [
        'numeric' => 'Este campo debe ser mayor a :value.',
        'file'    => 'El archivo :attribute debe pesar más de :value kilobytes.',
        'string'  => 'El campo :attribute debe contener más de :value caracteres.',
        'array'   => 'El campo :attribute debe contener más de :value elementos.',
    ],
    'gte'                  => [
        'numeric' => 'El campo :attribute debe ser mayor o igual a :value.',
        'file'    => 'El archivo :attribute debe pesar :value o más kilobytes.',
        'string'  => 'El campo :attribute debe contener :value o más caracteres.',
        'array'   => 'El campo :attribute debe contener :value o más elementos.',
    ],
    'image'                => 'El campo :attribute debe ser una imagen.',
    'in'                   => 'El campo :attribute es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El campo :attribute debe ser un número entero.',
    'ip'                   => 'El campo :attribute debe ser una dirección IP válida.',
    'ipv4'                 => 'El campo :attribute debe ser una dirección IPv4 válida.',
    'ipv6'                 => 'El campo :attribute debe ser una dirección IPv6 válida.',
    'json'                 => 'El campo :attribute debe ser una cadena de texto JSON válida.',
    'lt'                   => [
        'numeric' => 'El campo :attribute debe ser menor a :value.',
        'file'    => 'El archivo :attribute debe pesar menos de :value kilobytes.',
        'string'  => 'El campo :attribute debe contener menos de :value caracteres.',
        'array'   => 'El campo :attribute debe contener menos de :value elementos.',
    ],
    'lte'                  => [
        'numeric' => 'El campo :attribute debe ser menor o igual a :value.',
        'file'    => 'El archivo :attribute debe pesar :value o menos kilobytes.',
        'string'  => 'El campo :attribute debe contener :value o menos caracteres.',
        'array'   => 'El campo :attribute debe contener :value o menos elementos.',
    ],
    'max'                  => [
        'numeric' => 'El campo :attribute no debe ser mayor a :max.',
        'file'    => 'El archivo :attribute no debe pesar más de :max kilobytes.',
        'string'  => 'Este campo no debe contener más de :max caracteres.',
        'array'   => 'El campo :attribute no debe contener más de :max elementos.',
    ],
    'mimes'                => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes'            => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => 'El campo :attribute debe ser al menos :min.',
        'file'    => 'El archivo :attribute debe pesar al menos :min kilobytes.',
        'string'  => 'Este campo debe contener al menos :min caracteres.',
        'array'   => 'El campo :attribute debe contener al menos :min elementos.',
    ],
    'not_in'               => 'El campo :attribute seleccionado es inválido.',
    'not_regex'            => 'El formato del campo :attribute es inválido.',
    'numeric'              => 'Este campo debe ser un número.',
    'password'             => 'La contraseña es incorrecta.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato del campo :attribute es inválido.',
    'required'             => 'Este campo  es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando el campo :other es :value.',
    'required_unless'      => 'El campo :attribute es requerido a menos que :other se encuentre en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los campos :values están presentes.',
    'same'                 => 'Los campos :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El campo :attribute debe ser :size.',
        'file'    => 'El archivo :attribute debe pesar :size kilobytes.',
        'string'  => 'El campo :attribute debe contener :size caracteres.',
        'array'   => 'El campo :attribute debe contener :size elementos.',
    ],
    'starts_with'          => 'El campo :attribute debe comenzar con uno de los siguientes valores: :values',
    'string'               => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone'             => 'El campo :attribute debe ser una zona horaria válida.',
    'unique'               => 'El valor que desea ingresar, ya existe.',
    'uploaded'             => 'El campo :attribute no se pudo subir.',
    'url'                  => 'El formato del campo :attribute es inválido.',
    'uuid'                 => 'El campo :attribute debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [

        'ID_CLIENTE' => 'dni cliente',
        'NUM_CELULAR' => 'numero celular',
        'NUM_ARETE' => 'número de arete',
        'COD_LUGAR' => 'lugar',
        'COD_ESTADO' => 'status',
        'PERSONA' => 'proveedor',
        "COD_REGISTRO_GANADO" => 'nombre ganado',
        "PRD_LITROS" => 'producción en litros',
        "DIA_LACTANCIA" => 'día de lactancia',
        "PRE_VENTA" => ' precio venta',
        "FEC_REGISTRO" => 'fecha venta',
        "COD_PERSONA" => 'cliente',
        "ARETE" => "arete",
        "NOMBRE" => "nombre",
        "COLOR" => "color",
        "ESTADO" => "estado",
        "LUGAR" => "lugar",
        "SEXO" => "sexo",
        "PRECIO" => "precio",
        "NUM_PAJILLA" => 'numero de pajilla',
        "PRE_ESPERMA" => 'precio',
        "RAZ_TORO_DONADOR" => 'raza',
        "PESO"=>'peso actual',
        "FIERRO" =>'fierro',
        "RAZA"=>'raza ganado',
        "NUM_PAJILLA"=>'número de pajilla',
       "PRE_ESPERMA"=>'precio esperma',
       "NOM_TORO_DONADOR"=>'nombre donador',
       "OBS_COMPRA_ESPERMA"=>'observación compra',
       "COD_EMBRION"=>'embrion',
       "RAZ_TORO"=>'raza toro',
       "FEC_MONTA"=>'fecha monta',
       "NOM_GANADO"=>'nombre ternero',
       "CLR_GANADO"=>'color ganado',
       "PES_ACTUAL"=>'peso actual',
       "FIE_GANADO"=>'fierro',
       "RAZ_GANADO"=>'raza',
       "SEX_GANADO"=>'sexo ganado',
       "FEC_NACIMIENTO"=>'fecha nacimiento',
       "IND_TRANS_EMBRION"=>'estado transferencia',
       "IND_TRANS_ESPERMA"=>'estado transferencia',
       "IND_TRANS_MONTA"=>'estado transferencia',
       "FEC_PARIR"=>'fecha parto',
       "OBS_VACAP"=>'observación parto',
       "IND_PRENADA"=>'status vaca preñada',
       "OBS_REGISTRO"=>'observacion registro',
       "FEC_ORDEÑO"=>'fecha ordeño',
       "DET_DIRECCION"=>'dirección',
       "NUM_AREA"=>'número de área',
       "username"=>'nombre de usuario',
       "ADM_MEDICAMENTO"=> 'Aplicar vía',
       "NOM_MEDICAMENTO"=> 'Nombre',
       "TRA_MEDICAMENTO"=> 'Tratamiento',
       "DOS_MEDICAMENTO"=> 'Dosis',
       "CAN_REORDEN"=> 'Cantidad de reorden',
       "COD_MEDICAMENTO"=> 'Medicamento',
       "CAN_MEDICAMENTO"=> 'Cantidad',
       "PRE_UNITARIO"=> 'Precio unitario',
       "FEC_VENCIMIENTO"=> 'Vencimiento',
       "FEC_COMPRA"=> 'Fecha de compra',
       "COD_PROVEEDOR"=>'proveedor',
       "COD_PRENADA_ESPERMA"=>'vaca que lo parió',
       "COD_PRENADA_EMBRION"=>'vaca que lo parió',
       "COD_PRENADA_MONTA"=>'vaca que lo parió',





    ],


];
