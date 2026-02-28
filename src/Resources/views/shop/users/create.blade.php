<x-shop::layouts.account>
    <x-slot:title>Create Company User</x-slot>

    <div class="flex items-center justify-between mb-8">
        <h2 class="text-3xl font-semibold text-gray-800">Add New User</h2>
        <a href="{{ route('b2baccount.users.index') }}" class="px-6 py-2 border border-gray-300 rounded-full text-gray-700 font-medium hover:bg-gray-50 transition-colors">
            Cancel & Back
        </a>
    </div>

    <x-shop::form :action="route('b2baccount.users.store')">
        <div class="bg-white border border-gray-200 rounded-xl p-8 shadow-sm">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required font-medium text-gray-700">First Name</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="text" name="first_name" rules="required" placeholder="e.g. John" />
                    <x-shop::form.control-group.error control-name="first_name" />
                </x-shop::form.control-group>

                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required font-medium text-gray-700">Last Name</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="text" name="last_name" rules="required" placeholder="e.g. Doe" />
                    <x-shop::form.control-group.error control-name="last_name" />
                </x-shop::form.control-group>

                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required font-medium text-gray-700">Email Address</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="email" name="email" rules="required|email" placeholder="john.doe@company.com" />
                    <x-shop::form.control-group.error control-name="email" />
                </x-shop::form.control-group>

                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required font-medium text-gray-700">Phone Number</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="text" name="phone" rules="required" placeholder="+1 234 567 8900" />
                    <x-shop::form.control-group.error control-name="phone" />
                </x-shop::form.control-group>

                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required font-medium text-gray-700">Gender</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="select" name="gender" rules="required" class="w-full">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </x-shop::form.control-group.control>
                    <x-shop::form.control-group.error control-name="gender" />
                </x-shop::form.control-group>

                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="required font-medium text-gray-700">Assign Role</x-shop::form.control-group.label>
                    <x-shop::form.control-group.control type="select" name="company_role_id" rules="required" class="w-full">
                        <option value="">-- Select a User Role --</option>
                        @if(isset($roles))
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        @endif
                    </x-shop::form.control-group.control>
                    <x-shop::form.control-group.error control-name="company_role_id" />
                </x-shop::form.control-group>
            </div>

            <div class="mt-8 p-5 bg-gray-50 border border-gray-100 rounded-lg flex items-center gap-3">
                <input type="checkbox" name="status" id="status" value="1" class="w-5 h-5 text-blue-600 rounded cursor-pointer" checked>
                <label for="status" class="font-medium text-gray-800 cursor-pointer">Account is Active & Allowed to Login</label>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-sm text-gray-500 italic">
                    <span class="font-semibold text-gray-700">Note:</span> A secure password will be randomly generated and emailed directly to the user.
                </p>
                <button class="primary-button py-3 px-8 rounded-full text-lg font-semibold w-full sm:w-auto shadow-md" type="submit">
                    Save User Profile
                </button>
            </div>

        </div>
    </x-shop::form>
</x-shop::layouts.account>