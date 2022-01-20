<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StarClustersController extends Controller
{

    public function redirect_m()
    {
        return redirect()->route("starclusters");
    }


    public function select()
    {
        $res = DB::select("SELECT * FROM starclusters ORDER BY id");
        return view("main", [
            "name" => "Звездные скопления",
            'row_name' => ["ID", "Название", "ID галактики", "ID класса звёздных скоплений"],
            'data' => $res,
            'type' => ['number', 'text', 'number', 'number']
        ]);
    }

    public function insert(Request $request)
    {
        DB::insert("INSERT INTO starclusters(name,galaxyid, clusterclassid)
                            VALUES(?)",
                            [$request->name, $request->galaxyid, $request->clusterclassid]);

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
            $deleted = DB::delete("DELETE FROM starclusters WHERE starclusters.id = ?", [(int)$val]);

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
            DB::update("UPDATE starclusters SET $key = ? WHERE id = ?", [$el, $request->id[0]]);
        }
        return $this->redirect_m();
    }
}
