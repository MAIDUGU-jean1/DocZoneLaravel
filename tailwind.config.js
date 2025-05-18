/** @type {import('tailwindcss').Config} */
module.exports = {
/** @type {import('tailwindcss').Config} */
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [],

darkMode: 'class',
theme: {
    extend: {
        colors: {
            primary: '#5D5CDE',
            secondary: '#FF9500',
            accent: '#34D399',
            dark: {
                bg: '#121212',
                card: '#1E1E1E',
                border: '#333333'
            },
            light: {
                bg: '#F9FAFB',
                card: '#FFFFFF',
                border: '#E5E7EB'
            }
        },
        fontFamily: {
            sans: ['Inter', 'sans-serif'],
            display: ['Montserrat', 'sans-serif']
        }
    }
}
}
