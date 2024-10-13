// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true

module.exports = {
	presets: [require('./tailwind-typography.config.js')],
	content: ['./theme/**/*.php', './theme/theme.json'],
	theme: {
		extend: {
			letterSpacing: {
				2: '0.02em',
				2.5: '0.025em',
			},
			fontFamily: {
				syne: ['Syne', 'sans-serif'],
				teko: ['Teko', 'sans-serif'],
				heebo: ['Heebo', 'sans-serif'],
			},
			colors: {
				primary: {
					DEFAULT: '#ff6400',
					50: '#fff8ec',
					100: '#ffefd3',
					200: '#ffdba5',
					300: '#ffc16d',
					400: '#ff9b32',
					500: '#ff7d0a',
					600: '#ff6400',
					700: '#cc4702',
					800: '#a1370b',
					900: '#82300c',
					950: '#461504',
				},
				black: {
					DEFAULT: '#111111',
					50: '#f6f6f6',
					100: '#e7e7e7',
					200: '#d1d1d1',
					300: '#b0b0b0',
					400: '#888888',
					500: '#6d6d6d',
					600: '#5d5d5d',
					700: '#4f4f4f',
					800: '#454545',
					900: '#3d3d3d',
					950: '#111111',
				},
				gray: {
					DEFAULT: '#959595',
					50: '#f6f6f6',
					100: '#e7e7e7',
					200: '#d1d1d1',
					300: '#b0b0b0',
					400: '#959595',
					500: '#6d6d6d',
					600: '#5d5d5d',
					700: '#4f4f4f',
					800: '#454545',
					900: '#3d3d3d',
					950: '#262626',
				},
				success: {
					DEFAULT: '#00a600',
					50: '#eeffed',
					100: '#d6ffd6',
					200: '#b0ffaf',
					300: '#71ff71',
					400: '#2ffb2d',
					500: '#03e502',
					600: '#04bf00',
					700: '#00a600',
					800: '#067507',
					900: '#085f09',
					950: '#003601',
				},
				danger: {
					DEFAULT: '#ff2828',
					50: '#fff0f0',
					100: '#ffdddd',
					200: '#ffc1c1',
					300: '#ff9797',
					400: '#ff5b5b',
					500: '#ff2828',
					600: '#fa0808',
					700: '#e50202',
					800: '#ae0606',
					900: '#8f0d0d',
					950: '#4f0000',
				},
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
