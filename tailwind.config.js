/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        jost: ['Jost', 'sans-serif'], // Tidak perlu tanda kutip di sekitar 'jost' karena ini kunci JS.
      },
    },
  },
  plugins: [
    require('daisyui'), // Pastikan `daisyui` sudah terinstall di proyek Anda.
    require('flowbite/plugin'), // Pastikan `flowbite` juga sudah diinstal.
  ],
};
