<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'ten_nguoi_nhan' =>'required|string|max:255',
            'sdt_nguoi_nhan' =>'required|max:255|regex:/^([0-9\-\+\(\)]*)$/|min:10',
            'email_nguoi_nhan' =>'required|string|email|max:255',
            'dia_chi_nguoi_nhan' =>'required|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'ten_nguoi_nhan.required' =>'Tên là bắt buộn',
            'ten_nguoi_nhan.string' =>'Tên phải là chuỗi',
            'ten_nguoi_nhan.max' =>'Tên không được vượt quá 255 ký tự',

            'sdt_nguoi_nhan.required' =>'Số điện thoại là bắt buộc',
            'sdt_nguoi_nhan.max' =>'Số điện thoại là phải là chuỗi ký tự',
            'sdt_nguoi_nhan.regex' =>'Định dạng số điện thoại không hợp lệ ',
            'sdt_nguoi_nhan.min' =>'Số điện thoại phải có ít nhất 10 kí tự ',
            
            'email_nguoi_nhan.required' =>'Email là bắt buộc',
            'email_nguoi_nhan.string' =>'Email phải là chuỗi ký tự ',
            'email_nguoi_nhan.email' =>'Email phải là một địa chỉ email hợp lệ ',
            'email_nguoi_nhan.max' =>'Email không được vượt quá 255 ký tự ',

            'dia_chi_nguoi_nhan.required' =>'Địa chỉ là bắt buộc',
            'dia_chi_nguoi_nhan.string' =>'Địa chỉ phải là chuỗi ký tự ',
            'dia_chi_nguoi_nhan.max' =>'Địa chỉ không được vượt quá 255 ký tự  ',
        ];
    }


}
