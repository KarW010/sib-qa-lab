<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class Anggota4Test extends DuskTestCase
{
    public function test_anggota_4(): void
    {
        // P9: Jumlah nol ditolak
        $this->markTestIncomplete('Lengkapi aksi dan assertion TC09-04, lalu hapus baris ini.');
        $this->browse(function (Browser $browser) {
            $browser->visit('/qa/reset');
            // TODO: Isi #qty_kopi dengan 0, klik Tambah Kopi, pastikan pesan validasi.
            // Di sini: $browser->... ; (beri titik koma pada akhir rantai)
        });
    }
}
