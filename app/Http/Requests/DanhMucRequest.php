<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucRequest extends FormRequest
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
            'ten_danh_muc'=>'required|max:255|unique:danh_mucs,ten_danh_muc,'.$this->route('danhmuc'),
        ];
    }
    public function messages(): array
    {
        return [
            'ten_danh_muc.required'=>'Tên danh mục bắt buộc',
            'ten_danh_muc.max'=>'không được vượt quá 255 ký tự',
            'ten_danh_muc.unique'=>'Danh mục đã tồn tại',
        ];
    }
}
