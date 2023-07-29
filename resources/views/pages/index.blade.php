<?php

use function Livewire\Volt\state;

state(count: 0);

$increment = function () {
	$this->count++;
}
?>

<x-app-layout>
</x-app-layout>
