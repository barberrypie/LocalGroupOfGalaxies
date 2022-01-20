<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SatellitesController extends Controller
{

    public function redirect_m()
    {
        return redirect()->route("satellites");
    }


    public function select()
    {
        $res = DB::select("SELECT * FROM satellites ORDER BY id");
        return view("main", [
            "name" => "Спутники",
            'row_name' => ["ID", "Название", "ID планеты", "Год открытия", "Размеры", "Масса"],
            'data' => $res,
            'type' => ['number', 'text', 'number', 'number', 'text', 'number']
        ]);
    }

    public function insert(Request $request)
    {
        DB::insert("INSERT INTO satellites((name, planetid, openingyear, dimensions, weigth)
                            VALUES(?)",
                            [$request->name, $request->planetid, $request->openingyear,
                                $request->dimensions, $request->weigth,]);

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
            $deleted = DB::delete("DELETE FROM satellites WHERE satellites.id = ?", [(int)$val]);

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
            DB::update("UPDATE satellites SET $key = ? WHERE id = ?", [$el, $request->id[0]]);
        }
        return $this->redirect_m();
    }
}
