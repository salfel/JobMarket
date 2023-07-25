<form wire:submit="authenticate" class="w-72 flex flex-col gap-5">
    <h1 class="text-xl font-semibold text-center">Login</h1>

    <x-input wire:model="form.email" name="Email"/>
    <x-input wire:model="form.password" name="Password"/>

    <button type="submit" class="block px-3 py-1.5 bg-amber-400 hover:bg-amber-500 transition-colors rounded-md">Login</button>
</form>
