import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    // Tailwind scans these files to generate only the CSS classes actually used
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            // Festival color palette — use as bg-festival-dark, text-festival-gold, etc.
            colors: {
                'festival': {
                    dark:       '#0d0d0d',   // main page background
                    card:       '#1a1a1a',   // card backgrounds
                    gold:       '#F59E0B',   // amber-500, primary accent
                    'gold-light': '#FCD34D', // amber-300, for gradients
                    'gold-dark':  '#D97706', // amber-600, for hover states
                },
                // Extend gray palette with an 950 shade for the admin area
                gray: {
                    950: '#0a0a0a',
                },
            },

            // Keep Figtree as the project font (matches Breeze setup)
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            // Subtle gold glow animation used on decorative elements
            animation: {
                'glow': 'glow-pulse 3s ease-in-out infinite',
            },
            keyframes: {
                'glow-pulse': {
                    '0%, 100%': { opacity: '0.4' },
                    '50%':      { opacity: '1'   },
                },
            },
        },
    },

    plugins: [
        forms,  // adds sensible default styles for form inputs
    ],
};
