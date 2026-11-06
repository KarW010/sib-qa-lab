<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class Anggota5Test extends DuskTestCase
{
    public function test_anggota_5(): void
    {
        // P9: Checkout kosong
        $this->markTestIncomplete('Lengkapi aksi dan assertion TC09-05, lalu hapus baris ini.');
        $this->browse(function (Browser $browser) {
            $browser->visit('/qa/reset');
            // TODO: Langsung klik Checkout Sekarang, pastikan pesan Keranjang kosong.
            // Di sini: $browser->... ; (beri titik koma pada akhir rantai)
        });
    }
}
