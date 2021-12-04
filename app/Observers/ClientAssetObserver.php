<?php

namespace App\Observers;

use App\Models\ClientAsset;

class ClientAssetObserver
{
    /**
     * Handle the ClientAsset "created" event.
     *
     * @param \App\Models\ClientAsset $clientAsset
     * @return void
     */
    public function created(ClientAsset $clientAsset)
    {
        activity()
            ->causedBy($clientAsset->employee)
            ->performedOn($clientAsset)
            ->log('إستلام');
    }

    /**
     * Handle the ClientAsset "updated" event.
     *
     * @param \App\Models\ClientAsset $clientAsset
     * @return void
     */
    public function updated(ClientAsset $clientAsset)
    {
        //
    }

    /**
     * Handle the ClientAsset "deleted" event.
     *
     * @param \App\Models\ClientAsset $clientAsset
     * @return void
     */
    public function deleted(ClientAsset $clientAsset)
    {
        //
    }

    /**
     * Handle the ClientAsset "restored" event.
     *
     * @param \App\Models\ClientAsset $clientAsset
     * @return void
     */
    public function restored(ClientAsset $clientAsset)
    {
        //
    }

    /**
     * Handle the ClientAsset "force deleted" event.
     *
     * @param \App\Models\ClientAsset $clientAsset
     * @return void
     */
    public function forceDeleted(ClientAsset $clientAsset)
    {
        //
    }
}
