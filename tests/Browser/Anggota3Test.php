<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class Anggota3Test extends DuskTestCase
{
    public function test_anggota_3(): void
    {
        // P9: Checkout teh
        $this->markTestIncomplete('Lengkapi aksi dan assertion TC09-03, lalu hapus baris ini.');
        $this->browse(function (Browser $browser) {
            $browser->visit('/qa/reset');
            // TODO: Tambah Teh, klik Checkout Sekarang, pastikan pesan sukses muncul.
            // Di sini: $browser->... ; (beri titik koma pada akhir rantai)
        });
    }
}
