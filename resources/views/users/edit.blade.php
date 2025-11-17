<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit User</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 text-gray-800">
	<div class="container mx-auto max-w-3xl px-4 py-8">
		<div class="rounded-lg border border-gray-200 bg-white shadow-sm divide-y divide-gray-200">
			<div class="flex items-start justify-between p-4 sm:p-6">
				<div>
					<h1 class="text-2xl font-bold text-gray-900">Edit User</h1>
					<p class="mt-1 text-sm text-gray-600">Update the user details</p>
				</div>
				<a href="{{ url('/') }}" class="rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50">Back</a>
			</div>

			<div class="p-4 sm:p-6">
				<form method="POST" action="{{ url('edit-save', $user->id) }}">
					@csrf
					<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
						<div>
							<label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
							<input type="text" name="lastname" id="lastname" required
								   value="{{ $user->lastname }}"
								   class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200">
						</div>
						<div>
							<label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
							<input type="text" name="firstname" id="firstname" required
								   value="{{ old('firstname', $user->firstname) }}"
								   class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200">
						</div>
						<div class="md:col-span-2">
							<label for="middlename" class="block text-sm font-medium text-gray-700">Middle Name</label>
							<input type="text" name="middlename" id="middlename"
								   value="{{ old('middlename', $user->middlename) }}"
								   class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200">
						</div>
						<div class="md:col-span-2">
							<label for="email" class="block text-sm font-medium text-gray-700">Email</label>
							<input type="email" name="email" id="email" required
								   value="{{ old('email', $user->email) }}"
								   class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200">
						</div>
						<div>
							<label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
							<input type="date" name="birthdate" id="birthdate" required
								   value="{{ old('birthdate', $user->birthdate) }}"
								   class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200">
						</div>
						<div>
							<label for="age" class="block text-sm font-medium text-gray-700">Age</label>
							<input type="number" name="age" id="age" required
								   value="{{ old('age', $user->age) }}"
								   class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200">
						</div>
						<div class="md:col-span-2">
							<label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
							<select name="gender" id="gender" required
									class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200">
								@php $gender = strtolower(old('gender', (string) $user->gender)); @endphp
								<option value="" disabled {{ $gender === '' ? 'selected' : '' }}>Select a Gender</option>
								<option value="male" {{ $gender === 'male' ? 'selected' : '' }}>Male</option>
								<option value="female" {{ $gender === 'female' ? 'selected' : '' }}>Female</option>
							</select>
						</div>
					</div>
					<div class="mt-6 flex justify-end gap-3">
						<a href="{{ url('/') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Cancel</a>
						<button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">Save Changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
