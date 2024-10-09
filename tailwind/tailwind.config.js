// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true

module.exports = {
	presets: [require('./tailwind-typography.config.js')],
	content: ['./theme/**/*.php', './theme/theme.json'],
	theme: {
		extend: {
			fontFamily: {
				syne: ['Syne', 'sans-serif'],
				teko: ['Teko', 'sans-serif'],
				heebo: ['Heebo', 'sans-serif'],
			},
		},
	},
	corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson')(require('../theme/theme.json')),

		// Add Tailwind Typography.
		require('@tailwindcss/typography'),

		// Uncomment below to add additional first-party Tailwind plugins.
		require('@tailwindcss/forms'),
		require('@tailwindcss/aspect-ratio'),
	],
}
