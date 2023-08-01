<?php

use function Livewire\Volt\state;

state(input: '');

$add = fn() => dd($this->input)
?>

<x-layouts.app>
	@volt
	<div>
		<livewire:input wire:model="input"/>
		<div>Outside: {{ $this->input }}</div>
		<button wire:click="add">click me</button>
	</div>
	@endvolt
</x-layouts.app>
