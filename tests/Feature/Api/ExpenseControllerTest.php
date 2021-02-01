<?php

namespace Tests\Feature\Api;

use App\Models\Expense;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExpenseControllerTest extends TestCase
{
    /**
     *
     * @test
     */
    public function canAddNewExpense()
    {
        $expense = Expense::factory()->make()->toArray();
        $response = $this->postJson(route('expenses.store'), $expense);
        $response->assertSuccessful();
        $this->assertDatabaseCount('expenses', 1);
        $this->assertDatabaseHas('expenses', $expense);

    }

    /**
     * @test
     *
     */
    public function canGetAllExpenses()
    {
        $count = 10;
        $expenses = Expense::factory()->count($count)->create();
        $response = $this->getJson(route('expenses.index'));
        $response->assertSuccessful();
        $responseDecoded = $response->decodeResponseJson();
        $this->assertEquals($count, $responseDecoded->count());
        $this->assertDatabaseCount('expenses', $count);
        $this->assertDatabaseHas('expenses', $expenses->only(['name', 'amount'])->toArray());
    }

    /**
     * @test
     *
     */
    public function canGetAExpense()
    {
        $expense = Expense::factory()->create();
        $response = $this->getJson(route('expenses.show', $expense->id));
        $response->assertSuccessful();
        $responseDecoded = $response->decodeResponseJson();
        $response->assertJson($expense->toArray());
        $this->assertDatabaseCount('expenses', 1);
        $this->assertDatabaseHas('expenses', $expense->only(['name', 'icon','amount']));
    }

    /**
     * @test
     *
     */
    public function canUpdateAExpense()
    {
        $expense = Expense::factory()->create();
        $expenseUpdateData = Expense::factory()->make()->toArray();
        $response = $this->putJson(route('expenses.update', $expense->id), $expenseUpdateData);
        $response->assertSuccessful();
        $responseDecoded = $response->decodeResponseJson();
        $response->assertJson($expenseUpdateData);
        $this->assertDatabaseCount('expenses', 1);
        $this->assertDatabaseHas('expenses', $expenseUpdateData);
    }

    /**
     * @test
     *
     */
    public function canDeleteAExpense()
    {
        $expense = Expense::factory()->create();
        $response = $this->deleteJson(route('expenses.destroy', $expense->id));
        $response->assertSuccessful();
        $this->assertDatabaseCount('expenses', 0);
        $this->assertDatabaseMissing('expenses', $expense->only(['name', 'icon','amount']));
    }
}
