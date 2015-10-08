# Column Widths Plugin for Craft CMS

This is a simple field type which allows you to work with various classes in your templates. Just set them in Settings, setup your field and off you go!

## Installation

1. Upload this directory to `craft/plugins/columnwidth/` on your server.
2. Enable the plugin under Craft Admin > Settings > Plugins

## Usage

### Standalone Field

```
{% set columnName = entry.columnWidth %}
{% set class = craft.columnWidth.getClassNameFromColumnName(columnName) %}
​
{{ class.className }} 
```

### Inside a Matrix Field

```
{% set columnName = block.columnWidth %}
{% set class = craft.columnWidth.getClassNameFromColumnName(columnName) %}
​
{{ class.className }} 
```

## Special Thanks

I definitely could not have done this without [Aaron Berkowitz](https://twitter.com/asberk)!

## License

This work is licenced under the MIT license.