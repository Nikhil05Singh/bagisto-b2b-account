<x-shop::layouts.account>
    <x-slot:title>Company Users</x-slot>
    <div class="flex-auto">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-medium">Company Users</h2>
            <a href="{{ route('b2baccount.users.create') }}" class="primary-button">Add User</a>
        </div>
        <x-shop::datagrid :src="route('b2baccount.users.index')"></x-shop::datagrid>
    </div>
</x-shop::layouts.account>