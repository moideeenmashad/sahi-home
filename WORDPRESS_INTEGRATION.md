# WordPress Integration Guide - All Sections

This guide covers integration for all sections (2, 3, 4, and 5).

## Available Sections

- **Section 2:** Who We Are / What We Do
- **Section 3:** How We Do It
- **Section 4:** How We Roll
- **Section 5:** Who We Serve

## Method 1: Using PHP Shortcodes (Recommended)

### Setup:

1. **Add all PHP files to your theme:**
   - Copy the PHP files to your theme directory OR
   - Add this to your theme's `functions.php`:
     ```php
     require_once get_template_directory() . '/section-2-wordpress.php';
     require_once get_template_directory() . '/section-3-wordpress.php';
     require_once get_template_directory() . '/section-4-wordpress.php';
     require_once get_template_directory() . '/section-5-wordpress.php';
     ```

### Usage:

- **Section 2:** `[section_2_who_we_are]`
- **Section 3:** `[section_3_how_we_do_it]`
- **Section 4:** `[section_4_how_we_roll]`
- **Section 5:** `[section_5_who_we_serve]`

Or in PHP templates:
```php
<?php echo do_shortcode('[section_2_who_we_are]'); ?>
```

## Method 2: Using Direct Embed HTML (Easiest)

### Setup:

1. **Copy the HTML files:**
   - Use the `-wordpress-embed.html` versions (e.g., `section-2-wordpress-embed.html`)

2. **Add to WordPress:**
   - Create a new page/post
   - Add a "Custom HTML" block
   - Paste the entire content from the embed file
   - Save and publish

### Files Available:

- `section-2-wordpress-embed.html`
- `section-3-wordpress-embed.html`
- `section-4-wordpress-embed.html`
- `section-5-wordpress-embed.html`

## Method 3: Using a Page Builder Plugin

### Elementor / Gutenberg:
1. Add a "Custom HTML" widget/block
2. Paste the HTML code from the `-wordpress-embed.html` files
3. No additional CSS/JS needed - everything is self-contained

## Important Notes:

1. **Class Name Conflicts:** 
   - All WordPress versions use `-wp` suffix to avoid conflicts
   - Section 5 uses `serve-` prefix and `-wp` suffix
   - All other sections use their section-specific prefixes with `-wp` suffix

2. **JavaScript Scope:**
   - All JavaScript wrapped in IIFE (Immediately Invoked Function Expression)
   - All variables prefixed to avoid conflicts:
     - Section 2: `hoverSectionsWp`
     - Section 3: `sectionWp`, `sectionHeaderWp`
     - Section 4: `currentIndexWp`, `cardsWp`, etc.
     - Section 5: `serveActiveIndex`, `serveCards`, etc.

3. **Styling:**
   - Ensure your theme's background color doesn't conflict
   - All sections designed to work with dark backgrounds (#1b2a56)
   - Consider adding wrapper div with unique class if needed

4. **Performance:**
   - Direct embed files are self-contained (CSS and JS inline)
   - For better performance, consider extracting CSS/JS to separate files
   - Enqueue them using `wp_enqueue_style()` and `wp_enqueue_script()`

## Troubleshooting:

- **Styles not applying:** Check if your theme has `!important` rules that override. WordPress versions already include `!important` where needed.
- **JavaScript not working:** Check browser console for errors. Ensure scripts are loading after DOM is ready.
- **Carousel/Slider not showing:** Verify all IDs and classes match between HTML and JS. Check that container elements exist.
- **Layout broken:** Ensure parent container has enough width/height. Check for theme CSS conflicts.
- **Mobile not working:** Verify viewport meta tag is present. Check media queries are properly closed.

## File Summary

### PHP Shortcode Files:
- `section-2-wordpress.php` → Shortcode: `[section_2_who_we_are]`
- `section-3-wordpress.php` → Shortcode: `[section_3_how_we_do_it]`
- `section-4-wordpress.php` → Shortcode: `[section_4_how_we_roll]`
- `section-5-wordpress.php` → Shortcode: `[section_5_who_we_serve]`

### Direct Embed Files:
- `section-2-wordpress-embed.html` → Copy/paste into Custom HTML block
- `section-3-wordpress-embed.html` → Copy/paste into Custom HTML block
- `section-4-wordpress-embed.html` → Copy/paste into Custom HTML block
- `section-5-wordpress-embed.html` → Copy/paste into Custom HTML block

## Alternative: Extract to External Files

For better WordPress integration and performance, you can:

1. **Extract CSS** to separate files: `wp-content/themes/your-theme/css/section-X.css`
2. **Extract JS** to separate files: `wp-content/themes/your-theme/js/section-X.js`
3. **Enqueue in functions.php:**
   ```php
   function enqueue_section_assets() {
       wp_enqueue_style('section-2-css', get_template_directory_uri() . '/css/section-2.css');
       wp_enqueue_script('section-2-js', get_template_directory_uri() . '/js/section-2.js', array(), '1.0', true);
       // Repeat for sections 3, 4, 5...
   }
   add_action('wp_enqueue_scripts', 'enqueue_section_assets');
   ```

