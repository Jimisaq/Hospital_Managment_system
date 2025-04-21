<x-app-layout>
        <div class="container py-5">
            <h2 class="font-weight-bold mb-5 text-center text-primary display-4">User Management Dashboard</h2>

            <!-- 🔍 Search Bar -->
            <div class="mb-5 text-center">
                <div class="d-flex justify-content-center">
                    <div class="input-group" style="max-width: 600px; width: 100%; position: relative;">
                        <input type="text" id="userSearch" class="form-control form-control-lg" placeholder="Search users by name, email, or username..." style="border-radius: 0.5rem;">
                        <button class="btn btn-primary" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                    <ul id="suggestions" class="list-group position-absolute w-100 shadow mt-2" style="z-index: 1000; max-width: 600px; display: none;"></ul>
                </div>
            </div>

            <div class="row g-4">
                <!-- 🛡️ Administrators Card -->
                <div class="col-md-6">
                    <div class="card shadow-lg rounded-lg">
                        <div class="card-header text-white bg-warning">
                            <h4 class="mb-0">Administrators</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="table-warning">
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($admins as $admin)
                                            <tr>
                                                <td class="text-center">{{ $admin->name }}</td>
                                                <td class="text-center">{{ $admin->email }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('profile.view', $admin->id) }}" class="btn btn-warning btn-sm">View Details</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center text-muted">No administrators found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 🛎️ Receptionists Card -->
                <div class="col-md-6">
                    <div class="card shadow-lg rounded-lg">
                        <div class="card-header text-white bg-info">
                            <h4 class="mb-0">Receptionists</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="table-info">
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($receptionists as $receptionist)
                                            <tr>
                                                <td class="text-center">{{ $receptionist->name }}</td>
                                                <td class="text-center">{{ $receptionist->email }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('profile.view', $receptionist->id) }}" class="btn btn-info btn-sm">View Details</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center text-muted">No receptionists found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 👨‍⚕️ Doctors Card -->
                <div class="col-md-6">
                    <div class="card shadow-lg rounded-lg">
                        <div class="card-header text-white bg-primary">
                            <h4 class="mb-0">Doctors</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($doctors as $doctor)
                                            <tr>
                                                <td class="text-center">{{ $doctor->name }}</td>
                                                <td class="text-center">{{ $doctor->email }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('profile.view', $doctor->id) }}" class="btn btn-primary btn-sm">View Details</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center text-muted">No doctors found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 💊 Pharmacists Card -->
                <div class="col-md-6">
                    <div class="card shadow-lg rounded-lg">
                        <div class="card-header text-white bg-success">
                            <h4 class="mb-0">Pharmacists</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="table-success">
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pharmacists as $pharmacist)
                                            <tr>
                                                <td class="text-center">{{ $pharmacist->name }}</td>
                                                <td class="text-center">{{ $pharmacist->email }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('profile.view', $pharmacist->id) }}" class="btn btn-success btn-sm">View Details</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center text-muted">No pharmacists found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>
        let debounceTimer;
        const userSearchInput = document.getElementById('userSearch');
        const suggestionBox = document.getElementById('suggestions');

        userSearchInput.addEventListener('input', function (e) {
            const query = e.target.value.trim();

            if (query.length > 1) {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    fetch(`/admin/users/search?query=${encodeURIComponent(query)}`)
                        .then(res => res.json())
                        .then(data => {
                            suggestionBox.innerHTML = '';
                            if (data.length > 0) {
                                suggestionBox.style.display = 'block';
                                data.forEach(user => {
                                    const li = document.createElement('li');
                                    li.textContent = `${user.name} (${user.role})`;
                                    li.classList.add('list-group-item', 'list-group-item-action');
                                    li.style.cursor = 'pointer';
                                    li.onclick = () => {
                                        alert(`Selected: ${user.name}`);
                                        suggestionBox.innerHTML = '';
                                        suggestionBox.style.display = 'none';
                                        userSearchInput.value = '';
                                    };
                                    suggestionBox.appendChild(li);
                                });
                            } else {
                                suggestionBox.style.display = 'none';
                            }
                        })
                        .catch(err => {
                            console.error('Error fetching search results:', err);
                            suggestionBox.style.display = 'none';
                        });
                }, 300); // Debounce delay of 300ms
            } else {
                suggestionBox.innerHTML = '';
                suggestionBox.style.display = 'none';
            }
        });

        document.addEventListener('click', function (e) {
            if (!userSearchInput.contains(e.target) && !suggestionBox.contains(e.target)) {
                suggestionBox.style.display = 'none';
            }
        });
    </script>
    </x-app-layout>
