<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::paginate(5);
        return view('admins.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');

            if ($request->hasFile('hinh_anh')) {
                $filepath = $request->file('hinh_anh')->store('uploads/slider', 'public');
            } else {
                $filepath = null;
            }
            $param['hinh_anh'] = $filepath;

            Slider::create($param);
            return redirect()->route('sliders.index')->with('success', 'Thêm slider thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);

        return view('admins.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $param = $request->except('_token', '_method');

            $slider = Slider::findOrFail($id);

            if ($request->hasFile('hinh_anh')) {
                if ($slider->hinh_anh && Storage::disk('public')->exists($slider->hinh_anh)) {
                    Storage::disk('public')->delete($slider->hinh_anh);
                }
                $filepath = $request->file('hinh_anh')->store('uploads/slider', 'public');
            } else {
                $filepath = $slider->hinh_anh;
            }
            $param['hinh_anh'] = $filepath;
            $slider->update($param);
            return redirect()->route('sliders.index')->with('success', 'Cập nhật slider thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider->hinh_anh && Storage::disk('public')->exists($slider->hinh_anh)) {
            Storage::disk('public')->delete($slider->hinh_anh);
        }

        $slider->delete();
        
        return redirect()->route('sliders.index')->with('success', 'Xoá thành công');
    }
}
