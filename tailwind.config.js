/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    safelist: [
        'bg-green-500',
        'bg-red-500',
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
