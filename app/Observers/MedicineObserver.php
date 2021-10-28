<?php

namespace App\Observers;

use App\Models\Medicine;
use App\Models\MedicineStock;

class MedicineObserver
{
    /**
     * Handle the Medicine "created" event.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return void
     */
    public function created(Medicine $medicine)
    {
        //
        MedicineStock::create([
                'medicines_id' => $medicine->id,
                //'current_stock'  => $supply->quantity,
                //'total'  => $supply->quantity,
            ]);

    }

    /**
     * Handle the Medicine "updated" event.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return void
     */
    public function updated(Medicine $medicine)
    {
        //
    }

    /**
     * Handle the Medicine "deleted" event.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return void
     */
    public function deleted(Medicine $medicine)
    {
        //
        $medicine_stocks = MedicineStock::where('medicines_id', $medicine->id);
        $medicine_stocks->delete();
    }

    /**
     * Handle the Medicine "restored" event.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return void
     */
    public function restored(Medicine $medicine)
    {
        //
        $medicine_stocks = MedicineStock::where('medicines_id', $medicine->id);
        $medicine_stocks->restore();
    }

    /**
     * Handle the Medicine "force deleted" event.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return void
     */
    public function forceDeleted(Medicine $medicine)
    {
        //
    }
}
