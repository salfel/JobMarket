<form wire:submit="authenticate" class="w-72 flex flex-col gap-5">
    <h1 class="text-xl font-semibold text-center">Login</h1>

    <x-input wire:model="form.email" name="Email"/>
    <x-input wire:model="form.password" type="password" name="Password"/>

    <button type="submit" class="w-full text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
        Login
    </button>
</form>
