<x-shop::layouts.account>
    <x-slot:title>Create New Role</x-slot>

    <x-shop::form :action="route('b2baccount.roles.store')">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-[#060C3B]">Create Role</h2>
            <div class="flex items-center gap-4">
                <a href="{{ route('b2baccount.roles.index') }}" class="font-medium text-gray-600 hover:text-black">Back</a>
                <button type="submit" class="primary-button block w-max py-[11px] px-[43px] rounded-[18px] text-center">
                    Save Role
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <div class="lg:col-span-7 bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-lg font-bold text-[#060C3B] mb-6">Access Control</h3>
                
                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required font-medium text-gray-700">Permissions</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="select" name="permission_type" id="permission_type" rules="required" class="w-full mt-1 border rounded-md px-3 py-2" onchange="togglePermissionsTree(this.value)">
                        <option value="custom">Custom</option>
                        <option value="all">All Access</option>
                    </x-shop::form.control-group.control>
                    <x-shop::form.control-group.error control-name="permission_type" />
                </x-shop::form.control-group>

                <div id="permissions_tree" class="mt-6 border-t pt-4 select-none">
                    
                    <div class="flex items-center gap-2 py-1">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        <input type="checkbox" name="permissions[]" value="dashboard" class="w-4 h-4 rounded text-blue-600 border-gray-300">
                        <label class="text-gray-700">Dashboard</label>
                    </div>

                    <div class="mt-2">
                        <div class="flex items-center gap-2 py-1 cursor-pointer">
                            <span class="text-gray-400 w-4 text-center cursor-pointer" onclick="toggleFolder('folder_sales')">▼</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                            <input type="checkbox" id="check_sales" name="permissions[]" value="sales" class="w-4 h-4 rounded text-blue-600 border-gray-300 parent-checkbox" onchange="toggleChildren(this, 'child_sales')">
                            <label for="check_sales" class="text-gray-800 font-medium">Sales</label>
                        </div>

                        <div id="folder_sales" class="pl-6 border-l border-gray-200 ml-2 mt-1 flex flex-col gap-1">
                            
                            <div>
                                <div class="flex items-center gap-2 py-1">
                                    <span class="text-gray-400 w-4 text-center cursor-pointer" onclick="toggleFolder('folder_sales_orders')">▼</span>
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                                    <input type="checkbox" id="check_sales_orders" name="permissions[]" value="sales.orders" class="w-4 h-4 rounded text-blue-600 border-gray-300 child_sales parent-checkbox" onchange="toggleChildren(this, 'child_sales_orders')">
                                    <label for="check_sales_orders" class="text-gray-700">Orders</label>
                                </div>
                                <div id="folder_sales_orders" class="pl-8 flex flex-col gap-1">
                                    <label class="flex items-center gap-2 py-1">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        <input type="checkbox" name="permissions[]" value="sales.orders.create" class="w-4 h-4 rounded text-blue-600 border-gray-300 child_sales child_sales_orders">
                                        <span class="text-gray-600 text-sm">Create</span>
                                    </label>
                                    <label class="flex items-center gap-2 py-1">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        <input type="checkbox" name="permissions[]" value="sales.orders.view" class="w-4 h-4 rounded text-blue-600 border-gray-300 child_sales child_sales_orders">
                                        <span class="text-gray-600 text-sm">View</span>
                                    </label>
                                    <label class="flex items-center gap-2 py-1">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        <input type="checkbox" name="permissions[]" value="sales.orders.cancel" class="w-4 h-4 rounded text-blue-600 border-gray-300 child_sales child_sales_orders">
                                        <span class="text-gray-600 text-sm">Cancel</span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center gap-2 py-1">
                                    <span class="text-gray-400 w-4 text-center cursor-pointer" onclick="toggleFolder('folder_sales_invoices')">▼</span>
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                                    <input type="checkbox" id="check_sales_invoices" name="permissions[]" value="sales.invoices" class="w-4 h-4 rounded text-blue-600 border-gray-300 child_sales parent-checkbox" onchange="toggleChildren(this, 'child_sales_invoices')">
                                    <label for="check_sales_invoices" class="text-gray-700">Invoices</label>
                                </div>
                                <div id="folder_sales_invoices" class="pl-8 flex flex-col gap-1">
                                    <label class="flex items-center gap-2 py-1">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        <input type="checkbox" name="permissions[]" value="sales.invoices.view" class="w-4 h-4 rounded text-blue-600 border-gray-300 child_sales child_sales_invoices">
                                        <span class="text-gray-600 text-sm">View</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="flex items-center gap-2 py-1 cursor-pointer">
                            <span class="text-gray-400 w-4 text-center cursor-pointer" onclick="toggleFolder('folder_catalog')">▼</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                            <input type="checkbox" id="check_catalog" name="permissions[]" value="catalog" class="w-4 h-4 rounded text-blue-600 border-gray-300 parent-checkbox" onchange="toggleChildren(this, 'child_catalog')">
                            <label for="check_catalog" class="text-gray-800 font-medium">Catalog</label>
                        </div>

                        <div id="folder_catalog" class="pl-6 border-l border-gray-200 ml-2 mt-1 flex flex-col gap-1">
                            <label class="flex items-center gap-2 py-1">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                <input type="checkbox" name="permissions[]" value="catalog.products" class="w-4 h-4 rounded text-blue-600 border-gray-300 child_catalog">
                                <span class="text-gray-700">Products</span>
                            </label>
                            <label class="flex items-center gap-2 py-1">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                <input type="checkbox" name="permissions[]" value="catalog.categories" class="w-4 h-4 rounded text-blue-600 border-gray-300 child_catalog">
                                <span class="text-gray-700">Categories</span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="lg:col-span-5 bg-white border border-gray-200 rounded-xl p-6 shadow-sm sticky top-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-[#060C3B]">General</h3>
                    <span class="text-gray-400">^</span>
                </div>

                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required font-medium text-gray-700">Name</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="text" name="name" rules="required" placeholder="Name" class="mt-1 border rounded-md px-3 py-2 w-full" />
                    <x-shop::form.control-group.error control-name="name" />
                </x-shop::form.control-group>

                <x-shop::form.control-group class="mt-6">
                    <x-shop::form.control-group.label class="required font-medium text-gray-700">Description</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="textarea" name="description" rules="required" placeholder="Description" rows="5" class="mt-1 border rounded-md px-3 py-2 w-full" />
                    <x-shop::form.control-group.error control-name="description" />
                </x-shop::form.control-group>
            </div>

        </div>
    </x-shop::form>

    <script>
        // 1. Hide/Show tree if "All Access" is chosen
        function togglePermissionsTree(val) {
            const tree = document.getElementById('permissions_tree');
            if(val === 'all') {
                tree.style.opacity = '0.3';
                tree.style.pointerEvents = 'none';
                // Uncheck all when 'all' is selected
                document.querySelectorAll('#permissions_tree input[type="checkbox"]').forEach(cb => cb.checked = false);
            } else {
                tree.style.opacity = '1';
                tree.style.pointerEvents = 'auto';
            }
        }

        // 2. Collapse/Expand folders
        function toggleFolder(folderId) {
            const folder = document.getElementById(folderId);
            if(folder.style.display === 'none') {
                folder.style.display = 'flex';
            } else {
                folder.style.display = 'none';
            }
        }

        // 3. Parent-Child Checkbox Syncing
        function toggleChildren(parentCheckbox, childClassName) {
            const children = document.querySelectorAll('.' + childClassName);
            children.forEach(child => {
                child.checked = parentCheckbox.checked;
            });
        }

        // 4. Reverse Sync (If a child is unchecked, uncheck the parent)
        document.addEventListener('DOMContentLoaded', function() {
            const allCheckboxes = document.querySelectorAll('#permissions_tree input[type="checkbox"]');
            
            allCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // We only need to handle the "uncheck" logic for parents
                    if (!this.checked) {
                        // Find if this has classes like "child_sales"
                        this.classList.forEach(cls => {
                            if (cls.startsWith('child_')) {
                                // Extract the parent ID, e.g., child_sales -> check_sales
                                const parentId = cls.replace('child_', 'check_');
                                const parentBox = document.getElementById(parentId);
                                if (parentBox) parentBox.checked = false;
                            }
                        });
                    }
                });
            });
        });
    </script>
</x-shop::layouts.account>