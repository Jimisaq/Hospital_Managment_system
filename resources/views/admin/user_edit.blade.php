<x-app-layout>
                                   <x-slot name="header">
                                       <h2 class="font-semibold text-xl text-gray-800 leading-tight animate__animated animate__fadeInDown">
                                           {{ __('User Profile') }}
                                       </h2>
                                   </x-slot>

                                   <div class="container py-5">
                                       <!-- Success and Error Messages -->
                                       @if (session('success'))
                                           <div class="alert alert-success animate__animated animate__fadeIn">
                                               {{ session('success') }}
                                           </div>
                                       @endif
                                       @if (session('error'))
                                           <div class="alert alert-danger animate__animated animate__fadeIn">
                                               {{ session('error') }}
                                           </div>
                                       @endif

                                       <div class="card shadow-lg animate__animated animate__fadeIn">
                                           <div class="card-header bg-primary text-white text-center">
                                               <h4 class="mb-0">User Profile</h4>
                                           </div>
                                           <div class="card-body">
                                               <!-- Profile Picture and Name -->
                                               <div class="d-flex justify-content-center mb-4">
                                                   <div class="text-center">
                                                       @if ($user->profile_picture_url)
                                                           <img src="{{ $user->profile_picture_url }}"
                                                                alt="Profile Picture"
                                                                class="rounded-circle img-thumbnail animate__animated animate__bounceIn"
                                                                style="width: 150px; height: 150px;">
                                                       @else
                                                           <i class="bi bi-person-circle text-secondary animate__animated animate__bounceIn" style="font-size: 150px;"></i>
                                                       @endif
                                                       <h3 class="mt-3">{{ $user->name }}</h3>
                                                   </div>
                                               </div>

                                               <!-- User Details -->
                                               <form action="{{ route('profile.edit', $user->id) }}" method="POST">
                                                   @csrf
                                                   @method('PUT')

                                                   <div class="row">
                                                       <!-- Name (Uneditable) -->
                                                       <div class="col-md-6 mb-3">
                                                           <div class="card shadow-sm animate__animated animate__fadeInLeft">
                                                               <div class="card-body">
                                                                   <label for="name" class="form-label">Name</label>
                                                                   <input type="text" id="name" class="form-control" value="{{ $user->name }}" disabled>
                                                               </div>
                                                           </div>
                                                       </div>

                                                       <!-- Email (Uneditable) -->
                                                       <div class="col-md-6 mb-3">
                                                           <div class="card shadow-sm animate__animated animate__fadeInRight">
                                                               <div class="card-body">
                                                                   <label for="email" class="form-label">Email</label>
                                                                   <input type="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
                                                               </div>
                                                           </div>
                                                       </div>

                                                       <!-- Role (Editable) -->
                                                       <div class="col-md-6 mb-3">
                                                           <div class="card shadow-sm animate__animated animate__fadeInLeft">
                                                               <div class="card-body">
                                                                   <label for="role" class="form-label">Role</label>
                                                                   <select name="role" id="role" class="form-select">
                                                                       <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                                                       <option value="doctor" {{ $user->role === 'doctor' ? 'selected' : '' }}>Doctor</option>
                                                                       <option value="receptionist" {{ $user->role === 'receptionist' ? 'selected' : '' }}>Receptionist</option>
                                                                       <option value="pharmacist" {{ $user->role === 'pharmacist' ? 'selected' : '' }}>Pharmacist</option>
                                                                   </select>
                                                               </div>
                                                           </div>
                                                       </div>

                                                       <!-- Phone (Editable) -->
                                                       <div class="col-md-6 mb-3">
                                                           <div class="card shadow-sm animate__animated animate__fadeInRight">
                                                               <div class="card-body">
                                                                   <label for="phone" class="form-label">Phone</label>
                                                                   <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
                                                               </div>
                                                           </div>
                                                       </div>

                                                       <!-- Address (Editable) -->
                                                       <div class="col-md-12 mb-3">
                                                           <div class="card shadow-sm animate__animated animate__fadeInUp">
                                                               <div class="card-body">
                                                                   <label for="address" class="form-label">Address</label>
                                                                   <textarea name="address" id="address" class="form-control" rows="3">{{ $user->address }}</textarea>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>

                                                   <!-- Save Button -->
                                                   <div class="text-center mt-4">
                                                       <button type="submit" class="btn btn-primary animate__animated animate__pulse animate__infinite">Save Changes</button>
                                                       <a href="{{ route('users') }}" class="btn btn-secondary">Back to Users</a>
                                                   </div>
                                               </form>
                                           </div>
                                       </div>
                                   </div>
                               </x-app-layout>
