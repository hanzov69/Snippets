This is a simple addition to allow for turning on/off your printer.

It's pretty specific, requirements-wise:
You'll need an [Indigo](https://www.indigodomo.com/) server (I'm using mine with Insteon devices)

Configure this by updating it with your `USERNAME`, `PASSWORD`, `SERVERADDRESS` and adjust the URI to the correct endpoint (mine is "Printer")

This will automatically turn off your printer when a print job is complete.
It will also add a "Turn on" and "Turn Off" function to your System menu.

To install this, either add the entries to your `config.yaml` (likely under `~/.octoprint/`), or use the excellent [YamlPatcher Plugin](http://plugins.octoprint.org/plugins/yamlpatcher/)
