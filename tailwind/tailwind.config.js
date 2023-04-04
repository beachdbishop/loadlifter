const plugin = require('tailwindcss/plugin')

// Set Preflight flag and Tailwind Typography class name based on the build target.
let includePreflight, typographyClassName;
if ( 'editor' === process.env._TW_TARGET ) {
	includePreflight = false;
	typographyClassName = 'block-editor-block-list__layout';
} else {
	includePreflight = true;
	typographyClassName = 'prose';
}

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
      aspectRatio: {
        'headshot': '95 / 127',
      },
      backgroundImage: {
        'mesh-blue': "url('img/mesh-374-blue.jpg')",
        'mesh-red': "url('img/mesh-767-red.jpg')",
        'mesh-white': "url('img/mesh-grad-whites-blues.jpg')",
        'mooney-desert1': "url('img/cmooney-dsc_834372-bw.jpg')",
        'mooney-desert2': "url('img/cmooney-dsc_835072-bw.jpg')",
      },
      maxWidth: {
        '46char': '46ch',
        'socimg': '736px',
      },
      minHeight: {
        'hero': '420px',
      },
      textShadow: {
        sm: '0 1px 2px var(--tw-shadow-color)',
        DEFAULT: '0 2px 4px var(--tw-shadow-color)',
        lg: '0 8px 16px var(--tw-shadow-color)',
      },
		},
	},
  safelist: [
    '-ml-4',
    '-ml-8',
    'alignright',
    'a11y-slider-container',
    'a11y-slider-dots',
    'a11y-slider-next',
    'a11y-slider',
    'bg-current',
    'bg-brand-gray-dark',
    'bg-brand-red-dark',
    'bg-brand-blue-dark',
    'border-brand-blue-dark',
    'border-brand-red-dark',
    'border-amber-300',
    'border-current',
    'border-transparent',
    'collapse',
    'columns-2',
    'columns-3',
    'delay-150',
    'divide-brand-blue-faint',
    'divide-brand-blue',
    'divide-brand-red',
    'divide-current',
    'divide-solid',
    'divide-x',
    'divide-y',
    'ease-in-out',
    'flex-start',
    'font-head',
    'from-brand-gray',
    'from-brand-red',
    'from-brand-blue',
    'group-open:bg-neutral-300',
    'group-open:bg-neutral-400',
    'grow',
    'h-8',
    'hidden',
    'hover:bg-neutral-100',
    'hover:bg-neutral-200',
    'hover:bg-orange',
    'hover:bg-brand-red-dark',
    'hover:border-brand-blue-faint',
    'hover:border-transparent',
    'hover:border-neutral-600',
    'hover:text-brand-blue-faint',
    'hover:text-white',
    'inline',
    'leading-tight',
    'lg:collapse',
    'lg:gap-16',
    'lg:grid-cols-2',
    'lg:visible',
    'list-square',
    'max-w-2xl',
    'max-w-3xl',
    'max-w-4xl',
    'max-w-5xl',
    'max-w-6xl',
    'max-w-md',
    'max-w-prose',
    'rounded-md',
    'shadow-brand-blue-dark/50',
    'shadow-sm',
    'slider-quotes',
    'slider',
    'table-oldtab',
    'text-base',
    'text-brand-gray-dark',
    'to-brand-gray',
    'to-brand-red',
    'to-brand-blue',
    'transition-colors',
    'truncate',
    'via-brand-gray',
    'via-brand-red',
    'via-brand-blue',
    'visible',
    'w-40',
    'w-8',
    'w-fit',
    {
      pattern: /bg-(amber|neutral|green)-(50|100|200|300|400|500|600|700|800|900)/,
    },
    {
      pattern: /border-(t|l|b|r|x|y)-(1|2|3|4)/,
    },
    {
      pattern: /border-(1|2|3|4)/,
    },
    {
      pattern: /m(t|l|b|r|x|y)-(0|1|2|4|6|8|10|12|16)/,
    },
    {
      pattern: /m-(0|1|2|4|6|8|10|12|16)/,
    },
    {
      pattern: /p(t|l|b|r|x|y)-(0|1|2|4|6|8|10|12|16)/,
    },
    {
      pattern: /p-(0|1|2|4|6|8|10|12|16)/,
    },
    {
      pattern: /(from|via|to)-(neutral)-(50|100|200|300|400|500|600|700|800|900)/,
    },
    {
      pattern: /(from|via|to)-brand-(gray|red|blue)-(faint|pale|dark)/,
    }
  ],
	corePlugins: {
		// Disable Preflight base styles in CSS targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
    // Extract colors and widths from `theme.json`.
		require('@_tw/themejson')(require('../theme/theme.json')),

    // Add Tailwind Typography.
		require('@tailwindcss/typography' )({
			className: typographyClassName,
		}),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require( '@tailwindcss/aspect-ratio' ),
		// require( '@tailwindcss/forms' ),
		// require( '@tailwindcss/line-clamp' ),
    require('@shrutibalasa/tailwind-grid-auto-fit'),

    plugin(function ({ matchUtilities, theme }) {
      matchUtilities(
        {
          'text-shadow': (value) => ({
            textShadow: value,
          }),
        },
        { values: theme('textShadow') }
      )
    }),

    function ({ addVariant }) {
      addVariant('children', '&>*')
    },
	],
};
