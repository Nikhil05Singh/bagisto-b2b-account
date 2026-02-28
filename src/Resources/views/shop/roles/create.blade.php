<x-shop::layouts.account>
    <x-slot:title>Create Role & Permissions</x-slot>

    <x-shop::form :action="route('b2baccount.roles.store')">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
            <h2 class="text-3xl font-semibold text-gray-800">Create New Role</h2>
            <div class="flex items-center gap-4 w-full sm:w-auto">
                <a href="{{ route('b2baccount.roles.index') }}" class="px-6 py-3 border border-gray-300 rounded-full text-gray-700 font-medium hover:bg-gray-50 transition-colors w-full sm:w-auto text-center">
                    Cancel
                </a>
                <button class="primary-button py-3 px-8 rounded-full font-semibold w-full sm:w-auto shadow-md" type="submit">
                    Save Role
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <div class="lg:col-span-7 bg-white border border-gray-200 rounded-xl p-8 shadow-sm">
                <h3 class="text-xl font-semibold text-gray-800 border-b border-gray-100 pb-4 mb-6">Access Control</h3>
                
                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required font-medium text-gray-700">Permission Type</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="select" name="permission_type" id="permission_type" rules="required" class="w-full bg-gray-50 font-medium" onchange="togglePermissionsTree(this.value)">
                        <option value="custom">Custom (Select individually below)</option>
                        <option value="all">All Access (Full Admin)</option>
                    </x-shop::form.control-group.control>
                    <x-shop::form.control-group.error control-name="permission_type" />
                </x-shop::form.control-group>

                <div id="permissions_tree" class="mt-8 p-6 bg-gray-50 border border-gray-200 rounded-lg">
                    <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Select Capabilities</p>
                    
                    <div class="flex items-center gap-3 mb-4">
                        <input type="checkbox" name="permissions[]" value="dashboard" id="perm_dashboard" class="w-5 h-5 rounded text-blue-600 cursor-pointer">
                        <label for="perm_dashboard" class="text-lg text-gray-800 cursor-pointer">Dashboard Analytics</label>
                    </div>

                    <div class="mb-2">
                        <div class="flex items-center gap-3 mb-3">
                            <input type="checkbox" name="permissions[]" value="sales" id="perm_sales" class="w-5 h-5 rounded text-blue-600 cursor-pointer">
                            <label for="perm_sales" class="text-lg font-semibold text-gray-800 cursor-pointer">Sales Management</label>
                        </div>
                        
                        <div class="pl-8 flex flex-col gap-3 border-l-2 border-gray-300 ml-2">
                            <label class="flex items-center gap-3 cursor-pointer p-2 hover:bg-gray-100 rounded transition-colors">
                                <input type="checkbox" name="permissions[]" value="sales.orders" class="w-4 h-4 rounded text-blue-600">
                                <span class="text-gray-700">View & Manage Orders</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer p-2 hover:bg-gray-100 rounded transition-colors">
                                <input type="checkbox" name="permissions[]" value="sales.invoices" class="w-4 h-4 rounded text-blue-600">
                                <span class="text-gray-700">View & Manage Invoices</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer p-2 hover:bg-gray-100 rounded transition-colors">
                                <input type="checkbox" name="permissions[]" value="sales.shipments" class="w-4 h-4 rounded text-blue-600">
                                <span class="text-gray-700">View & Manage Shipments</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 bg-white border border-gray-200 rounded-xl p-8 shadow-sm h-fit">
                <h3 class="text-xl font-semibold text-gray-800 border-b border-gray-100 pb-4 mb-6">General Details</h3>

                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required font-medium text-gray-700">Role Name</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="text" name="name" rules="required" placeholder="e.g. Account Executive" class="text-lg" />
                    <x-shop::form.control-group.error control-name="name" />
                </x-shop::form.control-group>

                <x-shop::form.control-group class="mt-6">
                    <x-shop::form.control-group.label class="required font-medium text-gray-700">Role Description</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="textarea" name="description" rules="required" placeholder="Briefly describe what a user with this role is responsible for." rows="5" class="bg-gray-50" />
                    <x-shop::form.control-group.error control-name="description" />
                </x-shop::form.control-group>
            </div>

        </div>
    </x-shop::form>

    <script>
        function togglePermissionsTree(val) {
            const tree = document.getElementById('permissions_tree');
            if(val === 'all') {
                tree.style.opacity = '0.4';
                tree.style.pointerEvents = 'none';
            } else {
                tree.style.opacity = '1';
                tree.style.pointerEvents = 'auto';
            }
        }
    </script>
</x-shop::layouts.account>