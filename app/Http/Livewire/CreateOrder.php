<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Department;

class CreateOrder extends Component
{
    public $envio_type = 1;
    public $contact, $phone, $address, $references;
    public $department, $cities = [], $districts = [];
    public $department_id = "", $city_id = "", $district_id ="";
    public $shipping_cost = 0;

    public $rules = [
        'contact'    => 'required',
        'phone'      => 'required',
        'envio_type' => 'required',
    ];

    public function mount(){
        $this->departments = Department::all();
    }

    /*para estar a escucha del campo envio_type*/
    public function updatedEnvioType($value)
    {
        if ($value == 1) {
            $this->resetValidation([
                'department_id',
                'city_id',
                'district_id',
                'address',
                'references'
            ]);
        }
    }

    public function create_order()
    {
        $rules = $this->rules;
        if ($this->envio_type == 2) {
            $rules['department_id'] = 'required';
            $rules['city_id'] = 'required';
            $rules['district_id'] = 'required';
            $rules['address'] = 'required';
            $rules['references'] = 'required';
        }

        $this->validate($rules);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->contact = $this->contact;
        $order->phone = $this->phone;
        $order->envio_type = $this->envio_type;
        $order->shipping_cost = $this->shipping_cost;
        $order->total = $this->shipping_cost + Cart::subtotal();
        $order->content = Cart::content();
        $order->save();

        Cart::destroy();

        // redirigir al usuario a pagar
        return redirect()->route('orders.payment', $order);
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}
