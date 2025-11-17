<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 text-gray-800">
    <div class="container mx-auto max-w-3xl px-4 py-8">
        <div class="rounded-lg border border-gray-200 bg-white shadow-sm divide-y divide-gray-200">
            <div class="flex items-start justify-between p-4 sm:p-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Add User</h1>
                    <p class="mt-1 text-sm text-gray-600">Create a new user record</p>
                </div>
                <a href="{{ url('/') }}" class="rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50">Back</a>
            </div>

            <div class="p-4 sm:p-6">
                <form method="POST" action="{{ url('add-save') }}">
                    @csrf
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}"
                                   class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200" required>
                            @error('lastname')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}"
                                   class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200" required>
                            @error('firstname')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label for="middlename" class="block text-sm font-medium text-gray-700">Middle Name</label>
                            <input type="text" name="middlename" id="middlename" value="{{ old('middlename') }}"
                                   class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200" required>
                            @error('middlename')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                   class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200" required>
                            @error('email')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                            <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate') }}"
                                   class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200" required>
                            @error('birthdate')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                            <input type="number" name="age" id="age" value="{{ old('age') }}"
                                   class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200" required>
                            @error('age')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                            <select name="gender" id="gender"
                                    class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200" required>
                                <option value="" disabled {{ old('gender') == '' ? 'selected' : '' }}>Select a Gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end gap-3">
                        <a href="{{ url('/') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Cancel</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
