/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/*.jsx",
        "./modules/**/*.blade.php",
        "./modules/**/*/Resources/views/**/*.blade.php",
        "./modules/**/*/Resources/js/**/*.js",
        "./modules/**/*/Resources/css/**/*.css",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};
