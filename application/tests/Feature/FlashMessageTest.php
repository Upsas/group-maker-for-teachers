<?php

namespace Tests\Feature;

use App\Http\Livewire\FlashMessage;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;
use Tests\TestCase;

class FlashMessageTest extends TestCase
{
    public function testRenderMessage(): void
    {
        DB::beginTransaction();

        $this->actingAs(ModelCreationHelper::createUser());

        Livewire::test(FlashMessage::class)
            ->call('renderFlashMessage', 'message')
            ->assertSet('flashMessageDisplay', 'block')
            ->assertSet('bgColor', 'bg-green-400')
            ->assertSet('message', 'message')
            ->assertSee('message');

        DB::rollBack();
    }
}
