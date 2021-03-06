<?php


namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Waavi\Sanitizer\Laravel\SanitizesInput;

abstract class BaseFormRequest extends FormRequest
{
    use SanitizesInput;

    public function validateResolved()
    {
        $this->sanitize();
        parent::validateResolved();
    }

    /**
     * @return array
     */
    abstract public function rules();

    /**
     * @return bool
     */
    abstract public function authorize();
}