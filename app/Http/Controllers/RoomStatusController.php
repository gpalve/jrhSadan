<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomStatusRequest;
use App\Models\RoomStatus;
use Illuminate\Http\Request;

class RoomStatusController extends Controller
{
    public function index(Request $request)
    {
        $roomstatuses = RoomStatus::orderBy('id');

        if (!empty($request->search)) {
            $roomstatuses = $roomstatuses->where('name', 'LIKE', '%' . $request->search . '%');
        }

        $roomstatuses = $roomstatuses->paginate(5);
        $roomstatuses->appends($request->all());
        return view('roomstatus.index', compact('roomstatuses'));
    }

    public function create()
    {
        return view('roomstatus.create');
    }

    public function store(StoreRoomStatusRequest $request)
    {
        $roomstatus = RoomStatus::create($request->all());
        return redirect()->route('roomstatus.index')->with('success', 'Room ' . $roomstatus->name . ' created');
    }

    public function edit(RoomStatus $roomstatus)
    {
        return view('roomstatus.edit', compact('roomstatus'));
    }

    public function update(StoreRoomStatusRequest $request, RoomStatus $roomstatus)
    {
        $roomstatus->update($request->all());
        return redirect()->route('roomstatus.index')->with('success', 'Room ' . $roomstatus->name . ' udpated!');
    }

    public function destroy(RoomStatus $roomstatus)
    {
        try {
            $roomstatus->delete();
            return redirect()->route('roomstatus.index')->with('success', 'Room ' . $roomstatus->name . ' deleted!');
        } catch (\Exception $e) {
            return redirect()->route('roomstatus.index')->with('failed', 'Room ' . $roomstatus->name . ' cannot be deleted! Error Code:' . $e->errorInfo[1]);;
        }
    }
}