<?php

namespace Tests\Feature\Api;

use App\Models\Debt;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DebtControllerTest extends TestCase
{
    /**
     *
     * @test
     */
    public function canAddNewDebt()
    {
        $debt = Debt::factory()->make()->toArray();
        $response = $this->postJson(route('debts.store'), $debt);
        $response->assertSuccessful();
        $this->assertDatabaseCount('debts', 1);
        $this->assertDatabaseHas('debts', $debt);

    }

    /**
     * @test
     *
     */
    public function canGetAllDebts()
    {
        $count = 10;
        $debts = Debt::factory()->count($count)->create();
        $response = $this->getJson(route('debts.index'));
        $response->assertSuccessful();
        $responseDecoded = $response->decodeResponseJson();
        $this->assertEquals($count, $responseDecoded->count());
        $this->assertDatabaseCount('debts', $count);
        $this->assertDatabaseHas('debts', $debts->only(['name', 'amount'])->toArray());
    }

    /**
     * @test
     *
     */
    public function canGetADebt()
    {
        $debt = Debt::factory()->create();
        $response = $this->getJson(route('debts.show', $debt->id));
        $response->assertSuccessful();
        $responseDecoded = $response->decodeResponseJson();
        $response->assertJson($debt->toArray());
        $this->assertDatabaseCount('debts', 1);
        $this->assertDatabaseHas('debts', $debt->only(['name', 'icon','amount']));
    }

    /**
     * @test
     *
     */
    public function canUpdateADebt()
    {
        $debt = Debt::factory()->create();
        $debtUpdateData = Debt::factory()->make()->toArray();
        $response = $this->putJson(route('debts.update', $debt->id), $debtUpdateData);
        $response->assertSuccessful();
        $responseDecoded = $response->decodeResponseJson();
        $response->assertJson($debtUpdateData);
        $this->assertDatabaseCount('debts', 1);
        $this->assertDatabaseHas('debts', $debtUpdateData);
    }

    /**
     * @test
     *
     */
    public function canDeleteADebt()
    {
        $debt = Debt::factory()->create();
        $response = $this->deleteJson(route('debts.destroy', $debt->id));
        $response->assertSuccessful();
        $this->assertDatabaseCount('debts', 0);
        $this->assertDatabaseMissing('debts', $debt->only(['name', 'icon','amount']));
    }
}
