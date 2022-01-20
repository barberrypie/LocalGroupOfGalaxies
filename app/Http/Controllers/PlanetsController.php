<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PlanetsController extends Controller
{

    public function redirect_m()
    {
        return redirect()->route("planets");
    }


    public function select()
    {
        $res = DB::select("SELECT * FROM planets ORDER BY id");
        return view("main", [
            "name" => "Планеты",
            'row_name' => ["ID", "Название", "ID звезды", "Масса", "Диаметр", "Максимальная температура",
                "Минимальная температура", "Продолжительность дня"],
            'data' => $res,
            'type' => ['number', 'text', 'number', 'number', 'number', 'number',
                'number', 'number',]
        ]);
    }

    public function insert(Request $request)
    {

        DB::insert("INSERT INTO planets(name, starid, weigth, diameter, temperaturemax, temperaturemin, dayduration)
                            VALUES(?, ?, ?, ?, ?, ?, ?)",
                            [$request->name, $request->starid, $request->weigth, $request->diameter,
                                $request->temperaturemax, $request->temperaturemin, $request->dayduration]);

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
            $deleted = DB::delete("DELETE FROM planets WHERE planets.id = ?", [(int)$val]);

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
            DB::update("UPDATE planets SET $key = ? WHERE id = ?", [$el, $request->id[0]]);
        }
        return $this->redirect_m();
    }
}
