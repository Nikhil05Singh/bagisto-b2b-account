<x-shop::layouts.account>
    <x-slot:title>Create Role</x-slot>

    <x-shop::form :action="route('b2baccount.roles.store')">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-medium text-navyBlue">Create Role</h2>
            <div class="flex items-center gap-4">
                <a href="{{ route('b2baccount.roles.index') }}" class="font-medium text-gray-600 hover:text-gray-900">Back</a>
                <button type="submit" class="bg-blue-600 text-white font-medium px-6 py-2 rounded-md hover:bg-blue-700 transition-colors">
                    Save Role
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <div class="bg-white border rounded-lg p-6 shadow-sm">
                <h3 class="text-lg font-medium border-b pb-3 mb-4">Access Control</h3>
                
                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required font-medium">Permissions</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="select" name="permission_type" id="permission_type" rules="required" class="w-full border rounded-md px-4 py-2 mt-1" onchange="togglePermissionsTree(this.value)">
                        <option value="custom">Custom</option>
                        <option value="all">All Access</option>
                    </x-shop::form.control-group.control>
                    <x-shop::form.control-group.error control-name="permission_type" />
                </x-shop::form.control-group>

                <div id="permissions_tree" class="mt-6 pl-4 border-l-2 border-gray-200">
                    <div class="flex items-center gap-3 mb-3">
                        <input type="checkbox" name="permissions[]" value="dashboard" id="perm_dashboard" class="w-4 h-4 rounded text-blue-600">
                        <label for="perm_dashboard" class="text-gray-700">Dashboard</label>
                    </div>

                    <div class="mb-3">
                        <div class="flex items-center gap-3 mb-2">
                            <input type="checkbox" name="permissions[]" value="sales" id="perm_sales" class="w-4 h-4 rounded text-blue-600">
                            <label for="perm_sales" class="font-medium text-gray-800">Sales</label>
                        </div>
                        
                        <div class="pl-7 flex flex-col gap-2">
                            <label class="flex items-center gap-3">
                                <input type="checkbox" name="permissions[]" value="sales.orders" class="w-4 h-4 rounded text-blue-600">
                                <span class="text-gray-600">Orders</span>
                            </label>
                            <label class="flex items-center gap-3">
                                <input type="checkbox" name="permissions[]" value="sales.invoices" class="w-4 h-4 rounded text-blue-600">
                                <span class="text-gray-600">Invoices</span>
                            </label>
                            <label class="flex items-center gap-3">
                                <input type="checkbox" name="permissions[]" value="sales.shipments" class="w-4 h-4 rounded text-blue-600">
                                <span class="text-gray-600">Shipments</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-lg p-6 shadow-sm h-fit">
                <h3 class="text-lg font-medium border-b pb-3 mb-4">General</h3>

                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required font-medium">Name</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="text" name="name" rules="required" placeholder="e.g. Sales Manager" class="w-full border rounded-md px-4 py-2 mt-1" />
                    <x-shop::form.control-group.error control-name="name" />
                </x-shop::form.control-group>

                <x-shop::form.control-group class="mt-4">
                    <x-shop::form.control-group.label class="required font-medium">Description</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="textarea" name="description" rules="required" placeholder="What can this role do?" class="w-full border rounded-md px-4 py-2 mt-1" rows="4" />
                    <x-shop::form.control-group.error control-name="description" />
                </x-shop::form.control-group>
            </div>
        </div>
    </x-shop::form>

    <script>
        function togglePermissionsTree(val) {
            const tree = document.getElementById('permissions_tree');
            if(val === 'all') {
                tree.style.display = 'none';
            } else {
                tree.style.display = 'block';
            }
        }
    </script>
</x-shop::layouts.account>