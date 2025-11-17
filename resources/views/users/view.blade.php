<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 text-gray-800">
    <div class="container mx-auto max-w-3xl px-4 py-8">
        <div class="rounded-lg border border-gray-200 bg-white shadow-sm divide-y divide-gray-200">
            <div class="flex items-start justify-between p-4 sm:p-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">View User</h1>
                    <p class="mt-1 text-sm text-gray-600">User details</p>
                </div>
                <a href="{{ url('/') }}"
                    class="rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50">Back</a>
            </div>

            <div class="p-4 sm:p-6">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">ID</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->id }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $user->lastname }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">First Name</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $user->firstname }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Middle Name</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $user->middlename ?: 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <p class="mt-1 text-sm text-gray-900">
                            <a href="mailto:{{ $user->email }}"
                                class="text-indigo-600 hover:text-indigo-800 hover:underline">{{ $user->email }}</a>
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Gender</label>
                        <p class="mt-1 text-sm text-gray-900">{{ ucfirst($user->gender) }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Birthdate</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->getBirthdateFormattedAttribute() }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Age</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->age }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Created At</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->getCreatedAtFormattedAttribute() }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Updated At</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->getUpdatedAtFormattedAttribute() }}</p>
                    </div>
                </div>
                <div class="mt-6 flex justify-end gap-3">
                    <a href="{{ url('edit/' . $user->id) }}"
                        class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">Edit
                        User</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
