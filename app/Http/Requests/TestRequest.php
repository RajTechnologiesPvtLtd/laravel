<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $method = $this->method();
        if ($method == "GET") {
            return [];
        } elseif ($method == "DELETE") {
            return [];
        } elseif ($method == "POST") {
            return [
                'title' => "required"
            ];
        } else { //PUT & PATCH Method
            $user_id = $this->route()->parameters();
            return [
                'title' => "required"
            ];
        }
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'title',
        ];
    }
}
