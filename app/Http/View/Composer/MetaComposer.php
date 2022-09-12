<?php

namespace App\Http\View\Composer;

use Illuminate\Support\Str;
use Illuminate\View\View;
// use App\City;
// use App\District;
// use App\State;
// use App\Country;


class MetaComposer
{

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $test = "welcome";
        $view->with(compact('test'));
        // $city=City::where('status',1)->get();
        // $view->with(compact('city'));
        // $district=District::where('status',1)->get();
        // $view->with(compact('district'));
        // $state=State::where('status',1)->get();
        // $view->with(compact('state'));
        // $country=Country::where('status',1)->get();
        // $view->with(compact('country'));
    }
}
