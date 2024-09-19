// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;

module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files and `theme.json` trigger a rebuild.
		'./theme/**/*.php',
		'./theme/theme.json',
	],
	theme: {
		// Extend the default Tailwind theme.
		extend: {
			colors: {
				'custom-primary': '#062f6e', // Custom primary color
				'custom-secondary': '#00943a', // Custom secondary color
				'custom-tertiary': '#945400', // Custom tertiary color
				'custom-accent': '#940000', // Custom accent color
				'custom-accent2': '#869400', // Custom accent color
				'custom-accent3': '#00877f', // Custom accent color
			},
			maxWidth: {
				'content': '90rem', // Change the default max-width value for max-w-content
        'desk': '1646px',
        'wide-desk': '1766px'
			},
			screens: {
        'wide': '2150px'
      }
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
};
