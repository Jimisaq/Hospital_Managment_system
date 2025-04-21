<x-app-layout>
     <div class="py-8">
         <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
             <h2 class="font-semibold text-xl text-white bg-blue-600 p-4 rounded-md shadow-md">
                 Add User
             </h2>

             <div class="bg-white shadow-md rounded-lg p-6 animate__animated animate__fadeIn">
                 @if (session('success'))
                     <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative animate__animated animate__bounceIn" role="alert">
                         <strong class="font-bold">Success!</strong>
                         <span class="block sm:inline">{{ session('success') }}</span>
                     </div>
                 @endif
                 @if ($errors->any())
                     <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 animate__animated animate__bounceIn" role="alert">
                         <strong class="font-bold">Whoops!</strong>
                         <span class="block sm:inline">There were some problems with your input.</span>
                         <ul class="mt-2 list-disc list-inside text-sm text-red-600">
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                 @endif

                 <form method="POST" action="{{ route('saveuser') }}" class="space-y-6">
                     @csrf

                     <!-- Biodata Section -->
                     <fieldset class="border border-gray-300 rounded-md p-4">
                         <legend class="text-lg font-semibold text-gray-700 px-2">Biodata</legend>
                         <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                             <div>
                                 <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                 <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                     class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                             </div>
                             <div>
                                 <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                 <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                     class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                             </div>
                             <div>
                                 <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                 <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                     class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                             </div>
                             <div>
                                 <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                 <input type="text" name="address" id="address" value="{{ old('address') }}"
                                     class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                             </div>
                         </div>
                     </fieldset>

                     <!-- Role Section -->
                     <fieldset class="border border-gray-300 rounded-md p-4">
                         <legend class="text-lg font-semibold text-gray-700 px-2">Role</legend>
                         <div>
                             <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                             <select name="role" id="role" required
                                 class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                 <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select a role</option>
                                 <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                 <option value="doctor" {{ old('role') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                                 <option value="receptionist" {{ old('role') == 'receptionist' ? 'selected' : '' }}>Receptionist</option>
                                 <option value="pharmacist" {{ old('role') == 'pharmacist' ? 'selected' : '' }}>Pharmacist</option>
                             </select>
                         </div>

                         <!-- Additional Fields for Doctor -->
                         <div id="doctor-fields" style="display: none;" class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                             <div>
                                 <label for="specialization" class="block text-sm font-medium text-gray-700">Specialization</label>
                                 <input type="text" name="specialization" id="specialization" value="{{ old('specialization') }}"
                                     class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                             </div>
                             <div>
                                 <label for="license_number" class="block text-sm font-medium text-gray-700">License Number</label>
                                 <input type="text" name="license_number" id="license_number" value="{{ old('license_number') }}"
                                     class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                             </div>
                             <div>
                                 <label for="room_number" class="block text-sm font-medium text-gray-700">Room Number</label>
                                 <input type="text" name="room_number" id="room_number" value="{{ old('room_number') }}"
                                     class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                             </div>
                             <div>
                                 <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                                 <select name="department" id="department"
                                     class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                     <option value="" disabled {{ old('department') ? '' : 'selected' }}>Select a department</option>
                                     <option value="cardiology" {{ old('department') == 'cardiology' ? 'selected' : '' }}>Cardiology</option>
                                     <option value="neurology" {{ old('department') == 'neurology' ? 'selected' : '' }}>Neurology</option>
                                     <option value="orthopedics" {{ old('department') == 'orthopedics' ? 'selected' : '' }}>Orthopedics</option>
                                     <option value="pediatrics" {{ old('department') == 'pediatrics' ? 'selected' : '' }}>Pediatrics</option>
                                 </select>
                             </div>
                         </div>
                     </fieldset>

                     <!-- Authentication Section -->
                     <fieldset class="border border-gray-300 rounded-md p-4">
                         <legend class="text-lg font-semibold text-gray-700 px-2">Authentication</legend>
                         <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                             <div>
                                 <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                 <input type="password" name="password" id="password" required
                                     class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                             </div>
                             <div>
                                 <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                 <input type="password" name="password_confirmation" id="password_confirmation" required
                                     class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                             </div>
                         </div>
                     </fieldset>

                     <div class="flex justify-end">
                         <button type="submit"
                             class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 animate__animated animate__pulse">
                             Add User
                         </button>
                     </div>
                 </form>
             </div>
         </div>
     </div>

                 <script>
                     const roleSelect = document.getElementById('role');
                     const doctorFields = document.getElementById('doctor-fields');

                     roleSelect.addEventListener('change', function () {
                         if (this.value === 'doctor') {
                             doctorFields.style.display = 'grid';
                         } else {
                             doctorFields.style.display = 'none';
                         }
                     });
                 </script>
</x-app-layout>
