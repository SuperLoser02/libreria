<?php

namespace App\Http\Requests\Productos;

use App\Models\Producto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'codigo' => ['required', 'string', 'regex:[A-Z]{3}-[0-9]{5}',  Rule::unique('productos', 'codigo')->ignore($this->route('producto'), 'codigo')],
            'nombre' => ['required', 'string', 'max:80'],
            'precio' => ['required', 'numeric', 'regex:[0-9]{8}+[.][0-9]{2}'],
            'fecha_de_publicacion' => ['required', 'date_format:Y-m-d H:i:s'],
            'editoriale_id' => ['required', 'string', 'exists:editoriales,nombre'],
            //'imagen' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'] //ya no se que poner aqui debe ser obligatorio
            'producto_tipo' => ['request', 'string', 'max:15'],
            'autor' =>  ['required', 'string', 'max:60'],
            'generos' => ['required', 'array'],
        ];
    }
}
