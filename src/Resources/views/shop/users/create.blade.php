<x-shop::layouts.account>
    <x-slot:title>Create User</x-slot>

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-medium text-navyBlue">Create User</h2>
        <a href="{{ route('b2baccount.users.index') }}" class="text-blue-600 hover:underline">Back to Users</a>
    </div>

    <x-shop::form :action="route('b2baccount.users.store')" enctype="multipart/form-data">
        
        <div class="bg-white p-6 rounded-lg border shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required">First Name</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="text" name="first_name" rules="required" placeholder="First Name" class="w-full border rounded-md px-4 py-2" />
                    <x-shop::form.control-group.error control-name="first_name" />
                </x-shop::form.control-group>

                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required">Last Name</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="text" name="last_name" rules="required" placeholder="Last Name" class="w-full border rounded-md px-4 py-2" />
                    <x-shop::form.control-group.error control-name="last_name" />
                </x-shop::form.control-group>

                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required">Email</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="email" name="email" rules="required|email" placeholder="admin@example.com" class="w-full border rounded-md px-4 py-2" />
                    <x-shop::form.control-group.error control-name="email" />
                </x-shop::form.control-group>

                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required">Phone</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="text" name="phone" rules="required" placeholder="Phone Number" class="w-full border rounded-md px-4 py-2" />
                    <x-shop::form.control-group.error control-name="phone" />
                </x-shop::form.control-group>

                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required">Gender</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="select" name="gender" rules="required" class="w-full border rounded-md px-4 py-2">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </x-shop::form.control-group.control>
                    <x-shop::form.control-group.error control-name="gender" />
                </x-shop::form.control-group>

                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required">Role</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="select" name="company_role_id" rules="required" class="w-full border rounded-md px-4 py-2">
                        <option value="">Select a Role</option>
                        @if(isset($roles))
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        @endif
                    </x-shop::form.control-group.control>
                    <x-shop::form.control-group.error control-name="company_role_id" />
                </x-shop::form.control-group>
                
                <div class="flex items-center gap-3 pt-6">
                    <input type="checkbox" name="status" id="status" value="1" class="w-5 h-5 text-blue-600 rounded border-gray-300">
                    <label for="status" class="font-medium text-gray-700">Account Active</label>
                </div>
            </div>

            <p class="text-sm text-gray-500 mt-4 italic">* Note: A secure password will be randomly generated and emailed to the user automatically.</p>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-blue-600 text-white font-medium px-8 py-2.5 rounded-md hover:bg-blue-700 transition-colors">
                    Save User
                </button>
            </div>
        </div>
    </x-shop::form>
</x-shop::layouts.account>