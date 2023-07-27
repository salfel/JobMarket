/** @type {import('tailwindcss').Config} */
export default {
	content: [
		'./resources/**/*.blade.php',
		'./config/styles.php'
	],
	theme: {
		extend: {
			fontFamily: {
				'rubik': "'Rubik', sans-serif"
			}
		},
	},
}

