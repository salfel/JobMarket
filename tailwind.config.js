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
			},
			spacing: {
				120: '30rem',
				144: '36rem',
				168: '42rem'
			}
		},
	},
}

