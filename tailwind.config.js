import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources//*.blade.php',
        './resources//*.js',
        './resources//*.vue',
        "./node_modules/flowbite//*.js"
    ],

    darkMode: 'class',

    theme: {
        extend: {
            
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            screens: {
                xs: '320px',  // Menambahkan breakpoint xs
                sm: '480px',  // Menambahkan breakpoint sm
                md: '768px',  // Menambahkan breakpoint md
                lg: '976px',  // Menambahkan breakpoint lg
                xl: '1440px', // Menambahkan breakpoint xl
            }
        },
    },

    plugins: [forms],
};
