<?php

use Livewire\Volt\Component;
use App\Models\Note;
new class extends Component {
    public Note $note;
    public $heartCount;
    public function mount(Note $note){
        $this->note = $note;
        $this->heartCount = $note->heart_count;
    }
    public function increaseHeartCount(){
    $this->authorize('update',$this->note);
    $this->note->update([
        'heart_count' => $this->heartCount + 1
    ]);
    $this->heartCount = $this->note->heart_count;
    }

}; ?>

<div>
    <x-button xs rose icon="heart" wire:click="increaseHeartCount" spinner>{{$heartCount}}</x-button>

</div>
