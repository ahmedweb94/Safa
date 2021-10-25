<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date'=>['nullable','date_format:Y-m-d'],
            'limit'=>['nullable','int','numeric'],
            'language'=>['nullable','string'],
            'sort'=>['nullable'],
            'order'=>['nullable','in:asc,desc'],
        ];
    }

    public function validated()
    {
        return array_merge(parent::validated(), [
            'date' => $this->date??'2019-10-01',
            'limit' => $this->limit??'10',
            'sort' => $this->sort??'stars',
            'order' => $this->order??'desc',
        ]);
    }
}
