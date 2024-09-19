// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;

module.exports = {
	presets: [
		require('./tailwind-typography.config.js'),
	],
	content: [
		'./theme/**/*.php',
		'./theme/theme.json',
	],
	theme: {
		extend: {
			fontFamily: {
				'pp-mori': ['"Mori", sans-serif'],
			},
			colors: {
				// primary
				cherry: '#D53538',
				salt: '#ECEAF2',
				ice: '#DBFCFC',
				black: '#221F20',

				// secondary
				pickle: '#65844D',
				yam: '#D36839',
				'granny-smith': '#BAF146',
				eggplant: '#77698E',
				sashimi: '#FFBD98',
				naners: '#FFEA7B'

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
