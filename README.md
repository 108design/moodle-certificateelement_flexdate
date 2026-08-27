# Flexible date certificate element

`certificateelement_flexdate` adds a **Flexible date** element to the Certificate manager (`tool_certificate`). Each element can show the issue date or expiry date in either the familiar Moodle standard format or an independent, custom strftime-style format.

An element can also select one of the site's installed languages for its date output. This is useful when a template needs a fixed month or weekday language, independently of the Certificate manager's current issue/site language. Leave **Date language** at **Use certificate language** to preserve the existing behaviour.

## Installation

1. Install a compatible `tool_certificate` release.
2. Copy this directory to `<moodle>/admin/tool/certificate/element/flexdate`.
3. Visit **Site administration → Notifications** to complete installation.
4. In a certificate template, add **Flexible date** and select the date source and format mode.

The directory name must remain `flexdate`; it maps to the Moodle component `certificateelement_flexdate`.

## Compatibility

- Moodle 4.5 LTS through Moodle 5.2 are the intended tested range.
- Moodle 5.3 is declared as an anticipated compatibility target; final verification must wait for its release and a compatible `tool_certificate` version.
- The initial implementation is based on the `tool_certificate` 4.5.7 date element. At that version, the upstream element exposes **Issued date** and **Expiry date** only. New upstream date sources must be reviewed and deliberately adopted when `tool_certificate` is upgraded.

## Custom formats

Use Moodle's strftime-style directives, not `tt.mm.yyyy` notation. Common patterns:

| Output | Pattern |
| --- | --- |
| `18.08.2026` | `%d.%m.%Y` |
| `18.08.26` | `%d.%m.%y` |
| `2026-08-18` | `%Y-%m-%d` |
| `18. August 2026` | `%d. %B %Y` |

Formats are limited to 100 characters. The plugin rejects empty formats in custom mode, HTML/control characters, and unknown percent directives. It always formats dates through Moodle's `userdate()` so the recipient's configured timezone and language are respected.

## Development checks

Run the PHPUnit test in a Moodle development installation:

```sh
php admin/tool/phpunit/cli/util.php --install
vendor/bin/phpunit admin/tool/certificate/element/flexdate/tests/element_test.php
```

Before a `tool_certificate` upgrade, compare its date element with `classes/element.php` and add any newly supported date sources intentionally.

## Origin and attribution

This plugin was adapted in 2026 from the `certificateelement_date` implementation
in [`tool_certificate` 4.5.7](https://github.com/moodleworkplace/moodle-tool_certificate/tree/v4.5.7/element/date).
The original element was authored by Mark Nelson; its test patterns include work
by Daniel Neis Araujo. The adaptation and subsequent changes are copyright 2026
Andreas Giesen.

## License

GNU General Public License version 3 or later. See [LICENSE](LICENSE) for the
complete license text.
