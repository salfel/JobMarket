/** @type {import('tailwindcss').Config} */
export default {
	mode: "jit",
	content: ["./resources/**/*.vue"],
	theme: {
		extend: {
			fontFamily: {
				rubik: "'Rubik', sans-serif",
			},
			spacing: {
				120: "30rem",
				144: "36rem",
				168: "42rem",
			},
		},
	},
};
