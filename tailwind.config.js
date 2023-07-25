/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/js/index.html",
    "./resources/js/tailwind.config.js",
    "./resources/js/src/*.jsx",
    "./resources/js/src/components/*.jsx",
    "./resources/js/src/**/*.jsx",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

