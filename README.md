# dashboard widget

dashboard widget plugin is a WordPress plugin that adds a custom dashboard widget to display a chart based on static data fetched from the database using the WP REST API.

## Features

- Display a line chart on the WordPress dashboard.
- Fetches data from the database using the WP REST API.
- Provides dropdown options to select the time range for the chart.

## Requirements

- WordPress 4.7 or higher

## Installation

1. Download the plugin zip file.
2. Extract the zip file and upload the plugin folder to the `wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage

1. After activating the plugin, go to the WordPress dashboard.
2. You will see a new dashboard widget titled "dashboar widget Plugin Dashboard Widget".
3. The widget includes a dropdown to select the time range for the chart (last 7 days, 15 days, or 1 month).
4. The chart will display the data based on the selected time range.

## Customization

If you want to customize the plugin or extend its functionality, you can modify the code in the plugin files:

- `dashboard-widget.php`: Main plugin file that handles initialization and enqueuing necessary scripts and styles.
- `dashboard-widget/dashboard-widget.js`: React component file responsible for rendering the dashboard widget.
- `dashboard-widget/dashboard-widget.css`: CSS file for styling the dashboard widget.

## Support

For any issues or questions, please create a new issue in the [issue tracker](link-to-issue-tracker).

## License

The dashboard widget is open-sourced software licensed under the [MIT license](link-to-license-file).
