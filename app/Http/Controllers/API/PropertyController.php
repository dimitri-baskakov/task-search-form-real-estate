<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Http\Resources\PropertyCollection;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Filter the specified resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $per_page = $request->per_page ?? 3;
        $name = $request->name;
        $priceFrom = $request->priceFrom;
        $priceTo = $request->priceTo;
        $bedrooms = $request->bedrooms;
        $bathrooms = $request->bathrooms;
        $storeys = $request->storeys;
        $garages = $request->garages;

        $query = Property::query()
            ->when($name, function($query, $name) {
                return $query->where('name', 'like', "%{$name}%");
            })
            ->when($priceFrom, function($query, $priceFrom) {
                return $query->where('price', '>=', $priceFrom);
            })
            ->when($priceTo, function($query, $priceTo) {
                return $query->where('price', '<=', $priceTo);
            })
            ->when($bedrooms, function($query, $bedrooms) {
                return $query->where('bedrooms', '=', $bedrooms);
            })
            ->when($bathrooms, function($query, $bathrooms) {
                return $query->where('bathrooms', '=', $bathrooms);
            })
            ->when($storeys, function($query, $storeys) {
                return $query->where('storeys', '=', $storeys);
            })
            ->when($garages, function($query, $garages) {
                return $query->where('garages', '=', $garages);
            })
        ;
        $properties = $query->paginate($per_page);

        return new PropertyCollection($properties);
    }

}
