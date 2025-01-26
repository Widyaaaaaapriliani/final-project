<!-- resources/views/dashboard.blade.php -->
@extends('layouts.dashboard-layout') <!-- Menggunakan layout utama yang sudah dibuat -->

@section('title', $title) <!-- Mengisi judul halaman -->

@section('content')
    <!-- Dashboard Stat Cards -->
    <div class="bg-white shadow rounded-lg p-4">
        <div class="flex justify-between items-center">
            <div class="p-2 bg-slate-900 text-xl text-slate-50 p-2 rounded font-semibold w-[100vh]">Kelola Data Barang Disini
            </div>
            <button class="btn btn-outline h-2 my-4">Tambah Barang</button>
        </div>
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Job</th>
                        <th>Favorite Color</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr>
                        <th>1</th>
                        <td>Cy Ganderton</td>
                        <td>Quality Control Specialist</td>
                        <td>Blue</td>
                        <td>
                            <ul class=" menu menu-horizontal bg-base-100 rounded-box p-0">

                                <li>
                                    <a class="tooltip" data-tip="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"
                                            class="h-5 w-5" id="User-Sync-Online-In-Person--Streamline-Core" height="14"
                                            width="14">
                                            <desc>User Sync Online In Person Streamline Icon: https://streamlinehq.com
                                            </desc>
                                            <g id="user-sync-online-in-person">
                                                <path id="Union" fill="#000000" fill-rule="evenodd"
                                                    d="M10.2127 2.53752c-1.29367 -0.93012 -2.97821 -1.29258 -4.63574 -0.84844 -2.79544 0.74903 -4.50822 3.52323 -3.98216 6.32072 0.07654 0.40708 -0.1914 0.79913 -0.598482 0.87568 -0.407078 0.07655 -0.799136 -0.1914 -0.875685 -0.59847C-0.549251 4.72465 1.62993 1.19377 5.18873 0.240189 7.38469 -0.348217 9.61568 0.176234 11.2842 1.46596l0.6123 -0.612224c0.3149 -0.314982 0.8535 -0.091898 0.8535 0.353554v2.29289c0 0.27615 -0.2238 0.5 -0.5 0.5H9.95712c-0.44545 0 -0.66854 -0.53857 -0.35355 -0.85355l0.60913 -0.60911Zm2.7914 2.57735c0.407 -0.07655 0.7991 0.19139 0.8756 0.59847 0.6699 3.56236 -1.5092 7.09326 -5.06805 8.04686 -2.19603 0.5884 -4.4271 0.0639 -6.09567 -1.2259l-0.61236 0.6123c-0.31499 0.315 -0.85356 0.0919 -0.85356 -0.3535v-2.2929c0 -0.2762 0.22386 -0.5 0.5 -0.5h2.2929c0.44545 0 0.66853 0.5385 0.35355 0.8535l-0.60899 0.609c1.29367 0.9302 2.9783 1.2927 4.6359 0.8486 2.79548 -0.7491 4.50818 -3.52326 3.98218 -6.32075 -0.0766 -0.40708 0.1914 -0.79913 0.5985 -0.87568Zm-4.50458 0.38578c0 0.82809 -0.6713 1.49939 -1.49939 1.49939 -0.8281 0 -1.4994 -0.6713 -1.4994 -1.49939 0 -0.8281 0.6713 -1.4994 1.4994 -1.4994 0.82809 0 1.49939 0.6713 1.49939 1.4994Zm-1.4996 2.02453c-1.05471 0 -1.9823 0.54428 -2.51722 1.36729 -0.18805 0.28933 0.04991 0.63268 0.39498 0.63268h4.24448c0.34507 0 0.58303 -0.34335 0.39498 -0.63268 -0.53491 -0.82301 -1.4625 -1.36729 -2.51722 -1.36729Z"
                                                    clip-rule="evenodd" stroke-width="1"></path>
                                            </g>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a class="tooltip" data-tip="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"
                                            class="w-5 h-5 " id="Recycle-Bin-2--Streamline-Core" height="14"
                                            width="14">
                                            <desc>Recycle Bin 2 Streamline Icon: https://streamlinehq.com</desc>
                                            <g id="recycle-bin-2--remove-delete-empty-bin-trash-garbage">
                                                <path id="Subtract" fill="#000000" fill-rule="evenodd"
                                                    d="M5.76256 2.01256C6.09075 1.68437 6.53587 1.5 7 1.5c0.46413 0 0.90925 0.18437 1.23744 0.51256 0.20736 0.20737 0.35731 0.46141 0.43961 0.73744h-3.3541c0.0823 -0.27603 0.23225 -0.53007 0.43961 -0.73744ZM3.78868 2.75c0.10537 -0.67679 0.42285 -1.30773 0.91322 -1.798097C5.3114 0.34241 6.13805 0 7 0c0.86195 0 1.6886 0.34241 2.2981 0.951903 0.49037 0.490367 0.8079 1.121307 0.9132 1.798097H13c0.4142 0 0.75 0.33579 0.75 0.75 0 0.41422 -0.3358 0.75 -0.75 0.75h-1v8.25c0 0.3978 -0.158 0.7794 -0.4393 1.0607S10.8978 14 10.5 14h-7c-0.39783 0 -0.77936 -0.158 -1.06066 -0.4393C2.15804 13.2794 2 12.8978 2 12.5V4.25H1c-0.414214 0 -0.75 -0.33578 -0.75 -0.75 0 -0.41421 0.335786 -0.75 0.75 -0.75h2.78868ZM5 5.87646c0.34518 0 0.625 0.27983 0.625 0.625V10.503c0 0.3451 -0.27982 0.625 -0.625 0.625s-0.625 -0.2799 -0.625 -0.625V6.50146c0 -0.34517 0.27982 -0.625 0.625 -0.625Zm4.625 0.625c0 -0.34517 -0.27982 -0.625 -0.625 -0.625s-0.625 0.27983 -0.625 0.625V10.503c0 0.3451 0.27982 0.625 0.625 0.625s0.625 -0.2799 0.625 -0.625V6.50146Z"
                                                    clip-rule="evenodd" stroke-width="1"></path>
                                            </g>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <!-- row 2 -->
                    <tr class="hover">
                        <th>2</th>
                        <td>Hart Hagerty</td>
                        <td>Desktop Support Technician</td>
                        <td>Purple</td>
                    </tr>
                    <!-- row 3 -->
                    <tr>
                        <th>3</th>
                        <td>Brice Swyre</td>
                        <td>Tax Accountant</td>
                        <td>Red</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>Brice Swyre</td>
                        <td>Tax Accountant</td>
                        <td>Red</td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>

    <script>
        if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#default-table", {
                searchable: false,
                perPageSelect: false
            });
        }
    </script>

@endsection
