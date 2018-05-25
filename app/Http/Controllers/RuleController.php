<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Rule;

class RuleController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  \App\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (Rule::all()->count() == 0) 
        {
            $rule = new Rule;
                $rule->content = "[INSERT RULES HERE]";
            $rule->save();
        }

        return view('admin.rules.show')->with('rule', Rule::first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rule $rule)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $rule->content = $request->content;
        $rule->save();

        flash('Your rules has been successfully updated !')->success();
        return redirect()->back();
    }
}
