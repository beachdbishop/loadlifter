/** @type {import('tailwindcss').Config} */
const plugin = require('tailwindcss/plugin');
// Set flag to include Preflight conditionally based on the build target.
const includePreflight = ( 'editor' === process.env._TW_TARGET ) ? false : true;

module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require( './tailwind-typography.config.js' ),
	],
	content: [
		// Ensure changes to PHP files and `theme.json` trigger a rebuild.
		'./theme/**/*.php',
		'./theme/theme.json',
	],
	theme: {
    fontFamily: {
      head: ['serenity', 'sans-serif'],
      body: ['Work Sans', 'sans-serif'],
      mono: ['Fira Code', 'Consolas', 'monospace'],
    },
		// Extend the default Tailwind theme.
		extend: {
      minHeight: {
        'hero': '420px',
      },
      maxWidth: {
        '46char': '46ch',
      },
		},
	},
  safelist: [
    {
      pattern: /bg-(amber|neutral|green)-(50|100|200|300|400|500|600|700|800|900)/,
    },
    'px-4',
    'text-base',
    'leading-tight',
    'border-2',
    'border-b-2',
    'border-transparent',
    'list-square',
    'divide-current',
    'divide-brand-blue-faint',
    'divide-solid',
    'divide-y',
    'rounded-md',
    'shadow-sm',
    'grow',
    'truncate',
    'max-w-4xl',
    'md:hidden',
    'md:inline',
    'hover:bg-orange',
    'hover:border-transparent',
    'hover:text-white',
  ],
	corePlugins: {
		// Disable Preflight base styles in CSS targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Add Tailwind Typography.
		require( '@tailwindcss/typography' ),

		// Extract colors and widths from `theme.json`.
		require( '@_tw/themejson' )( require( '../theme/theme.json' ) ),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require( '@tailwindcss/aspect-ratio' ),
		require( '@tailwindcss/forms' ),
		// require( '@tailwindcss/line-clamp' ),
	],
};
