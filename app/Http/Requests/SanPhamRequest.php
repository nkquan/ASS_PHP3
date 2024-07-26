<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
            'ma_san_pham' =>'required|max:10|unique:san_phams,ma_san_pham,'.$this->route('sanpham'),
            'ten_san_pham' =>'required|max:255',
            'gia_san_pham' =>'required|numeric|min:0',
            'gia_khuyen_mai' =>'required|numeric|min:0|lt:gia_san_pham',
            'hinh_anh' =>'image|mimes:jpg,jpeg,png,gif',
            'so_luong' =>'required|integer|min:0',
            'ngay_nhap' =>'required|date',
            'mo_ta' =>'max:255',
            'danh_muc_id' =>'required|exists:danh_mucs,id',
        ];
    }
    public function messages(): array
    {
        return [
            'ma_san_pham.required' =>'Mã sản phẩm là bắt buộc',
            'ma_san_pham.max' =>'Mã sản phẩm không vượt quá 10 ký tự',
            'ma_san_pham.unique' =>'Mã sản phẩm đã tồn tại',
            'ten_san_pham.required' =>'Tên sản phẩm là bắt buộc',
            'ten_san_pham.max' =>'Tên sản phẩm không vượt quá 255 ký tự',
            'gia_san_pham.required' =>'Giá sản phẩm bắt buộc',
            'gia_san_pham.numeric' =>'Giá sản phẩm phải là số',
            'gia_san_pham.min' =>'Giá sản phẩm phải lớn hơn 0',
            'gia_khuyen_mai.required' =>'Giá khuyến mãi bắt buộc',
            'gia_khuyen_mai.numeric' =>'Giá khuyến mãi phải là số',
            'gia_khuyen_mai.min' =>'Giá khuyến mãi phải lớn hơn 0 ',
            'gia_khuyen_mai.lt' =>'Giá khuyến mãi phải nhỏ hơn giá sản phẩm',
            'hinh_anh.image' =>'Hình ảnh không hợp lệ',
            'hinh_anh.mimes' =>'Hình ảnh không hợp lệ',
            'so_luong.required' =>'Số lượng là bắt buộc',
            'so_luong.integer' =>'Số lượng phải là số dương',
            'so_luong.min' =>'Số lượng phải lớn hơn 0',
            'ngay_nhap.required' =>'Ngày nhập là bắt buộc',
            'ngay_nhap.date' =>'Ngày nhập sai định dạng',
            'mo_ta.max' =>'Mô tả quá dài không vượt quá 255 ký tự',
            'danh_muc_id.required' =>'Danh mục là bắt buộc',
            'danh_muc_id.exists' =>'Danh mục không tồn tại',
        ];
    }
}
