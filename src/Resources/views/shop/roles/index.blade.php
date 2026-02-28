<x-shop::layouts.account>
    <x-slot:title>Company Roles</x-slot>
    <div class="flex-auto">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-medium">Roles & Permissions</h2>
            <a href="{{ route('b2baccount.roles.create') }}" class="primary-button">Add Role</a>
        </div>
        <x-shop::datagrid :src="route('b2baccount.roles.index')"></x-shop::datagrid>
    </div>
</x-shop::layouts.account>