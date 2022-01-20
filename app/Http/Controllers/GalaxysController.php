<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GalaxysController extends Controller
{

    public function redirect_m()
    {
        return redirect()->route("galaxy");
    }


    public function select()
    {
        $res = DB::select("SELECT * FROM galaxy ORDER BY id");
        return view("main", [
            "name" => "Галактики",
            'row_name' => ["ID", "Название галактики", "ID типа галактики", "Радиус галактики в парсеках", "Масса относительно массы Земли"],
            'data' => $res,
            'type' => ['number', 'text', 'number', 'number', 'number']
        ]);
    }

    public function insert(Request $request)
    {

        DB::insert("INSERT INTO Galaxy(name, typeid, radius, weigth)
                            VALUES(?, ?, ?, ?)",
                            [$request->name, $request->typeid, $request->radius, $request->weigth]);

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
            $deleted = DB::delete("DELETE FROM galaxy WHERE galaxy.id = ?", [(int)$val]);

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
            DB::update("UPDATE galaxy SET $key = ? WHERE id = ?", [$el, $request->id[0]]);
        }
        return $this->redirect_m();
    }
}
