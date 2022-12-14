const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: "Comfortaa",
                ...defaultTheme.fontFamily.sans,
                oswald: ["Oswald", "sans-serif"],
            },
        },
    },

    plugins: [],
};
