<?php

namespace App\View\Components;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class WebLayout extends Component
{
    public $categories;
    public $brands;
    /**
     * Create a new component instance.
     *
     * @return void 
     */
    

    public function __construct()
    {
        $this->categories = DB::table('phan_loai')->get();
        $this->brands = DB::table('nha_san_xuat')->get();
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.web-layout');
    }
}
