<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif
</head>

<body class="min-h-screen bg-gray-50 text-gray-800">
    <div class="container mx-auto max-w-8xl px-4 py-8">
        <div class="rounded-lg border border-gray-200 bg-white shadow-sm divide-y divide-gray-200">
            <div class="flex items-start justify-between p-4 sm:p-6">
                <h1 class="text-2xl font-bold text-gray-900">Users</h1>
                <a href="{{ url('add') }}"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-medium text-white hover:bg-indigo-700">Add
                    User</a>
            </div>

            <div class="p-4 sm:p-6">
                <form method="GET" action="{{ url()->current() }}"
                    class="flex flex-col gap-2 sm:flex-row sm:items-center sm:gap-3">
                    <label for="search" class="sr-only">Search users</label>
                    <input id="search" name="search" type="text" value="{{ request('search') }}"
                        placeholder="Search by name or email"
                        class="w-full sm:max-w-md rounded-md border border-gray-300 px-3 py-2 text-sm placeholder:text-gray-400 focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200" />
                    <div class="flex items-center gap-2">
                        <button type="submit"
                            class="rounded-md bg-teal-600 px-3 py-2 text-sm font-medium text-white hover:bg-teal-700">Search</button>
                        @if (request('search'))
                            <a href="{{ url()->current() }}"
                                class="rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50">Clear</a>
                        @endif
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50 text-xs font-semibold uppercase tracking-wide text-gray-600">
                        <tr>
                            <th class="px-4 py-3 text-left w-14">#</th>
                            <th class="px-4 py-3 text-left">Last Name</th>
                            <th class="px-4 py-3 text-left">First Name</th>
                            <th class="px-4 py-3 text-left">Middle Name</th>
                            <th class="px-4 py-3 text-left">Email</th>
                            <th class="px-4 py-3 text-left">Birthdate</th>
                            <th class="px-4 py-3 text-left">Age</th>
                            <th class="px-4 py-3 text-left">Gender</th>
                            <th class="px-4 py-3 text-left">Created At</th>
                            <th class="px-4 py-3 text-left">Modified At</th>
                            <th class="px-4 py-3 text-right w-40">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @forelse ($users as $user)
                            <tr class="bg-white hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $user->id }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $user->lastname }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $user->firstname }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $user->middlename }}</td>
                                <td class="px-4 py-3 text-gray-700">
                                    <a href="mailto:{{ $user->email }}"
                                        class="text-indigo-600 hover:text-indigo-800 hover:underline">{{ $user->email }}</a>
                                </td>
                                <td class="px-4 py-3 text-gray-700">{{ $user->birthdate_formatted }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $user->age }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $user->gender }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $user->created_at_formatted }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $user->updated_at_formatted }}</td>
                                <td class="px-4 py-3 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ url('edit/' . $user->id) }}"
                                            class="rounded-md border border-indigo-200 px-3 py-1.5 text-xs font-medium text-indigo-700 hover:bg-indigo-50">Edit</a>
                                        <form method="post" action="{{ url('delete', $user->id) }}" class="inline"
                                            onsubmit="return confirm('Are you sure you want to delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="rounded-md border border-red-200 px-3 py-1.5 text-xs font-medium text-red-700 hover:bg-red-50">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-10 text-center text-sm text-gray-600">No records
                                    found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-4 sm:flex-row sm:p-6">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</body>

</html>
