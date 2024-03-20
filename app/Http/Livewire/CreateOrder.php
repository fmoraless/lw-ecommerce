<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;

class CreateOrder extends Component
{
    public $envio_type = 1;
    public $contact, $phone, $address, $references;
    public $department, $cities = [], $districts = [];
    public $department_id = "", $city_id = "", $district_id ="";

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
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}
