# Mapping out Brand Colors / Tailwind CSS colors

## Before

- orange-pale: #ff665f
- orange: #ce182d
- orange-dark: #940418
- teal-pale: #75deff
- teal: #00668e
- teal-dark: #092f42
- gray-pale: #
- gray: #
- grey-dark: #

## After

- new! => _brand-red-faint_ (#fef2f2) ... tw.red-50
- orange-pale => _brand-red-pale_ (#f87171) ... tw.red-400
- orange => _brand-red_ (#ce182d) **Keeping the same since it's in logo.**
- orange-dark => _brand-red-dark_ (#940418) **Keeping the same since it's in logo.**
- new! => _brand-blue-faint_ (#ecfeff) ... tw.cyan-50
- teal-pale => _brand-blue-pale_ (#67e8f9) ... tw.cyan-300
- teal => _brand-blue_ (#0e7490) ... tw.cyan-700
- teal-dark => _brand-blue-dark_ (#164e63) ... tw.cyan-900
- new! => _brand-gray-faint_ (#fafafa) ... tw.neutral-50
- gray-pale => _brand-gray-pale_ (#d4d4d4) ... tw.neutral-300
- gray => _brand-gray_ (#525252) ... tw.neutral-600
- gray-dark => _brand-gray-dark_ (#262626) ... tw.neutral-800
 

## Search & Replaces to be done

In .php and .css files
- [x] "-orange-pale" > "-red-400" 
- [x] "-orange " > "-brand-red "
- [x] "-orange-dark" > "-brand-red-dark"
- [x] "-teal-pale" > "-cyan-300"
- [x] "-teal" > "-cyan-700"
- [x] "-teal-dark" > "-cyan-900"
- [x] "-grey-pale" > "-neutral-300"
- [x] "-grey" > "-neutral-600"
- [x] "-grey-dark" > "-neutral-800"


In WP content
- [x] "-orange-pale" > "-red-400" 
- [x] "-orange " > "-brand-red "
- [x] "-secondary" > "-brand-red"
- [x] "-orange-dark" > "-brand-red-dark"
- [x] "-tertiary" > "-brand-red-dark"
- [x] "-teal-pale" > "-cyan-300"
- [x] "-teal " > "-cyan-700 "
- [x] "-primary" > "-cyan-700"
- [x] "-teal-dark" > "-cyan-900"
- [x] "-grey-pale" > "-neutral-300"
- [x] "-grey" > "-neutral-600"
- [x] "-grey-dark" > "-neutral-800"
- [x] "-foreground" > "-neutral-800"
- [x] "-background" > "-white"
- [x] "-grey-gradient" > "-gray-gradient"
- [x] "-orange-gradient" > "-red-gradient"
- [x] "-teal-gradient" > "-blue-gradient"
- [x] "-teal-light-gradient" > "-blue-faint-gradient"
- [x] "-grey-split-gradient" > "-gray-split-gradient"
- [x] "-orange-split-gradient" > "-red-split-gradient"
- [x] "-teal-split-gradient" > "-blue-split-gradient"
- [ ] "" > ""
- [ ] "" > ""
- [ ] "" > ""
- [ ] "list styles" > ""
- [ ] "" > ""



In `theme.json`
- [x] duotones 
- [x] gradients
