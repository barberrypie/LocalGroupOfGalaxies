<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClusterClassesController extends Controller
{

    public function redirect_m()
    {
        return redirect()->route("clusterclasses");
    }


    public function select()
    {
        $res = DB::select("SELECT * FROM clusterclasses ORDER BY id");
        return view("main", [
            "name" => "Классы звёздных скоплений",
            'row_name' => ["ID", "Название"],
            'data' => $res,
            'type' => ['number', 'text']
        ]);
    }

    public function insert(Request $request)
    {
        DB::insert("INSERT INTO clusterclasses(name)
                            VALUES(?)",
                            [$request->name]);

        return $this->redirect_m();
    }

    public function delete(Request $request)
    {
        if ($request->id == null)
        {
            return $this->redirect_m();
        }
        $id = $request->id;
        foreach ($id as &$val) {
            $deleted = DB::delete("DELETE FROM clusterclasses WHERE clusterclasses.id = ?", [(int)$val]);

        }
        return $this->redirect_m();
    }

    public function update(Request $request)
    {
        if ($request->id == null)
        {
            return $this->redirect_m();
        }

        $isFirst = true;
        foreach ($request->all() as $key => $el)
        {
            if ($el == null || $key == 'id' || $key == '_token')
            {
                $isFirst = false;
                continue;
            }
            DB::update("UPDATE clusterclasses SET $key = ? WHERE id = ?", [$el, $request->id[0]]);
        }
        return $this->redirect_m();
    }
}
