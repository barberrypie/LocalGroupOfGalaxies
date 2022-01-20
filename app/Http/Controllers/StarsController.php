<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StarsController extends Controller
{

    public function redirect_m()
    {
        return redirect()->route("stars");
    }


    public function select()
    {
        $res = DB::select("SELECT * FROM stars ORDER BY id");
        return view("main", [
            "name" => "Звезды",
            'row_name' => ["ID", "Название", "ID планеты", "ID звездного скопления", "Температура",
                "Масса", "Возраст"],
            'data' => $res,
            'type' => ['number', 'text', 'number', 'number',
                'number', 'number', 'number']
        ]);
    }

    public function insert(Request $request)
    {
        DB::insert("INSERT INTO stars(name, startypeid, starclusterid, temperature, weigth, age)
                            VALUES(?, ?, ?, ?, ?, ?)",
                            [$request->name, $request->startypeid, $request->starclusterid,
                                $request->temperature, $request->weigth, $request->age]);

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
            $deleted = DB::delete("DELETE FROM stars WHERE stars.id = ?", [(int)$val]);

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
            DB::update("UPDATE stars SET $key = ? WHERE id = ?", [$el, $request->id[0]]);
        }
        return $this->redirect_m();
    }
}
