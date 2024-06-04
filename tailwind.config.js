import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'custom-pink': '#BA6264', // Menambahkan warna kustom
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                qaligo: ['Qaligo', 'sans-serif'], // Menambahkan font Qaligo
            },
            borderRadius: {
                'xl': '1rem', // Tambahkan border-radius yang lebih besar
            }
        },
    },

    plugins: [forms, typography],
};
