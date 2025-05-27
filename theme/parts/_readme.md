# Why .html files in here?

Use to embed Patterns made/modified in the Editor within PHP templates!

1. Create new Synced Pattern. Name doesn't matter.
1. Populate relevant blocks and **Publish** it. _Note:_ You do not need to 'Convert to block pattern' for this to work.
1. Create new HTML file in `theme/parts/`. Name in all lowercase, i.e. `img-grid-assoc-construction.html`. This is is a new Template Part.
1. From _Appearance_ > _Design_, Click _Patterns_ > _General_. Choose the matching Template Part, then use the inserter to add the Synced Pattern to your Template Part.
1. You can now add that Synced Pattern to posts or pages in the Content Editor... /or/ you can add the Template Part to PHP theme files using `<?php block_template_part( 'img-grid-assoc-construction' ); ?>`. Same actual content; **both places**!

