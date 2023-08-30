const colors = require( 'tailwindcss/colors' );

module.exports = {
	theme: {
		extend: {
			typography: () => ( {
				/**
				 * Tailwind Typography’s default styles are opinionated, and you may need to override them if you have mockups to replicate. You can view the default modifiers here:
				 *
				 * https://github.com/tailwindlabs/tailwindcss-typography/blob/master/src/styles.js
				 */

				DEFAULT: {
					css: [
						{
							/**
							 * By default, max-width is set to 65 characters. This is a good default for readability, but often in conflict with client-supplied designs. A value of false removes the max-width property.
							 */
							maxWidth: false,
              a: {
                fontWeight: '400',
              },
              'strong a': {
                fontWeight: '700',
              },

              strong: {
                color: 'inherit',
              },

							/**
							 * Without Preflight, Tailwind doesn't apply a default border style of `solid` to all elements, so the border doesn't appear in the editor without this addition.
							 */
							blockquote: {
								borderLeftStyle: 'solid',
							},

						},
					],
				},
			} ),
		},
	},
};
