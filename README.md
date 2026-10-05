# Flexible date certificate element

Display certificate issue or expiry dates in the format you need. Flexible date
adds standard and custom date formats to Certificate manager, with an optional
language choice for each element.

## Screenshot

[![Configure a Flexible date element with a custom date format](https://raw.githubusercontent.com/108design/moodle-certificateelement_flexdate/main/docs/screenshots/cd-flexdate.jpg)](https://raw.githubusercontent.com/108design/moodle-certificateelement_flexdate/main/docs/screenshots/cd-flexdate.jpg)

## Features

- Display the certificate's issue date or expiry date.
- Choose a familiar Moodle date format or enter your own format for each element.
- Select an installed site language for month and weekday names, or use the
  certificate's language.
- Use Certificate manager's normal font, size, colour, alignment and positioning
  controls.

## Installation

1. Install a compatible **Certificate manager** (`tool_certificate`) release.
2. Install this plugin in `<moodle>/admin/tool/certificate/element/flexdate`.
   On Moodle installations with a split web directory, use
   `<moodle>/public/admin/tool/certificate/element/flexdate`.
3. Visit **Site administration → Notifications** to complete installation.
4. Open a certificate template and add **Flexible date**.
5. Select **Date item**, **Format mode** and, optionally, **Date language**.
6. Save the element and preview the certificate.

The directory name must remain `flexdate`. This is a Certificate manager element;
it does not require the Course certificate activity to edit a template.

## Compatibility

Requires Moodle 4.5 or later and a compatible Certificate manager installation.
The plugin targets Moodle 4.5–5.2 and supports issue and expiry dates.

## Date formats and language

Choose **Standard format** to use Moodle's predefined date formats. Choose
**Custom format** to enter a strftime-style pattern, rather than `tt.mm.yyyy`
notation. Common patterns:

| Output | Pattern |
| --- | --- |
| `18.08.2026` | `%d.%m.%Y` |
| `18.08.26` | `%d.%m.%y` |
| `2026-08-18` | `%Y-%m-%d` |
| `18. August 2026` | `%d. %B %Y` |

Use `%%` for a literal percent sign. Formats are limited to 100 characters;
empty custom formats, HTML, control characters and unknown percent directives
are rejected. Dates use Moodle's timezone handling.

**Date language** can select any installed site language for this element's date.
This is useful when a template needs fixed month or weekday names. Leave it at
**Use certificate language** to follow Certificate manager's language choice.
The selection does not change the language of other elements.

## Privacy

Flexible date stores formatting settings in the certificate template. It does not
store personal data of its own or send data to an external service. Certificate
issues and recipient records are managed by Certificate manager.

## Origin and attribution

This plugin was adapted in 2026 from the `certificateelement_date` implementation
in [`tool_certificate` 4.5.7](https://github.com/moodleworkplace/moodle-tool_certificate/tree/v4.5.7/element/date).
The original element was authored by Mark Nelson; its test patterns include work
by Daniel Neis Araujo. The adaptation and subsequent changes are copyright 2026
Andreas Giesen.
Fork maintainer: Andreas Giesen <andreas@108design.com> (108design).

## License

GNU General Public License version 3 or later. See [LICENSE](LICENSE) for the
complete license text.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
