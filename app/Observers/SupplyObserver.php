<?php

namespace App\Observers;

use App\Models\Supply;
use App\Models\SupplyStock;

class SupplyObserver
{
    /**
     * Handle the Supply "created" event.
     *
     * @param  \App\Models\Supply  $supply
     * @return void
     */
    public function created(Supply $supply)
    {
        //
        SupplyStock::create([
                'supplys_id' => $supply->id,
                //'current_stock'  => $supply->quantity,
                //'total'  => $supply->quantity,
            ]);
    }

    /**
     * Handle the Supply "updated" event.
     *
     * @param  \App\Models\Supply  $supply
     * @return void
     */
    public function updated(Supply $supply)
    {
         //$supply_stocks = SupplyStock::find($supply->id);
         //$current_stock = $supply->quantity;
         //$supply_stocks->current_stock = $current_stock;
        // $supply_stocks->total = $current_stock;
        // $supply_stocks->save();
    }

    /**
     * Handle the Supply "deleted" event.
     *
     * @param  \App\Models\Supply  $supply
     * @return void
     */
    public function deleted(Supply $supply)
    {
      $supply_stocks = SupplyStock::where('supplys_id', $supply->id);
      $supply_stocks->delete();
    }

    /**
     * Handle the Supply "restored" event.
     *
     * @param  \App\Models\Supply  $supply
     * @return void
     */
    public function restored(Supply $supply)
    {
        //
        $supply_stocks = SupplyStock::where('supplys_id', $supply->id);
        $supply_stocks->restore();
    }

    /**
     * Handle the Supply "force deleted" event.
     *
     * @param  \App\Models\Supply  $supply
     * @return void
     */
    public function forceDeleted(Supply $supply)
    {
        //
    }
}
