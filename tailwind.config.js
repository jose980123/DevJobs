import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],

    safelist: [
        'bg-pink-600',
        'bg-blue-600',
        'bg-orange-600',
        'bg-purple-600',
        'bg-violet-600',
        'bg-red-600',
        'bg-red-100',
        'bg-green-600',
        'bg-yellow-600',
        'bg-slate-600',
        'bg-zinc-600',
        'bg-neutral-600',
        'bg-stone-600',
        'bg-amber-600',
        'bg-line-600',
        'bg-emerald-600',
        'bg-teal-600',
    ],
};

