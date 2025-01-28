@extends('layouts.app')

@section('title', 'Shop')

@section('content')
    <main class="mt-[80px] relative w-full flex justify-center">
        <div class="w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="h-[300px] relative">
                <img src="{{ asset('images/banner/banner_lumbung.png') }}" alt="banner" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col items-center relative px-32">
                <div class="absolute top-[-50px] left-[155px] text-center">
                    <label for="avatarInput" class="cursor-pointer relative">
                        <img id="avatarPreview" class="h-32 w-32 border-4 border-white rounded-full" 
                             src="{{ asset('images/produk.png') }}" alt="Profile Image">
                        <div class="absolute bottom-0 right-0 bg-gray-200 p-1 rounded-full hidden" id="iconedit">
                            <img src="{{ asset('images/icons/edit.png') }}" class="w-5 h-5" alt="Edit">
                        </div>
                    </label>
                    <input type="file" id="avatarInput" class="hidden" accept="image/*">
                    <div class="mt-5 text-center">
                      <h2 class="text-xl font-semibold">Jesselyn Wang</h2>
                      <p class="flex items-center text-gray-400 text-sm mt-1">
                          🇰🇷 Seoul, South Korea
                      </p>
                    
                  </div>
                </div>
                <div class="flex space-x-3 mt-4 absolute top-[90px] right-[155px]">
                    <button type="button" id="editBtn" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update Profile</button>
                    <button type="submit" id="saveBtn" class="px-4 py-2 bg-green-600 text-white rounded-lg hidden">Simpan Perubahan</button>
                </div>
                <form class="w-full px-6 py-4 mt-44" id="profileForm">
                    <div class="grid grid-cols-2 gap-4 text-gray-700">
                        <div>
                            <label class="font-semibold">Username</label>
                            <input type="text" id="username" class="text-gray-500 w-full border rounded p-2" value="@jesselynwang" disabled>
                        </div>
                        <div>
                            <label class="font-semibold">Email</label>
                            <input type="email" id="email" class="text-gray-500 w-full border rounded p-2" value="jesselyn@example.com" disabled>
                        </div>
                        <div>
                            <label class="font-semibold">Alamat</label>
                            <input type="text" id="alamat" class="text-gray-500 w-full border rounded p-2" value="123, Seoul Street, South Korea" disabled>
                        </div>
                        <div>
                            <label class="font-semibold">Phone</label>
                            <input type="text" id="phone" class="text-gray-500 w-full border rounded p-2" value="+82 123 456 789" disabled>
                        </div>
                        <div class="col-span-2">
                            <label class="font-semibold">Tanggal Lahir</label>
                            <input type="date" id="dob" class="text-gray-500 w-full border rounded p-2" value="1990-01-01" disabled>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

@section("scripts")
<script>
    document.getElementById('editBtn').addEventListener('click', function() {
        document.querySelectorAll('#profileForm input').forEach(input => input.removeAttribute('disabled'));
        document.getElementById('saveBtn').classList.remove('hidden');
        this.classList.add('hidden');
        document.getElementById('avatarInput').classList.remove('hidden');
        this.classList.add('hidden');
        document.getElementById('iconedit').classList.remove('hidden');
        this.classList.add('hidden');
        
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
