<?php

namespace Tests\Feature;

use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketTest extends TestCase
{   
    private $dummyTicket;
    private $manyDummyTickets;

    /**
     * Constructor to generate some dummy tickets for testing.
     *
     * @return void
     */
    function __construct() {
        $dummyTicket = Ticket::factory()->make();
        $manyDummyTickets = Ticket::factory()->count(random_int(3, 5))->make();
    }

    /**
     * Normal operation checks
     */

    /**
     * Requests the most recent ticket (by creationdate).
     *
     * @return void
     */
    public function test_fetchOne() {

    }

    /**
     * Requests the three to five most recent tickets.
     * 
     * @return void
     */
    public function test_fetchMany() {

    }

    /**
     * Requests a random ticket.
     * 
     * @return void
     */
    public function test_requestOneRandom() {

    }

    /**
     * Requests all tickets. This should not be possible without elevated permissions.
     *      
     * @return void
     */
    public function test_requestAll() {

    }

    /**
     * Tries to store a newly genereted ticket.
     * 
     * @return void
     */
    public function test_storeOne() {
        $response = $this->postJson('/tickets/create', $dummyTicket);
        $response->assertStatus(201);
    }

    /**
     * Triest to overwrite a given ticket with a different one.
     * 
     * @return void
     */
    public function test_overwriteOne() {

    }

    /**
     * Tries to delete a given ticket.
     * 
     * @return void
     */
    public function test_removeOne() {

    }

    /**
     * Exception checks
     */

    /**
     * Checks if fetching is possible with a malformed HTTP header.
     * 
     * @return void
     */
    public function test_fetchWrongHeader() {

    }

    /**
     * Checks if fetching is possible with no / bad input data.
     * 
     * @return void
     */
    public function test_fetchBadData() {

    }

}
