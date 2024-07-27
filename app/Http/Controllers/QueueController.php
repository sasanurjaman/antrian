<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = date('Y-m-d');
        return view('queue.index', [
            'queues' => Queue::with('patient')
                ->where('created_at', 'LIKE', "%$date%")
                ->where('queue_active', 1)
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $date = date('Y-m-d');
        return view('queue.table', [
            'queues' => Queue::with('patient')
                ->where('created_at', 'LIKE', "%$date%")
                ->where('queue_active', 1)
                ->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // create queue nomber
        $date = date('Y-m-d');
        $queue = Queue::where('created_at', 'LIKE', "%$date%")->count() + 1;

        Queue::create([
            'patient_id' => $request->patient_id,
            'queue_number' => $queue,
            'queue_active' => 1,
        ]);

        return redirect()
            ->route('patient.show', $request->patient_id)
            ->with('success', 'pengambilan nomor antrian berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Queue $queue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Queue $queue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Queue $queue)
    {
        $queue->update([
            'queue_active' => $request->queue_active,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Queue $queue)
    {
        //
    }
}
