<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class Anggota1Test extends DuskTestCase
{
    public function test_anggota_1(): void
    {
        // P9: Halaman produk
        $this->browse(function (Browser $browser) {
            $browser->visit('/qa/reset')
                    ->assertSee('Kopi Arabika')
                    ->assertSee('Teh Melati');
        });
    }
}