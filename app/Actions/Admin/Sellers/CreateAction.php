<?php

namespace App\Actions\Admin\Sellers;

use Error;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAction
{

    /**
     * Create a seller
     * 
     * @param array $data
     * @return Seller
     */
    public function __invoke($data): Seller
    {

        $validate = Validator::make($data, [
            'name'          => 'required|min:3|max:255',
            'display_name'  => 'required|min:3|max:255',
            'document'      => 'required|min:11|max:14',
            'phone'         => 'required|min:10|max:11',
            'email'         => 'required|email|unique:sellers,email',
        ])->validate();

        $seller = Seller::create($validate);

        return $seller;
    }
}
