# Flexdate certificate element (`certificateelement_flexdate`)

Flexdate is a Certificate manager (`tool_certificate`) subplugin for displaying
issue or expiry dates with either the standard Certificate manager format or a
validated per-element Moodle `userdate()` format. An optional per-element
language override is scoped to that element's rendering.

## Repository layout

- `certificateelement_flexdate/`: installable plugin source; deploy as
  `admin/tool/certificate/element/flexdate`.
- `HANDOVER_moodle_flexdate_certificateelement.md`: original functional and
  architectural handover.
- `PROJECT_KNOWLEDGE.md`: current operating contract and compatibility rules.
- `PROJECT_HISTORY_LOG.md`: historical implementation and verification context.

Installation, format examples, provenance, and compatibility details are in the
[plugin README](certificateelement_flexdate/README.md). Changes are recorded in
the [plugin changelog](certificateelement_flexdate/CHANGELOG.md).

## License and provenance

This project is free software licensed under the
[GNU General Public License, version 3 or later](certificateelement_flexdate/LICENSE).
It is adapted from the GPL-licensed `certificateelement_date` element in
Certificate manager. Original Mark Nelson and Daniel Neis Araujo attribution is
preserved alongside Andreas Giesen's adaptation.

Development happens on `main` through focused commits. Important release states
are additionally marked with annotated semantic-version tags, currently
`v1.0.1`.

