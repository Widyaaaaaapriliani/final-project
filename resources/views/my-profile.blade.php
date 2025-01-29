@extends('layouts.app')

@section('title', 'Shop')

@section('content')
    <main class="mt-[80px] relative w-full flex justify-center">
        <div class="w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Banner Section -->
            <div class="h-[300px] relative">
                <img src="{{ asset('images/banner/banner_lumbung.png') }}" alt="banner" class="w-full h-full object-cover">
            </div>

            <!-- Profile Section -->
            <form id="profileForm" action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center relative px-32">
                <!-- Avatar Section -->
                <div class="absolute top-[-100px] left-[155px] text-center">
                    <label for="avatarInput" class="cursor-pointer relative">
                        <img id="avatarPreview" class="h-44 w-44 border-4 border-white rounded-full"
                            src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('images/produk.png') }}" 
                            alt="Profile Image">
                        <div class="absolute bottom-0 right-0 bg-gray-200 p-1 rounded-full hidden" id="iconedit">
                            <img src="{{ asset('images/icons/edit.png') }}" class="w-5 h-5" alt="Edit">
                        </div>
                    </label>
                    <input type="file" id="avatarInput" class="hidden" accept="image/*" name="profile_photo">
                    <div class="mt-3 text-start">
                        <h2 class="text-4xl font-semibold">{{ $user->name }}</h2>
                        <p class="flex items-center text-gray-400 text-lg mt-1">
                            {{ $user->address }}
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex space-x-3 mt-4 absolute top-[90px] right-[155px]">
                    <button type="button" id="editBtn" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                        Update Profile
                    </button>
                </div>

                <!-- Profile Form -->
                <div  class="w-full px-6 py-4 mt-44 h-screen">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-4 text-gray-700">
                        <div>
                            <label class="font-semibold">Username</label>
                            <input type="text" name="name" id="username" class="w-full border rounded p-2" value="{{ $user->name }}" disabled>
                        </div>
                        <div>
                            <label class="font-semibold">Email</label>
                            <input type="email" name="email" id="email" class="w-full border rounded p-2" value="{{ $user->email }}" disabled>
                        </div>
                        <div>
                            <label class="font-semibold">Alamat</label>
                            <input type="text" name="address" id="alamat" class="w-full border rounded p-2" value="{{ $user->address }}" disabled>
                        </div>
                        <div>
                            <label class="font-semibold">Phone</label>
                            <input type="text" name="phone" id="phone" class="w-full border rounded p-2" value="{{ $user->phone }}" disabled>
                        </div>
                        <div>
                            <label class="font-semibold">Tanggal Lahir</label>
                            <input type="date" name="birth_date" id="dob" class="w-full border rounded p-2" value="{{ $user->birth_date }}" disabled>
                        </div>
                       <div>
                        <label class="font-semibold">Jenis Kelamin</label>
                        <select id="gender" name="gender" class="text-gray-500 w-full border rounded p-2" disabled>
                            <option value="" disabled {{ !$user->gender ? 'selected' : '' }}>Pilih Gender</option>
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                       </div>
                    </div>
                    <div class="flex gap-3 mt-5">
                        <button type="submit" id="saveBtn" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 hidden">
                            Simpan Perubahan
                        </button>
                        <button type="button" id="cancelBtn" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-300 hidden">
                            Batal
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@section("scripts")
<script>
    document.getElementById('editBtn').addEventListener('click', function() {
        // Enable all input fields
        document.querySelectorAll('#profileForm input').forEach(input => input.removeAttribute('disabled'));
        document.querySelectorAll('#profileForm select').forEach(input => input.removeAttribute('disabled'));
        
        // Show save and cancel buttons, hide edit button
        document.getElementById('saveBtn').classList.remove('hidden');
        document.getElementById('cancelBtn').classList.remove('hidden');
        this.classList.add('hidden');
        
        // Show avatar input and edit icon
        document.getElementById('iconedit').classList.remove('hidden');
    });

    document.getElementById('cancelBtn').addEventListener('click', function() {
        // Disable all input fields
        document.querySelectorAll('#profileForm input').forEach(input => input.setAttribute('disabled', true));
        
        // Show edit button, hide save and cancel buttons
        document.getElementById('editBtn').classList.remove('hidden');
        document.getElementById('saveBtn').classList.add('hidden');
        this.classList.add('hidden');
        
        // Hide avatar input and edit icon
        document.getElementById('iconedit').classList.add('hidden');
    });

    document.getElementById('avatarInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatarPreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection