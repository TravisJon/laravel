<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifikasiSelesaiServis extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $datapelanggan;
    public $dataservis;

    public function __construct($pelanggan, $servis)
    {
        $this->datapelanggan = $pelanggan;
        $this->dataservis = $servis;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'))
            ->subject('Servis Perangkat Anda Sudah Selesai')
            ->markdown('emails.selesai_servis')
            ->with([
                'datapelanggan' => $this->datapelanggan,
                'dataservis' => $this->dataservis,
            ]);
    }
}
