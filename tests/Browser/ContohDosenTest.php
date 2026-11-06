<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ContohDosenTest extends DuskTestCase
{
    public function test_contoh_halaman_produk(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/qa/reset')
                ->assertSee('Daftar Produk')
                ->assertSee('Kopi Arabika');
        });
    }
}
