<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Livewire\Quote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Livewire;
use Tests\TestCase;

class QuoteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_forbidden_response_if_not_logged_in()
    {
        $response = $this->get('/');

        $response->assertForbidden('/');

        $response->assertStatus(403);
    }

    public function test_the_application_redirects_to_home_after_login()
    {
        $response = $this->get('/?_token='.csrf_token() .'&site-password-protected=password');

        $response->assertStatus(302);

        $response->assertRedirect('/');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_quote_component_render()
    {
        Livewire::test(Quote::class)->call('render');
    }

    /**
     * @return void
     */
    public function test_that_quote_component_refresh()
    {
        Livewire::test(Quote::class)->call('refresh');
    }
}
