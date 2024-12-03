@component('mail::message')
    # Servis Selesai

    Halo, {{ $datapelanggan->nama }}!

    Servis perangkat Anda dengan nomor servis {{ $dataservis->id }} telah selesai. Silakan datang ke toko kami untuk
    mengambil perangkat Anda.

    Terima kasih,
    The Computer Store
@endcomponent
