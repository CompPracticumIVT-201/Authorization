<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getData()
    {
        $data = User::all(); // Получаем все записи из вашей таблицы

        return response()->json($data);
    }
}
