<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\AttributeOptions;
use DB;

class AttributeController extends Controller
{    //attribute section start


    public function attribute()
    {
        $data['attributes'] = DB::table('attributes')
        ->leftJoin('attribute_options', 'attribute_options.attribute_id', 'attributes.id')
        ->select('attributes.*', DB::raw('group_concat(attribute_options.value) as `options`'))
        ->groupBy('attributes.id')
        ->get();
        //$data['attributes'] = DB::table('attributes')->get();
        return view('admin.attribute.attribute', $data);
    }

    public function add_attribute(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $attribute       = new Attribute();
        $attribute->name = $request->name;
        $result          = $attribute->save();
        /*  return  flashback('attribute_save'); */
        flash("Attribute has added successfully!")->success();
        return redirect(route('admin.attribute'));
    }





    public function attribute_options($id)
    {
        $attribute_id = $id;
        $data['attribute'] = Attribute::findOrfail($id);
        $data['attributes_list'] = AttributeOptions::where('attribute_id', $id)->get();
        return view('admin.attribute.attribute-options', $data);
    }


    public function add_attribute_options(Request $request)
    {
        $request->validate([
            'value' => 'required'
        ]);
        $attribute               = new AttributeOptions();
        $attribute->attribute_id = $request->attribute_id;
        $attribute->value         = $request->value;
        $result                  = $attribute->save();
        /*  return flashback('attribute_option_save'); */
        flash("Attribute option has added successfully!")->success();
        return redirect(route('admin.attribute'));
    }


    public function delete_attribute($id)
    {
        $attribute =  Attribute::findOrfail($id);
        $attribute->delete($id);
        /*  return flashback('attribute_deleted'); */
        flash("Attribute  has deleted successfully!")->success();
        return redirect(route('admin.attribute'));
    }


    public function delete_attribute_option($id)
    {
        $attribute =  AttributeOptions::findOrfail($id);
        $attribute->delete($id);
        /*   return flashback('attribute_option_deleted'); */
        flash("Attribute option has deleted successfully!")->success();
        return redirect(route('admin.attribute'));
        //return back();
    }

    public function edit_attribute_options($id)
    {
        $data['attribute_option'] = AttributeOptions::findOrfail($id);
        return view('admin.attribute.attribute-option-edit', $data);
    }


    public function update_attribute_options(Request $request)
    {
        $attribute =  AttributeOptions::findOrfail($request->id);
        $attribute->value = $request->value;
        $attribute->save();
        /*  return flashback('attribute_option_updated'); */
        flash("Attribute option has updated successfully!")->success();
        return redirect(route('admin.attribute'));
    }

    public function edit_attribute($id)
    {
        $data['attribute'] = Attribute::findOrfail($id);
        return view('admin.attribute.attribute-edit', $data);
    }


    public function update_attribute(Request $request)
    {
        $attribute =  Attribute::findOrfail($request->id);

        $attribute->name = $request->name;
        $attribute->save();
        /*  return flashback('attribute_option_updated'); */
        flash("Attribute has been updated successfully!")->success();
        return redirect(route('admin.attribute'));
    }
}
